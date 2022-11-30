<?php
header('Location: Public/index.php');
?>
<!doctype html>
<html lang="pt-br">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">    
        <title>Bem vindo!</title>
    </head>    
    <body>
    <!-- header -->
        <?php include "headerEfooter/header.inc.php"; ?>
    <!-- body -->
    <section class="pt-4 pt-md-11">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-1" style="margin-left:-70px; margin-right:70px;">
                    <!--image-->
                    <img src="imagens/camisetabase2.png" class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0">
                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1">
                    <h2>
                        Lorem Ipsum
                    </h2>
                    <h1>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dignissim turpis sit amet sodales vulputate. Duis eu ex id erat tincidunt aliquet. Aenean eget mauris mi. Proin faucibus lacinia sodales. Donec congue quam vitae ipsum varius, id dictum risus maximus. Proin at nunc in mi pharetra feugiat vitae sagittis quam. Morbi malesuada eros quis varius facilisis. Donec tempor semper sem ac auctor.
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="parallax.js-1.5.0/parallax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </body>
</html>
