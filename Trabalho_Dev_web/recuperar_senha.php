<?php
// Opcional: Iniciar a sessão para mensagens de erro/sucesso
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="CSS/style.css"> 
</head>
<body>

<div class="card" role="region" aria-label="Recuperação de Senha">
    <h2>Recuperar Senha</h2>
    <p class="sub">Informe seu e-mail cadastrado. Enviaremos um link para redefinição.</p>

    <?php if (isset($_SESSION['mensagem'])): ?>
        <div style="color: green; margin-bottom: 15px;"><?php echo $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
    <?php endif; ?>

    <form action="envia_email_token.php" method="POST">
        <label>
            Email
            <input class="input" type="email" name="email" placeholder="Seu email" required />
        </label>

        <button class="btn" type="submit">Enviar Link</button>

        <footer class="small">Lembrou da senha? <a class="muted-link" href="login_novo.php">Voltar ao Login</a></footer>
    </form>
</div>

</body>
</html>