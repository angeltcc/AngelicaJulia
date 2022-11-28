<?php
session_start();
require_once "conexao.php";

$pdo = conectar();

$sqlpr = "SELECT * FROM tb_materiasprimas";
$stmtpr = $pdo->prepare($sqlpr);
$stmtpr->execute();
$tb_materiasprimas = $stmtpr->fetchAll();


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
    <link rel="stylesheet" href="../CSS/index.css">  
    <link rel="stylesheet" href="../CSS/produtos.css">     
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico">
        <title>Anju's</title>
    </head>    
    <body>
    <!-- header -->
    <?php include "headerEfooter/header.inc.php"; ?>
    <!-- body -->
    <section>
        
        <div class="gallery">
                    <?php foreach ($tb_materiasprimas as $m) { //quero colocar condição para que camisetas de nomes iguais e tamanhos diferentes não aparecam?>
                    <div class="content">
                        <img class="produto" src="<?php echo $m['imagem']; ?>">
                        <h3><?php echo $m['nome']; ?></h3>
                        <p class="p-produto"><?php echo $m['modelagem']; ?></p>
                        <h6><?php echo "R$ " . number_format ($m['valor'], 2, ",", ".") . "<br>"; ?></h6>
                        <div class="cor">
                            <a href="view-personalized.php?id=<?php echo $m['id_materia']; ?>" ><button class="buy"> pedir </button></a> 
                        </div>
                    </div>
                    <?php }  ?>
        </div>
    </section>
    </body>
    <?php include "headerEfooter/footer.inc.php"; ?>
</html>