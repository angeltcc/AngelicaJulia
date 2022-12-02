<?php
session_start();
require_once "../Class/conexao.php";

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
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/https://unpkg.com/aos@next/dist/aos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Anju's</title>
    </head>    
    
    <body data-aos-easing="ease-out-squad" data-aos-duration="700" data-aos-delay="0">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="js/jquery.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- header -->
        <?php include "../Class/header.inc.php"; ?>
    <!-- body -->
    <section class="scroll">
        <div class="container">
            <div id="limite">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-5 order-md-1 imagem">
                    <!--image -->
                    <img src="../Images/camisetas/camisetabase.png" class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0">
                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1">
                    <h2>
                        Camisetas personalizadas
                    </h2>
                    <h1>
                    O Empório Anju's promove a criatividade e a individualidade de cada um. Por isso, oferecemos variadas opções de estampas, perfeitas para você que é tímido ou até mesmo para você que gosta de chamar a atenção por sua personalidade!
                    </h1>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="scroll">
        <div class="container">
            
            <!-- <div class="row align-items-center justify-content-between mb-8 mb-md-11"> -->
            <div class="row align-items-center">
                <div class="col-12 col-md-7 col-lg-6 order-md-1">
                    <h2>Processo</h2>
                    <h1>Usamos a técnica de estamparia digital, ótima para ter mais durabilidade no desenho, sem perigo de descascar com o tempo. Além disso, o processo é automatizado, o que faz ter mais agilidade na produção.</h1>
                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1 imagem">
                    <div>
                    <!--image-->
                    <img src="https://creazilla-store.fra1.digitaloceanspaces.com/silhouettes/85/cat-silhouette-ac61da-md.png" class="img-fluid mw-md-50 mw-lg-30 mb-6 mb-md-0">
                </div>
            </div>
        </div>
            
    </section>
    <section class="scroll">
    <div class="container">
            <div id="limite">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-5 order-md-1 imagem">
                    <!--image -->
                    <img src="../Images/olhointernet.jpg" class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0">
                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1">
                    <h2>
                        Arte
                    </h2>
                    <h1>
                    Conheça nossas coleções! Desenhos autorais, feitos cuidadosamente para você que quer algo diferente.
                    </h1>
                </div>
            </div>
        </div>
        </div>
    </section>
                        
    <?php include "../Class/footer.inc.php"; ?>
    <script src="../JS/custom.js"></script>
    </body>
</html>