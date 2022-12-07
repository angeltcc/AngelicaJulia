<?php
session_start();
require_once "../Class/conexao.php";

$pdo = conectar();

$sqlpr = "SELECT * FROM tb_produtos LIMIT 12";
$stmtpr = $pdo->prepare($sqlpr);
$stmtpr->execute();
$tb_produtos = $stmtpr->fetchAll();
$id_produto = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

echo $id_produto;
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
    <div class="barrabotao">
        <form class="search" name="pesquisa" method="post">
            <div class="input-group mb-0">
                <button class="btn btn-outline-secondary botao" name="botaobusca" type="submit" id="button-addon1"><img src="../Images/search.png" style="width: 40px; height:40px;"></button>
                <input type="search" name="txtbuscar" id="texto" list="historico" class="form-control form-control-lg pesquisar" placeholder="Pesquisar">
            </div>
        </form>
        <button type="img"> <img src="../Images/filtrarazul.png" data-bs-toggle="modal" data-bs-target="#filtro" style="width: 180px; height: 70px; margin-left: 50px;"></button>
    </div>

    

    <!-- botao pesquisa -->
        <?php if (isset($_POST['botaobusca'])){
            $txtbuscar  = isset($_POST['txtbuscar']) ? $_POST['txtbuscar']: ' ';
            $buscageral = '%' . $txtbuscar . '%';

            $sql        = "SELECT * FROM tb_produtos WHERE nome_produto like ? OR categoria like ? OR modelagem like ? OR cor like ? and estoque > 0";
            $stmt       = $pdo->prepare($sql);
            $stmt->bindParam(1, $buscageral);
            $stmt->bindParam(2, $buscageral);
            $stmt->bindParam(3, $buscageral);
            $stmt->bindParam(4, $buscageral);
            $stmt->execute();
            $tb_produtos = $stmt->fetchAll();
            if($stmt->rowCount() >0){?>

                <datalist id="historico">
                <!-- <option value="Camiseta"></option>
                <option value="Baby look"></option>
                <option value="minimalista"></option> -->
                </datalist>
                
                <div class="gallery">
            <div class="content2">         
            <a href="../Admin/view-adicionar.php">
            <button type="image">
                  <img id="adicionar" src="../Images/Icons/iconadicionarbranco.png">
                </button>
            </a>
            </div>
                    <?php foreach ($tb_produtos as $p) { ?>
                        <div class="content">
                    <img class="produto" src="<?php echo $p['imagem']; ?>">
                    <h3><?php echo $p['nome_produto']; ?></h3>
                    <p class="p-produto"><?php echo $p['descricao']; ?></p>
                    <h6><?php echo "R$ " . number_format ($p['valor'], 2, ",", ".") . "<br>"; ?></h6>
                    <div class="cor">
                       <!-- <a href="view-editprod.php?id=<?php //echo $p['id_produto']; ?>" ><button class="buy">editar</button></a> -->
                        <div class="btn-group" >
                            <a href="view-editprod.php?id=<?php echo $p['id_produto']; ?>"><button style="margin-left: -10px;" type="button" class="alterar">
                            <img src="../Images/editar.png" style="width: 50px;">                          
                            </button></a>

                            <a href="../Class/delete.php?id=<?php echo $p['id_produto']; ?>" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
                            <button type="submit" class="alterar" name="delete">
                            <img src="../Images/excluirprod.png" style="width: 50px;">
                            </button></a>
                        </div>
                    </div>
                </div> 
                    <?php } 
            }else{ echo "<div class='container'>
                <div class='row justify-content-md-center'>
                <h1 id='lilas'>Produto não encontrado</h1> <br/> 
                <a href='editarprodutos.php'><button id='button'>voltar</button></a>
                </div>
                </div>"; }
        } else{     
            $sql        = "SELECT * FROM tb_produtos where estoque > 0";
            $stmt       = $pdo->prepare($sql);
            $stmt->execute();
            $tb_produtos = $stmt->fetchAll(); ?>
                        
            <div class="gallery">
            <div class="content2">
            <a href="view-adicionar.php">
            <button type="image">
                    <img id="adicionar" src="../Images/Icons/iconadicionarbranco.png">
                </button>
            </a>
            </div>
                <?php foreach ($tb_produtos as $p) { ?>    
                <div class="content">
                    <img class="produto" src="<?php echo $p['imagem']; ?>">
                    <h3><?php echo $p['nome_produto']; ?></h3>
                    <p class="p-produto"><?php echo $p['descricao']; ?></p>
                    <h6><?php echo "R$ " . number_format ($p['valor'], 2, ",", ".") . "<br>"; ?></h6>
                    <div class="cor">
                       <!-- <a href="view-editprod.php?id=<?php //echo $p['id_produto']; ?>" ><button class="buy">editar</button></a> -->
                        <div class="btn-group">
                            <a href="view-editprod.php?id=<?php echo $p['id_produto']; ?>"><button style="margin-left: -10px;" type="button" class="alterar">
                            <img src="../Images/editar.png" style="width: 50px;">                          
                            </button></a>
                            
                            <a href="../Class/delete.php?id=<?php echo $p['id_produto']; ?>" onclick="return confirm('Tem certeza que deseja deletar este registro?')"><button type="submit" class="alterar" name="delete">
                            <img src="../Images/excluirprod.png" style="width: 50px;">
                            </button></a>

                        </div>
                    </div>
                </div> 
        <?php } }?>

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

        <!-- Modal -->
    <div class="modal fade" id="filtro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            
        <form action="filtro2.php" name="filtro" method="post">
        <div class="modal-body">
            <h1 id="lilas" class="text-center"> Categorias </h1>
            <div class="form-check">
                    <input class="form-check-input" name="minimalista" type="checkbox" value="minimalista" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            Minimalista
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="medio" type="checkbox" value="medio" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            Médio
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="extravagante" type="checkbox" value="extravagante" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            Extravagante
                        </label>
                    </div>
                <br/>
                <h1 id="lilas" class="text-center"> Tamanho </h1>
                    <div class="form-check">
                        <input class="form-check-input" name="PP" type="checkbox" value="PP" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            PP
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="P" type="checkbox" value="P" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            P
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="M" type="checkbox" value="M" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            M
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="G" type="checkbox" value="G" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            G
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="GG" type="checkbox" value="GG" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            GG
                        </label>
                    </div> 
                    <div class="form-check">
                        <input class="form-check-input" name="GGG" type="checkbox" value="GGG" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            GGG
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="EGG" type="checkbox" value="EGG" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            EGG
                        </label>
                    </div>
                <br/>
                <h1 id="lilas" class="text-center"> Modelagem </h1>
                    <div class="form-check">
                            <input class="form-check-input" name="regular" type="checkbox" value="regular" id="fcustomCheck1">
                            <label class="custom-control-label" for="customCheck1">
                                Regular
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="baby-look" type="checkbox" value="baby_look" id="fcustomCheck1">
                            <label class="custom-control-label" for="customCheck1">
                                Baby-look
                            </label>
                        </div>
                <br/>
                <h1 id="lilas" class="text-center"> Cor </h1>
                    <div class="form-check">
                            <input class="form-check-input" name="preto" type="checkbox" value="preto" id="fcustomCheck1">
                            <label class="custom-control-label" for="customCheck1">
                                Preto
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="branco" type="checkbox" value="branco" id="fcustomCheck1">
                            <label class="custom-control-label" for="customCheck1">
                                Branco
                            </label>
                        </div><div class="form-check">
                            <input class="form-check-input" name="vermelho" type="checkbox" value="vermelho" id="fcustomCheck1">
                            <label class="custom-control-label" for="customCheck1">
                                Vermelho
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="azul" type="checkbox" value="azul" id="fcustomCheck1">
                            <label class="custom-control-label" for="customCheck1">
                                Azul
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="cinza" type="checkbox" value="cinza" id="fcustomCheck1">
                            <label class="custom-control-label" for="customCheck1">
                                Cinza
                            </label>
                        </div>
                        
            </div>
            <div class="modal-footer">
                <input type="submit" id="buttonlilas" name="btnfiltro" value="Filtrar"></input>
                </form>
                </div>
            </div>
        </div>
        </div>
    </body>
    <?php include "../Class/footer2.inc.php"; ?>
</html>
