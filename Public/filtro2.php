<?php
    session_start();
    require_once "conexao.php";
    
    $pdo = conectar();
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);

    $sqlpr = "SELECT * FROM tb_produtos LIMIT 12";
    $stmtpr = $pdo->prepare($sqlpr);
    $stmtpr->execute();
    $tb_produtos = $stmtpr->fetchAll();
    
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
    <link rel="shortcut icon" href="favicon.ico">
        <title>Anju's</title>
    </head>    
<body>
    <!-- header -->
    <?php include "headerEfooter/header2.inc.php"; ?>
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
    <?php if (isset($_POST['botaobusca'])){
            $txtbuscar  = isset($_POST['txtbuscar']) ? $_POST['txtbuscar']: ' ';
            $buscageral = '%' . $txtbuscar . '%';

            $sql        = "SELECT * FROM tb_produtos WHERE nome_produto LIKE ? OR categoria LIKE ? OR modelagem LIKE ? OR cor LIKE ? OR descricao LIKE ? AND     estoque > 0";
            $stmt       = $pdo->prepare($sql);
            $stmt->bindParam(1, $buscageral);
            $stmt->bindParam(2, $buscageral);
            $stmt->bindParam(3, $buscageral);
            $stmt->bindParam(4, $buscageral);
            $stmt->bindParam(5, $buscageral);
            $stmt->execute();
            $tb_produtos = $stmt->fetchAll();
            if($stmt->rowCount() >0){?>

                <datalist id="historico">
                <!-- <option value="Camiseta"></option>
                <option value="Baby look"></option>
                <option value="minimalista"></option> -->
                </datalist>
                
                <div class="gallery">
                    <?php foreach ($tb_produtos as $p) { ?>
                    <div class="content">
                        <img class="produto" src="<?php echo $p['imagem']; ?>">
                        <h3><?php echo $p['nome_produto']; ?></h3>
                        <p class="p-produto"><?php echo $p['descricao']; ?></p>
                        <h6><?php echo "R$ " . number_format ($p['valor'], 2, ",", ".") . "<br>"; ?></h6>
                        <div class="cor">
                            <a href="view-products.php?id=<?php echo $p['id_produto']; ?>" ><button class="buy">comprar</button></a>
                        </div>
                    </div>
                    <?php } 
            }else{ echo "<div class='container'>
                <div class='row justify-content-md-center'>
                <h1 id='lilas'>Produto não encontrado</h1> <br/> 
                <a href='produtos.php'><button id='button'>voltar</button></a>
                </div>
                </div>"; } 
            } ?>

<?php         

                if (isset($_POST['btnfiltro'])){
                $tam_pp = isset($_POST['PP']) ? "PP" : "XXX";
                $tam_p  =  isset($_POST['P'])  ? "P" : "XXX";
                $tam_m  =  isset($_POST['M'])   ? "M" : "XXX";
                $tam_g  =  isset($_POST['G'])   ? "G" : "XXX";
                $tam_gg  =  isset($_POST['GG'])   ? "GG" : "XXX";
                $tam_ggg  =  isset($_POST['GGG'])   ? "GGG" : "XXX";
                $tam_egg  =  isset($_POST['EGG'])   ? "EGG" : "XXX";    
                
                $cat_min = isset($_POST['minimalista']) ? "minimalista" : "X";
                $cat_med  =  isset($_POST['medio'])   ? "medio" : "X";
                $cat_ext  =  isset($_POST['extravagante'])   ? "extravagante" : "X";
                
                $mod_reg  =  isset($_POST['regular'])   ? "regular" : "X";
                $mod_bab  =  isset($_POST['baby look'])   ? "baby look" : "X";
                
                $cor_pre  =  isset($_POST['preto'])   ? "preto" : "X";
                $cor_bra  =  isset($_POST['branco'])   ? "branco" : "X";
                $cor_ver  =  isset($_POST['vermelho'])   ? "vermelho" : "X";
                $cor_azu  =  isset($_POST['azul'])   ? "azul" : "X";
                $cor_cin  =  isset($_POST['cinza'])   ? "cinza" : "X"; 

                if($tam_pp == "XXX" AND $tam_p == "XXX" AND $tam_m == "XXX" AND $tam_g == "XXX" AND $tam_gg == "XXX" AND $tam_ggg == "XXX" AND $tam_egg == "XXX"
                AND $cat_min == "X" AND $cat_med == "X" AND $cat_ext == "X"
                AND $mod_reg == "X" AND $mod_bab == "X"
                AND $cor_pre == "X" AND $cor_bra == "X" AND $cor_ver == "X" AND $cor_azu == "X" AND $cor_cin == "X" )
                {
                    $sql = 'SELECT * FROM tb_produtos';
                    $stmt = $pdo->prepare($sql);
                }
                else
                {
                    $sql = 'SELECT * FROM tb_produtos WHERE tamanho = ? OR tamanho = ? OR tamanho = ? OR tamanho = ? OR tamanho = ? OR tamanho = ? OR tamanho = ?
                    OR categoria = ? OR categoria = ? OR categoria = ?
                    OR modelagem = ? OR modelagem = ?
                    OR cor = ? OR cor = ? OR cor = ? OR cor = ? OR cor = ?
                    AND estoque > 0';
    
                    $stmt = $pdo->prepare($sql);
    
                    $stmt->bindParam(1, $tam_pp);
                    $stmt->bindParam(2, $tam_p);
                    $stmt->bindParam(3, $tam_m);
                    $stmt->bindParam(4, $tam_g);
                    $stmt->bindParam(5, $tam_gg);
                    $stmt->bindParam(6, $tam_ggg);
                    $stmt->bindParam(7, $tam_egg);
                    
                    $stmt->bindParam(8, $cat_min);
                    $stmt->bindParam(9, $cat_med);
                    $stmt->bindParam(10, $cat_ext);
                    
                    $stmt->bindParam(11, $mod_reg);
                    $stmt->bindParam(12, $mod_bab);
                    
                    $stmt->bindParam(13, $cor_pre);
                    $stmt->bindParam(14, $cor_bra);
                    $stmt->bindParam(15, $cor_ver);                          
                    $stmt->bindParam(16, $cor_azu);
                    $stmt->bindParam(17, $cor_cin); 
                } 

                $stmt->execute();
                $produto = $stmt->fetchAll();  

                ?>
                <div class="gallery">
                    <?php foreach ($produto as $p) { ?>
                    <div class="content">
                        <img class="produto" src="<?php echo $p['imagem']; ?>">
                        <h3><?php echo $p['nome_produto']; ?></h3>
                        <p class="p-produto"><?php echo $p['descricao']; ?></p>
                        <h6><?php echo "R$ " . number_format ($p['valor'], 2, ",", ".") . "<br>"; ?></h6>
                        <div class="cor">
                            <a href="view-products.php?id=<?php echo $p['id_produto']; ?>" ><button class="buy">comprar</button></a>
                        </div>
                    </div>
                    <?php }   
                }
                ?>  
                </div>

                <!-- Modal -->
<div class="modal fade" id="filtro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">          
            <form action="filtro.php" name="filtro" method="post">
            <div class="modal-body">
                <h1 id="lilas" class="text-center"> Categorias </h1>
                    <div class="form-check">
                    <input class="form-check-input" name="minimalista" type="checkbox" value="minimalista" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            Minimalista
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="medio" type="checkbox" value= "medio" id="fcustomCheck1">
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
                        <input class="form-check-input" name="baby look" type="checkbox" value="baby_look" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            Baby look
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
                    </div>
                    <div class="form-check">
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
                    <!-- modal footer -->
                        <div class="modal-footer">
                            <input type="submit" id="buttonlilas" name="btnfiltro" value="Filtrar"></input>
                        </div>            
                </form>
            </div>
        </div>
    </div>
</div>
    </section>            
</body>
<?php include "headerEfooter/footer2.inc.php"; ?>
</html>