<?php
// Inicia a sessão para garantir o funcionamento, embora não seja essencial aqui
session_start(); 

// Pega o código de erro da URL (Ex: ?erro=bd_erro)
$codigo_erro = $_GET['erro'] ?? 'desconhecido';
$mensagem_detalhada = '';

// Mapeamento dos códigos de erro
switch ($codigo_erro) {
    case 'bd_erro':
        $titulo = "⚠️ Erro de Conexão ou Banco de Dados";
        $mensagem_detalhada = "Ocorreu um problema de comunicação com o servidor de dados. Por favor, tente novamente mais tarde.";
        break;
    case 'acesso_negado':
        $titulo = "🚫 Acesso Negado";
        $mensagem_detalhada = "Você não tem permissão para acessar esta área ou sua sessão expirou.";
        break;
    case 'login_requerido':
        $titulo = "🔒 Login Necessário";
        $mensagem_detalhada = "Você precisa fazer login para visualizar o conteúdo.";
        break;
    default:
        $titulo = "❌ Erro Desconhecido";
        $mensagem_detalhada = "Ocorreu um erro inesperado no sistema.";
        break;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Erro - <?php echo $titulo; ?></title>
    <style>
        body { font-family: 'Inter', sans-serif; text-align: center; padding-top: 50px; background-color: #f8f8f8; }
        .box { max-width: 500px; margin: 0 auto; padding: 30px; border-radius: 8px; background-color: #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        h1 { color: #cc0000; margin-bottom: 20px; }
        p { color: #555; margin-bottom: 30px; }
        .btn-link { 
            display: inline-block; padding: 10px 20px; background-color: #3498db; 
            color: white; text-decoration: none; border-radius: 5px; 
        }
    </style>
</head>
<body>
    <div class="box">
        <h1><?php echo $titulo; ?></h1>
        <p><?php echo $mensagem_detalhada; ?></p>
        
        <a href="login_novo.php" class="btn-link">Voltar para a Tela de Login</a>
        
        <p style="margin-top: 20px; font-size: 12px;">Se o problema persistir, contate o suporte.</p>
    </div>
</body>
</html>