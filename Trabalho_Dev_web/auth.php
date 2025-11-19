<?php
// auth.php - Arquivo de autenticação final
session_start();

// =========================================================
// 1. CONFIGURAÇÃO DE CONEXÃO
// =========================================================
$host = 'localhost';
$db= 'cliente';
$usuario = 'root';
$senha_bd = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
 PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
 $pdo = new PDO($dsn, $usuario, $senha_bd, $options);
} catch (\PDOException $e) {
 die("Erro de Conexão: " . $e->getMessage());
}

// =========================================================
// 2. PROCESSAMENTO DO LOGIN
// =========================================================

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $email_digitado = $_POST['email'] ?? '';
 $senha_digitada = $_POST['senha'] ?? '';

// Validação básica
if (empty($email_digitado) || empty($senha_digitada)) {
 header('Location: erro_dashboard.php?erro=campos_vazios');
 exit;
 }

// --- 3. BUSCA E VERIFICAÇÃO ---
 $sql_select = "SELECT id, nome, senha FROM Usuarios WHERE email = ?";

 try {
 $stmt = $pdo->prepare($sql_select);
 $stmt->execute([$email_digitado]);
 $usuario = $stmt->fetch();

// 4. VERIFICAÇÃO DE CREDENCIAIS
 if ($usuario && password_verify($senha_digitada, $usuario['senha'])) {

// LOGIN BEM-SUCEDIDO!
 $_SESSION['usuario_id'] = $usuario['id'];
 $_SESSION['usuario_nome'] = $usuario['nome'];
 header('Location: produtos.html');
 exit;

 } else {
// Usuário não encontrado OU senha incorreta
 header('Location: erro_dashboard.php?erro=invalido');
 exit;
 }

 } catch (\PDOException $e) {
// Erro de SQL
 header('Location: erro_dashboard.php?erro=bd_erro');
 exit;
 }
} 

// Se não for POST (acesso GET)
else {
 die('Acesso negado diretamente! Use o formulário de login.');}
?>