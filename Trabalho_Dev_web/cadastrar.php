<?php

$host = 'localhost';
$db = 'cliente';
$usuario = 'root';
$senha = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    // Tenta estabelecer a conexão com o BD
    $pdo = new PDO($dsn, $usuario, $senha, $options);
} catch (\PDOException $e) {
    // Se a conexão falhar, exibe o erro e para o script
    die("Erro de Conexão com o Banco de Dados: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nome = $_POST['nome'] ?? NULL;
	$email = $_POST['email'] ?? NULL;
	$senha_simples = $_POST['senha'] ?? NULL;
	$cpf = $_POST['cpf'] ?? NULL;
	$data_nascimento = $_POST['data_nascimento'] ?? NULL;
	$endereco = $_POST['endereco'] ?? NULL;
	$telefone = $_POST['telefone'] ?? NULL;

	if (empty($nome) || empty($email) || empty($senha_simples)) {
		echo "Erro: os campos Nome, E-mail e Senha são obrigatórios!";
		exit;
	}

	$senha_hash = password_hash($senha_simples, PASSWORD_BCRYPT);
	$sql = "INSERT INTO Usuarios (nome, email, senha, cpf, data_nascimento, endereco, telefone) 
	VALUES (?, ?, ?, ?, ?, ?, ?)";

	try {
		
		$stmt = $pdo->prepare($sql);
		$stmt->execute([
			$nome,
			$email,
			$senha_hash,
			$cpf,
			$data_nascimento,
			$endereco,
			$telefone
		]);

		header('Location: login_novo.php');
		exit;

	} catch (\PDOException $e) {
		if ($e->getCode() == 23000) {
			echo "Erro: E-mail ou CPF já cadastrado no sistema.";
		}else{
			echo "Erro ao cadastrar usuário: " . $e->getMessage();
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Usuário</title>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="CSS/style.css">

</head>
<body>

<div class="container">

	<div class="card">

	<h2>Formulário de Cadastro</h2>
	<form action="cadastrar.php" method="POST">

		<h3>Dados de Login</h3>

		<label for="nome">Nome:</label> <br>
		<input class="input" type="text" id="nome" name="nome" placeholder="Digite seu nome" required> <br> <br>

		<label for="email">E-mail:</label> <br>
		<input class="input" type="email" id="email" name="email" placeholder="Digite seu email" required> <br> <br>

		<label for="senha">Senha:</label> <br> 
		<input class="input" type="password" id="senhaInput" name="senha" required> 
		<button class="btn" type="button" id="toggleSenha">👁️</button> <br> <br>

		<h3>Dados Pessoais</h3>

		<label for="cpf">CPF:</label> <br>
		<input class="input" type="text" id="cpf" name="cpf" maxlength="14"> <br> <br>

		<label for="data_nascimento">Data de Nascimento:</label> <br>
		<input class="input" type="date" id="data_nascimento" name="data_nascimento"> <br> <br>

		<label for="telefone">Telefone para Contato:</label> <br>
		<input class="input" type="tel" id="telefone" name="telefone"> <br> <br>

		<label for="endereco">Endereço:</label> <br>
		<textarea id="endereco" name="endereco" rows="4"></textarea> <br> <br>

		<button class="btn" type="submit">Cadastrar Usuário</button>
		
	</form> 

	</div>

</div>

	<script>
		// 1. Pega os elementos do DOM
    const senhaInput = document.getElementById('senhaInput');
    const toggleButton = document.getElementById('toggleSenha');

    // 2. Adiciona um "ouvinte" de evento de clique no botão
    toggleButton.addEventListener('click', function() {
        
        // Verifica o tipo atual do input
        const type = senhaInput.getAttribute('type') === 'password' ? 'text' : 'password';
        
        // 3. Altera o atributo 'type'
        senhaInput.setAttribute('type', type);
        
        // 4. Altera o texto do botão (para feedback visual)
        if (type === 'text') {
            toggleButton.textContent = '🔒';
        } else {
            toggleButton.textContent = '👁️';
        }
    });
	</script>

</body>
</html>