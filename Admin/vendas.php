<?php
session_start();
require_once "../Class/conexao.php";

$pdo = conectar();

$sqlpr = "SELECT * FROM tb_vendas";
$stmtpr = $pdo->prepare($sqlpr);
$stmtpr->execute();
$vendas = $stmtpr->fetchAll();

?>
<!doctype html>
<html lang="pt-br">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="../CSS/index2.css">    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">   
    <link rel="shortcut icon" href="../favicon.ico">
        <title>Anju's</title>
    </head>    
    <body>
    <!-- header -->
    <?php include "../Class/header2.inc.php"; ?>
    <!-- body -->
    <section>
    <h1> Listagem de vendas</h1>
    <table class="table col-6">
        <thead>
            <tr>
                <th scope="col" class="col-4">Id</th>
                <th scope="col" class="col-4">Data</th>
                <th scope="col" class="col-4">Cliente</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($vendas as $v) {?>
                <tr>
                    <td><?php echo $v['id_venda']; ?></td>
                    <td><?php echo $v['data_venda']; ?></td>
                    <td><?php echo $v['cliente']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>    




    </section>
    </body>
    <?php include "../Class/footer2.inc.php"; ?>
</html>