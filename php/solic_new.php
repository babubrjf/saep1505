<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nova Solicitação</title>
	<link rel="stylesheet" href="../css/style.css" integrity="" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<center>
		<div class='topnav'>
			<a href='index.php'>Início</a>
			<a class='active' href='solic_new.php'>Nova Solicitação</a>
			<a href='solic_view.php'>Minhas Solicitações</a>
			<a href='logout.php' onclick="return confirm('Deseja deslogar do sistema?')">Sair</a>
		</div>
		<?php
		require 'conexao.php';
		@$cookie = $_COOKIE["user"];
		@$ncookie = $_COOKIE["nome"];
		  if (isset($cookie)) {
			$query_select = "SELECT * FROM users WHERE user = '$cookie'";
			$select = mysqli_query($conn,$query_select);
			$array = mysqli_fetch_assoc($select);
			if ($result = $conn -> query($query_select)) {
				while ($row = $result -> fetch_assoc()) { 
					$id_user = $row['id_user'];
					$nome = $row['nome'];
					$cpf = $row['cpf'];
					$tele = $row['tele'];
					$ende = $row['ende'];
		?>
		<form method="POST" enctype="multipart/form-data" action='solic_send.php'>
			<div>
				<label>
					<h2 style="color:#ffffff">Descrição do serviço:</h2>
				</label>
				<textarea name="descricao" id="descricao" cols="85" rows="5" placeholder="(MÁX 100 CARACTERES)"></textarea>
			</div>

			<h3 style="color:#ffffff">Qual a prioridade da ordem?</h3>
                <select name="prioridade" id="prioridade" required="required">
                    <option value="">Selecione uma opção</option>
                    <option value="Alta">Alta</option>
                    <option value="Media">Média</option>
                    <option value="Baixa">Baixa</option>
                </select>

			<br>

			<h4 style="color:#ffffff">Data da ordem</h4>

			<label for="data" style="color:#ffffff">Data:</label>
			<input type="date" id="data" name="data" required>

			<br>

			<label><h4 style="color:#ffffff">Dados do cliente:</h4></label>

			<label style="color:#ffffff" class='form-group' for="id_user"></label>
			<input type="hidden" id="id_user" name="id_user" value="<?php echo $id_user; ?>" required>

			<label style="color:#ffffff" class='form-group' for="nome">NOME:</label>
			<input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>

			<label style="color:#ffffff" class='form-group' for="cpf">CPF:</label>
			<input type="number" id="cpf" name="cpf" value="<?php echo $cpf; ?>" required>

			<label style="color:#ffffff" class='form-group' for="telefone">Telefone:</label>
			<input type="number" id="tele" name="tele" value="<?php echo $tele; ?>" required>

			<label style="color:#ffffff" class='form-group' for="endereco">Endereço:</label>
			<input type="text" id="ende" name="ende" value="<?php echo $ende; ?>" required>

			<br><br>
			<h3 style="color:#ffffff" >(Verifique seus dados antes do envio)</h3>
			<button type='submit' class='btn mt-4'>CONTINUAR</button><br><br>
			<a style="color:#ddd" href="index.php">Cancelar Solicitação</a>
		</form>
		<?php
				}
			}
		}
		$conn->close();
		?>

		<div class='navbar'></div>
		<center>
</body>

</html>