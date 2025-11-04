<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastrar</title>

	<link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>
<body>

<header>
	<h1>Novo Produto</h1>
	<a href="painel.php">Voltar</a>
</header>

<main>
	<form>
		<label>Nome:</label>
		<input type="text" name="nome" required>
		<br>

		<label>Descrição</label>
		<textarea name="descricao" required></textarea>
		<br>

		<label>Preço</label>
		<input type="number" name="preco" step="0.01" required>
		<br>

		<label>Imagem</label>
		<input type="file" name="imagem" accept="image/*">
		<br>

		<button type="submit">Cadastar</button>
	</form>
</main>

</body>
</html>