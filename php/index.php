<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../img/icon.png" type="image/icon type">
	<title>Início</title>
</head>

<body>

	<?php
	require 'conexao.php';
	@$cookie = $_COOKIE["user"];
	@$ncookie = $_COOKIE["nome"];
  	if (isset($cookie)) {
		$query_select = "SELECT user, nome FROM users WHERE user = '$cookie'";
        $select = mysqli_query($conn,$query_select);
        $array = mysqli_fetch_assoc($select);
		if ($array["user"] === 'admin'){
			require '../html/admin.html';
			echo "<center><br><br><br><br><br><br><br><br>
			<h1 style='color: #ddd'>Bem-vindo, $ncookie !</h1>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class='navbar'>
			</div></center>";
		}elseif ($array["user"] != 'admin'){
			require '../html/cliente.html';
			echo "<center><br><br><br><br><br><br><br><br>
			<h1 style='color: #ddd'>Bem-vindo, $ncookie !</h1>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class='navbar'>
			</div></center>";
		}
  	}else{
    	require '../html/login.html';
	}
	   ?>	
</body>

</html>