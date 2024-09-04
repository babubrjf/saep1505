<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Solicitações</title>
    <link rel="icon" href="../img/icon.png" type="image/icon type">
    <link rel="stylesheet" href="../css/style.css" integrity="" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
	<center>
        <div class='topnav'>
            <a href='index.php'>Início</a>
            <a href='listar.php'>Listar Clientes</a>
            <a class='active' href='solic.php'>Solicitações</a>
            <a href='logout.php' onclick="return confirm('Deseja deslogar do sistema?')">Sair</a>
        </div>
	<br>
    <h1 style='color: #ffffff'></h1>
    <section style="margin: 50px 0;">
        <div class="container">
            <table class="table table-clear">
                <thead>
                    <tr style='color: #ffffff'>
                        <th scope="col" style="text-align:center">DATA</th>
                        <th scope="col" style="text-align:center">DESCRIÇÃO</th>
                        <th scope="col" style="text-align:center">PRIORIDADE</th>
                        <th scope="col" style="text-align:center">STATUS</th>
                        <th scope="col" style="text-align:center">AÇÕES</th>

                    </tr>
                </thead>
                <tbody> <?php
                require_once "conexao.php";
                $sql_query = "SELECT * FROM ordem";
                if ($result = $conn->query($sql_query)) {
                    while ($row = $result->fetch_assoc()) {
                        $id_ordem = $row["id_ordem"];
						$data = $row["data"];
						$descricao = $row["descricao"];
						$prioridade = $row["prioridade"];
                        $status = $row["status"];
                        ?> <tr style="text-align:center;color: #ffffff">
						<td> <?php echo $data; ?> </td>
                        <td> <?php echo $descricao; ?> </td>
						<td> <?php echo $prioridade; ?> </td>
                        <td> <?php echo $status; ?> </td>
                        <?php
                            if ($status != "Finalizado")
                            {
                                echo '<td>
                                <a style="text-decoration:none" href="finalizar.php?id_ordem=<?php echo $id_ordem; ?>" onclick="return confirm(`Deseja finalizar esta solicitação?`)" class="btn">FINALIZAR</a>
                                </td>';
                            }
                        ?>
                    </tr> 
                    <?php
                    }
                }
                $conn->close();
                ?> </tbody>
            </table>
        </div>
    </section>
    <div class='navbar'>
    </center>
</body>

</html>