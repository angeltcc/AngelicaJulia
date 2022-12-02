<?php
session_start();
require_once "../Class/conexao.php";

$pdo = conectar();

$sqlpr = "SELECT * FROM tb_materiasprimas";
$stmtpr = $pdo->prepare($sqlpr);
$stmtpr->execute();
$materia = $stmtpr->fetchAll();
$id_materia = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

echo $id_materia;
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
    <script src="../JS/script.js"></script>
    <link rel="stylesheet" href="../CSS/index2.css">  
    <link rel="stylesheet" href="../CSS/produtos2.css">     
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.ico">
        <title>Anju's</title>
    </head>    
    <body>
    <!-- header -->
    <?php include "../Class/header2.inc.php"; ?>
    <!-- body -->
    <section>
            <div class="gallery">
            <div class="content2">         
            <a href="../Admin/view-addper.php">
            <button type="image">
                  <img id="adicionar" src="../Images/Icons/iconadicionarbranco.png">
                </button>
            </a>
            </div>
                    <?php foreach ($materia as $m) { ?>
                        <div class="content">
                    <img class="produto" src="<?php echo $m['imagem']; ?>">
                    <h3><?php echo $m['nome']; ?></h3>
                    <p class="p-produto"><?php echo $m['modelagem']; ?> - <?php echo $m['tamanho']; ?> </p>
                    <h6><?php echo "R$ " . number_format ($m['valor'], 2, ",", ".") . "<br>"; ?></h6>
                    <div class="cor">
                       <!-- <a href="view-editprod.php?id=<?php //echo $p['id_produto']; ?>" ><button class="buy">editar</button></a> -->
                        <div class="btn-group" >
                            <a href="view-editpersonalizado.php?id=<?php echo $m['id_materia']; ?>"><button style="margin-left: -10px;" type="button" class="alterar">
                            <img src="../Images/editar.png" style="width: 50px;">                          
                            </button></a>

                            <a href="../Class/delpersonalizado.php?id=<?php echo $m['id_materia']; ?>" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
                            <button type="submit" class="alterar" name="delete">
                            <img src="../Images/excluirprod.png" style="width: 50px;">
                            </button></a>
                        </div>
                    </div>
                </div> 
                <?php }?>
            </div>

    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
        <a class="page-link">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
        <a class="page-link" href="#">Next</a>
        </li>
    </ul>
    </section>
    </body>
    <?php include "../Class/footer2.inc.php"; ?>
</html>
