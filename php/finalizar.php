<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINALIZANDO</title>
    <link rel="icon" href="../img/icon.png" type="image/icon type">
</head>
<?php
    require_once "conexao.php";

    $id_ordem = $_GET["id_ordem"];
    $status = "Finalizado";
  
    if($status != ""){
    $sql = "UPDATE ordem SET status = '$status' WHERE id_ordem = '$id_ordem'";
    if ($conn->query($sql) === TRUE) {
        echo"<script>alert('SOLICITAÇÃO FINALIZADA COM SUCESSO!');history.go(-2);</script>";
    } else {
        echo"<script>alert('ERRO AO FINALIZAR SOLICITAÇÃO!');history.go(0);</script>";
        header("refresh:2;url=solic.php");
    }
}
    $conn->close();
?>