<?php
session_start();
// Inclua seu arquivo de configuração/conexão (usando o nome do arquivo corrigido, auth.php)
require_once 'auth.php'; // Altere para o seu arquivo de conexão, se o nome for diferente.

$mensagem = '';
$token = $_GET['token'] ?? ''; // Pega o token da URL

// ----------------------------------------------------
// A. VERIFICAÇÃO DO TOKEN (Acesso GET via e-mail)
// ----------------------------------------------------
if ($token) {
    // 1. Busca o usuário pelo token e verifica se ele não expirou (ainda não passou de token_expires_at)
    $sql_check = "SELECT id FROM Usuarios WHERE reset_token = ? AND token_expires_at > NOW()";
    
    try {
        $stmt = $pdo->prepare($sql_check);
        $stmt->execute([$token]);
        $usuario = $stmt->fetch();

        if (!$usuario) {
            $mensagem = "O link de redefinição é inválido ou expirou. Por favor, solicite um novo.";
            $token = ''; // Zera o token para não exibir o formulário
        }
        // Se o usuário for encontrado, a variável $token permanece preenchida e o formulário será exibido.

    } catch (\PDOException $e) {
        $mensagem = "Erro interno ao verificar o token.";
        error_log($e->getMessage());
    }

} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ----------------------------------------------------
    // B. PROCESSAMENTO DA NOVA SENHA (Acesso POST via formulário)
    // ----------------------------------------------------
    
    $token_post = $_POST['token'] ?? '';
    $nova_senha = $_POST['senha'] ?? '';
    $confirma_senha = $_POST['confirma_senha'] ?? '';

    if (empty($nova_senha) || $nova_senha !== $confirma_senha) {
        $mensagem = "As senhas não coincidem ou estão vazias.";
        $token = $token_post; // Mantém o token no campo oculto para re-tentativa
    } else {
        // Busca o usuário pelo token novamente (para garantir a validade)
        $sql_check = "SELECT id FROM Usuarios WHERE reset_token = ? AND token_expires_at > NOW()";
        $stmt = $pdo->prepare($sql_check);
        $stmt->execute([$token_post]);
        $usuario = $stmt->fetch();

        if ($usuario) {
            $usuario_id = $usuario['id'];
            
            // 1. Gera o novo hash da senha
            $novo_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
            
            // 2. Atualiza a senha e LIMPA o token e a data de expiração
            $sql_update = "UPDATE Usuarios SET senha = ?, reset_token = NULL, token_expires_at = NULL WHERE id = ?";
            $stmt = $pdo->prepare($sql_update);
            $stmt->execute([$novo_hash, $usuario_id]);
            
            // Sucesso! Redireciona para o login
            $_SESSION['mensagem'] = "Senha redefinida com sucesso! Você já pode fazer login.";
            header('Location: login.php');
            exit;

        } else {
            $mensagem = "Ocorreu um erro de segurança. O link é inválido ou expirou.";
            $token = '';
        }
    }
} else {
    // Se acessado sem token na URL, pede para solicitar a recuperação
    $mensagem = "Acesso inválido. Por favor, solicite a recuperação de senha.";
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="CSS/style.css"> 
</head>
<body>

<div class="card" role="region" aria-label="Redefinir Senha">
    <h2>Redefinir Senha</h2>

    <?php if ($mensagem): ?>
        <div style="color: red; margin-bottom: 15px;"><?php echo $mensagem; ?></div>
    <?php endif; ?>

    <?php if ($token): ?>
        <p class="sub">Insira sua nova senha.</p>
        
        <form action="redefinir_senha.php" method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

            <label>
                Nova Senha
                <input class="input" type="password" name="senha" placeholder="Mínimo 6 caracteres" minlength="6" required />
            </label>

            <label>
                Confirme a Nova Senha
                <input class="input" type="password" name="confirma_senha" placeholder="Confirme a senha" required />
            </label>

            <button class="btn" type="submit">Redefinir Senha</button>
        </form>

    <?php else: ?>
        <footer class="small"><a class="muted-link" href="recuperar_senha.php">Tentar Novamente</a> | <a class="muted-link" href="login_novo.php">Voltar ao Login</a></footer>
    <?php endif; ?>

</div>
</body>
</html>