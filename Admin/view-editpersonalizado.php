<?php
session_start();
require_once "../Class/conexao.php";

$pdo = conectar();
$id_materia = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

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
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
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
    <?php
    $sqlpr = "SELECT * FROM tb_materiasprimas where id_materia = $id_materia LIMIT 1";
    $stmtpr = $pdo->prepare($sqlpr);
    $stmtpr->execute();
    $materias = $stmtpr->fetch(PDO::FETCH_ASSOC);
    extract($materias);
    /*var_dump($tb_produto);*/

    ?>
    <!-- body -->
    <section>
        <div class="prod-info">
            <div id="container">
                <form method="post" enctype="multipart/form-data">
                    <div class="row align-items-center">
                        <div class="col fundo-img">

                            <img src="<?php echo $imagem; ?>" class="d-block w-100" alt="...">
                            <div class="mb-3">
                                <label for="formFile" class="form-label"></label>
                                <input class="form-control" type="file" name="imagem" id="formFile">
                            </div>

                            <!--<img src="../Images/camisetabase.png" class="img-fluid mw-md-50 mw-lg-30 mb-6 mb-md-0">-->
                        </div>
                        <div class="col fundo-info">

                            <h6 id="tituloadd"> Nome </h6>
                            <input class="form-control form-control-md" placeholder="<?php echo $nome; ?>" aria-label=".form-control-md example" type="text" style="text-align: center;" name="nome" maxlength="45" />
                            <br>

                            <h6 id="tituloadd"> Valor </h6>
                            <input class="form-control form-control-md" placeholder="<?php echo "R$ " . number_format($valor, 2, ",", "."); ?>" aria-label=".form-control-md example" type="text" style="text-align: center;" name="valor" maxlength="45" />
                            <br>

                            <h6 id="tituloadd"> Modelagem </h6>
                            <select id="categoria" name="modelagem" style="text-align: center;" class="form-select form-select-md">
                                <option selected> <?php echo $modelagem; ?></option>
                                <option>Regular</option>
                                <option>Baby look</option>
                            </select>
                            <br>

                            <h6 id="tituloadd"> Tamanho </h6>
                            <select id="tamanho" name="tamanho" style="text-align: center;" class="form-select form-select-md">
                                <option selected> <?php echo $tamanho; ?></option>
                                <option>PP</option>
                                <option>P</option>
                                <option>M</option>
                                <option>G</option>
                                <option>GG</option>
                                <option>GGG</option>
                                <option>EGG</option>
                            </select>
                            <br>

                            <button id="button" style="text-align: center;" name="btnsalvar" type="submit">Salvar alterações</button>
                </form>
            </div>
        </div>
        </div>
        </div>
    </section>
</body>
<?php include "../Class/footer2.inc.php"; ?>

</html>
<?php

if (isset($_POST['btnsalvar'])) {
    $sql = "SELECT * FROM tb_materiasprimas WHERE tb_materiasprimas.id_materia = $id_materia";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $materia = $stmt->fetchAll();

    $img     = $_FILES['imagem'];
    $temp       = $img['tmp_name'];
    $nome       = $_POST['nome'] != null             ? $_POST['nome']        : $materia[0]['nome'];
    $valor      = $_POST['valor'] != null            ? $_POST['valor']       : $materia[0]['valor'];
    $modelagem  = $_POST['modelagem'] != null        ? $_POST['modelagem']   : $materia[0]['modelagem'];
    $tamanho    = $_POST['tamanho'] != null          ? $_POST['tamanho']     : $materia[0]['tamanho'];


    $sql = "UPDATE tb_materiasprimas SET imagem = ?, nome = ?, valor = ?, modelagem = ?, tamanho = ? 
    WHERE tb_materiasprimas.id_materia = $id_materia";

    $stmt = $pdo->prepare($sql);

    $img = "../Images/camisetas/" . str_replace(" ", "_", $nome) . ".png";
    $stmt->bindParam(1, $img);
    $stmt->bindParam(2, $nome);
    $stmt->bindParam(3, $valor);
    $stmt->bindParam(4, $modelagem);
    $stmt->bindParam(5, $tamanho);
    try {
        $stmt->execute();
        move_uploaded_file($temp, "../Images/camisetas/" . str_replace(" ", "_", $nome) . ".png");
        echo "<script> alert('Produto alterado com sucesso') </script>";
        echo "<script> window.location.assign('../Admin/editpersonalizado.php') </script>";
    } catch (PDOException $e) {
        echo "<script> alert('Não foi possível alterar produto') </script>";
    }
}
?>