<?php
session_start();
require_once "conexao.php";

$pdo = conectar();
$id_produto = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

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
    <link rel="shortcut icon" href="favicon.ico">
    <title>Anju's</title>
</head>

<body>
    <!-- header -->
    <?php include "headerEfooter/header2.inc.php"; ?>
    <?php
    $sqlpr = "SELECT * FROM tb_produtos where id_produto = $id_produto LIMIT 1";
    $stmtpr = $pdo->prepare($sqlpr);
    $stmtpr->execute();
    $tb_produtos = $stmtpr->fetch(PDO::FETCH_ASSOC);
    extract($tb_produtos);
    /*var_dump($tb_produto);*/

    ?>
    <!-- body -->
    <section>
        <div class="prod-info">
            <div id="container">
                <div class="row align-items-center">
                    <div class="col fundo-img">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="3000000">
                                    <img src="<?php echo $imagem; ?>" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="3000000">
                                    <img src="<?php echo $imagem; ?>" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="3000000">
                                    <img src="<?php echo $imagem; ?>" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!--<img src="../Images/camisetabase.png" class="img-fluid mw-md-50 mw-lg-30 mb-6 mb-md-0">-->
                    </div>
                    <div class="col fundo-info">

                        <form method="POST">

                            <h6 id="tituloadd"> Nome </h6>
                            <input class="form-control form-control-md" placeholder="<?php echo $nome_produto; ?>" aria-label=".form-control-md example" type="text" style="text-align: center;" name="nome" maxlength="45" />
                            <br>

                            <h6 id="tituloadd"> Valor </h6>
                            <input class="form-control form-control-md" placeholder="<?php echo "R$ " . number_format($valor, 2, ",", "."); ?>" aria-label=".form-control-md example" type="text" style="text-align: center;" name="valor" maxlength="45" />
                            <br>

                            <h6 id="descricao-titulo"> Descrição</h6>

                            <textarea class="form-control" name="descricao" style="text-align: center;" placeholder="<?php echo $descricao; ?>" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2"></label>
                            <br>

                            <h6 id="tituloadd"> Categoria</h6>
                            <select id="categoria" name="categoria" style="text-align: center;" class="form-select form-select-md">
                                <option selected> <?php echo $categoria; ?></option>
                                <option>Minimalista</option>
                                <option>Medio</option>
                                <option>Extravagante</option>
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

                            <h6 id="tituloadd"> Cor </h6>
                            <select id="cor" name="cor" style="text-align: center;" class="form-select form-select-md">
                                <option selected> <?php echo $cor; ?></option>
                                <option>Preto</option>
                                <option>Branco</option>
                                <option>Vermelho</option>
                                <option>Azul</option>
                                <option>Cinza</option>
                            </select>
                            <br><br>

                            <button id="button" style="text-align: center;" name="btnsalvar" type="submit">Salvar alterações</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include "headerEfooter/footer2.inc.php"; ?>

</html>
<?php

if (isset($_POST['btnsalvar'])) {
    $sql = "SELECT * FROM tb_produtos WHERE tb_produtos.id_produto = $id_produto"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $produto = $stmt->fetchAll();
    

    $nome       = $_POST['nome'] != null            ? $_POST['nome']        : $produto[0]['nome_produto'];
    $valor      = $_POST['valor'] != null            ? $_POST['valor']       : $produto[0]['valor'];
    $descricao  = $_POST['descricao'] != null        ? $_POST['descricao']   : $produto[0]['descricao'];
    $categoria  = $_POST['categoria'] != null        ? $_POST['categoria']   : $produto[0]['categoria'];
    $tamanho    = $_POST['tamanho'] != null          ? $_POST['tamanho']     : $produto[0]['tamanho'];
    $cor        = $_POST['cor'] != null              ? $_POST['cor']         : $produto[0]['cor'];



    $sql = "UPDATE tb_produtos SET nome_produto = ?, valor = ?, descricao = ?, categoria = ?, tamanho = ?, cor = ? 
    WHERE tb_produtos.id_produto = $id_produto";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $valor);
    $stmt->bindParam(3, $descricao);
    $stmt->bindParam(4, $categoria);
    $stmt->bindParam(5, $tamanho);
    $stmt->bindParam(6, $cor);
    try {
        $stmt->execute();
        echo "<script> alert('Produto alterado com sucesso') </script>";
        header('Location: editarprodutos.php');
    } catch (PDOException $e) {
        echo "<script> alert('Não foi possível alterar produto') </script>";
    }
}
?>