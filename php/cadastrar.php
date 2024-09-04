<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRANDO</title>
</head> 
<?php require_once "conexao.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $nome = strtoupper($nome);
        $cpf = $_POST["cpf"];
        $tele = $_POST["tele"];
        $ende = $_POST["ende"];
        $user = $_POST["user"];
        $senha = $_POST["senha"];


        $connect = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connect,"prova");

        $query_select = "SELECT user FROM users WHERE user = '$user'";
        $select = mysqli_query($connect,$query_select);
        $array = mysqli_fetch_array($select);
        @$userarray = $array["user"];
        if($userarray == $user){
            echo"<script>alert('O USUÁRIO JÁ ESTÁ EM USO!');history.back();</script>";            
        }

        elseif($cpf != "" && $nome != "" && $tele != "" && $ende != "" && $user != "" && $senha != ""){
        $sql = "INSERT INTO users (cpf, nome, tele, ende, user, senha) VALUES ('$cpf', '$nome', '$tele', '$ende', '$user', '$senha')";}
    
        if ($conn->query($sql) === TRUE) {
            mkdir("../arquivos/alunos/".$cpf);
            echo"<script>alert('USUÁRIO CADASTRADO COM SUCESSO!');history.go(-2);</script>";
        }else{
            echo"<script>alert('ERRO AO CADASTRAR USUÁRIO');history.back();</script>" . $conn->error;
        }
        }else{
            echo"<script>alert('TODOS OS CAMPOS DEVEM SER PREENCHIDOS');history.back();</script>";
        }
$conn->close();