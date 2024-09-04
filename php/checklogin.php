<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHECKING</title>
    <link rel="icon" href="../img/icon.png" type="image/icon type">
</head> <?php

$user = $_POST["user"];
$senha = $_POST["senha"];
$connect = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connect,"prova");
$verifica = mysqli_query($connect, "SELECT * FROM users WHERE user = '$user' AND senha = '$senha'")
    or die("Erro ao selecionar");
    if (mysqli_num_rows($verifica)<=0){
        echo "<script>alert('USUÁRIO OU SENHA INCORRETOS!');history.back();</script>";
        header("refresh:2;url=index.php");
        die();
    }else{
        $query_select = "SELECT id_user, nome, user FROM users WHERE user = '$user'";
        $select = mysqli_query($connect,$query_select);
        $array = mysqli_fetch_array($select);
        @$id_userarray = $array["id_user"];
        @$userarray = $array["user"];
        @$nomearray = $array["nome"];
        setcookie("user",$userarray);
        setcookie("nome",$nomearray);
        setcookie("id_user",$id_userarray);
        header("Location:index.php");
    }