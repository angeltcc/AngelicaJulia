<?php
session_start();
include_once "../Class/conexao.php";

$pdo = conectar();
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">   
    <link rel="shortcut icon" href="../favicon.ico">
        <title>Anju's</title>
    </head>    
    <body>
    <!-- header -->
    <?php include "../Class/header.inc.php"; ?>
    <!-- body -->
    <section>
<div class="container" style="margin-top: 3rem;" id="localizacao">
    <div class="content">
            <div class="container">
                <div>
                <button type="image" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample" > <img src="../Images/Icons/icons8-adicionar-100.png" height="70px"/> </button>
                <span class="fs-4" id="lilas" style="padding-left: 2rem;"> adicionar localização </span> 
                </div>
            <br>
            <div class="collapse" id="collapseExample" style="margin-top: 2rem;">
                <form method="post">
                <div class="row">
                    <div class="col-md-5">
                            <label for="cidade" class="form-label" id="lilas">Cidade</label>
                            <input type="text" name="cidade" class="form-control" id="cidade" required>
                    </div>
                        <div class="col-md-3">
                            <label for="estado" class="form-label" id="lilas">Estado</label>
                            <select id="inputestado" name="estado" class="form-select" required>
                            <option selected> Selecionar...</option>
                            <option>AC</option>
                            <option>AL</option>
                            <option>AP</option>
                            <option>AM</option>
                            <option>BA</option>
                            <option>CE</option>
                            <option>DF</option>
                            <option>ES</option>
                            <option>GO</option>
                            <option>MA</option>
                            <option>MT</option>
                            <option>MS</option>
                            <option>MG</option>
                            <option>PA</option>
                            <option>PB</option>
                            <option>PR</option>
                            <option>PE</option>
                            <option>PI</option>
                            <option>RJ</option>
                            <option>RN</option>
                            <option>RS</option>
                            <option>RO</option>
                            <option>RR</option>
                            <option>SC</option>
                            <option>SP</option>
                            <option>SE</option>
                            <option>TO</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                        <label for="cep" class="form-label" id="lilas">CEP</label>
                        <input type="text" name="cep" class="form-control" id="cep" placeholder="Apenas números" onkeypress="$(this).mask('99.999-999'), {reverse: true}" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="rua" class="form-label" id="lilas">Rua</label>
                        <input type="text" name="rua" class="form-control" id="rua" placeholder="Rua Xxx, 000" required>
                    </div>
                    <div class="col-md-6">
                        <label for="complemento" class="form-label" id="lilas">Complemento</label>
                        <input type="text" name="complemento" class="form-control" id="complemento" required>
                    </div>
                    
                    <div class="col-12">
                        <label for="bairro" class="form-label" id="lilas">Bairro</label>
                        <input type="text" name="bairro" class="form-control" id="bairro" required>
                    </div>     
                </div>
                <br><br>

                <button type="submit" name="btnlocation" id="buttonlilas"> Salvar alterações</button>
                </form> 
            </div>
           
            </div>
    </div>
</div>




    </section>
    </body>
    <?php include "../Class/footer.inc.php"; ?>
</html>
 <?php   if (isset($_POST['btnlocation'])) {

$rua            = isset($_POST['rua'])              ? $_POST['rua']          : null;
$bairro         = isset($_POST['bairro'])           ? $_POST['bairro']       : null; 
$CEP            = isset($_POST['cep'])              ? $_POST['cep']          : null;
$complemento    = isset($_POST['complemento'])      ? $_POST['complemento']  : null;
$cidade         = isset($_POST['cidade'])           ? $_POST['cidade']       : null;
$estado         = isset($_POST['estado'])           ? $_POST['estado']       : null;
$cliente        = (int)$_SESSION['id']; // aqui só 6, falta 1 ai falta 1 campo

$sql = "INSERT INTO tb_enderecos (rua, bairro, CEP, complemento, cidade, estado, cliente) VALUES (:r, :b, :c, :co, :ci, :es, :cl)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':r', $rua);    
$stmt->bindParam(':b', $bairro);
$stmt->bindParam(':c', $CEP);
$stmt->bindParam(':co', $complemento);
$stmt->bindParam(':ci', $cidade);
$stmt->bindParam(':es', $estado);
$stmt->bindParam(':cl', $cliente); 
$stmt->execute();
$tb_enderecos = $stmt->fetchAll();

if (!isset($_SESSION)) {
	echo"<script> document.querySelector('#loginmodal').scrollIntoView(); </script>";
}

if($stmt->rowCount() >0){

foreach ($tb_enderecos as $e) { ?>
    <div class="container">
        <h1>—</h1> 
        <p id="lilas"> 
            <?php echo $rua ?>
            <?php echo $bairro ?>

        </p>

<?php    
} 
    }
}
//foreach id_endereco adicionar endereço 1, 2, 3 ...
?>
