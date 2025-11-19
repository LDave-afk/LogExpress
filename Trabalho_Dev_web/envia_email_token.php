<?php
session_start();
// Inclua sua configuração de conexão
$host = 'localhost';
$db = 'cliente';
$usuario = 'root';
$senha_bd = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $usuario, $senha_bd, $options);
} catch (\PDOException $e) {
    die("Erro de Conexão: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_digitado = $_POST['email'] ?? '';
    
    // 1. Busca o usuário pelo e-mail
    $sql_select = "SELECT id FROM Usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql_select);
    $stmt->execute([$email_digitado]);
    $usuario = $stmt->fetch();

    // Sempre damos a mesma mensagem de feedback para não revelar se o email existe.
    $_SESSION['mensagem'] = "Se o e-mail estiver cadastrado, um link de redefinição será enviado.";
    header('Location: recuperar_senha.php');
    
    if ($usuario) {
        $usuario_id = $usuario['id'];
        
        // 2. Gera um token único e seguro (64 caracteres)
        $token = bin2hex(random_bytes(32)); 
        
        // 3. Define a expiração (Ex: 1 hora a partir de agora)
        $expiracao = date("Y-m-d H:i:s", time() + 3600); // 3600 segundos = 1 hora
        
        // 4. Salva o token e a expiração no banco
        $sql_update = "UPDATE Usuarios SET reset_token = ?, token_expires_at = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql_update);
        $stmt->execute([$token, $expiracao, $usuario_id]);
        
        // 5. Simulação de Envio de E-mail
        // O link que o usuário receberá (aqui você usará a URL completa do seu projeto)
        $link_redefinir = "http://localhost/Trabalho_Dev_web/redefinir_senha.php?token=" . $token;

        // ⚠️ ATENÇÃO: Em produção, use uma biblioteca como PHPMailer
        // Aqui, apenas exibimos o link para testes:
        echo "Token gerado para teste: $link_redefinir";
        
        // Encerra o script APÓS salvar e enviar o feedback (simulado)
        exit;
    }
    // Se o usuário não existe, o script apenas encerra com a mensagem de feedback genérica.
}
// Se não for POST, redireciona para o formulário
header('Location: recuperar_senha.php');
exit;
?>