<?php
include('conexao.php');
$nome = "Administrador";
$email = "admin@email.com";
$senha = password_hash("123456", PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios(nome, email, senha) VALUES(?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("sss", $nome, $email, $senha);
$stmt->execute();
echo "usuario criado com sucesso!";

?>