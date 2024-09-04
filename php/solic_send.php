<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prova";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
    }

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

    $id_user = $_POST["id_user"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $data = $_POST["data"];
    $prioridade = $_POST["prioridade"];
    $status = "Em análise";

    $sql = "INSERT INTO ordem (id_user, nome, descricao, data, prioridade, status) VALUES ('$id_user', '$nome', '$descricao', '$data', '$prioridade', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('SOLICITAÇÃO ENVIADA COM SUCESSO!');history.back();</script>";
        header("refresh:1");
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    $conn->close();
}
            }
        }
    }