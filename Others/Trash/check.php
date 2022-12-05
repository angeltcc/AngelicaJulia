
<?php 
               session_start();
//session_unset();
               var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="filtro" method="post">
        <div class="modal-body">
            <h1 id="lilas" class="text-center"> Categorias </h1>
            <div class="form-check">
                    <input class="form-check-input" name="categoria[]" type="checkbox" value="minimalista" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            Minimalista
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="categoria[]" type="checkbox" value="medio" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            Médio
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="categoria[]" type="checkbox" value="extravagante" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            Extravagante
                        </label>
                    </div>
                <br/>
                <h1 id="lilas" class="text-center"> Tamanho </h1>
                    <div class="form-check">
                        <input class="form-check-input" name="tamanho[]" type="checkbox" value="PP" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            PP
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tamanho[]" type="checkbox" value="P" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            P
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tamanho[]" type="checkbox" value="M" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            M
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tamanho[]" type="checkbox" value="G" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            G
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tamanho[]" type="checkbox" value="GG" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            GG
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tamanho[]" type="checkbox" value="GGG" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            GGG
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="tamanho[]" type="checkbox" value="EGG" id="fcustomCheck1">
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
                            <input class="form-check-input" name="baby look" type="checkbox" value="baby look" id="fcustomCheck1">
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
                        <div class="form-check">
                            <input class="form-check-input" name="lilas" type="checkbox" value="lilas" id="fcustomCheck1">
                            <label class="custom-control-label" for="customCheck1">
                                Lilás
                            </label>
                        </div>
            </div>
            <div class="modal-footer">
                <input type="submit" id="buttonlilas" name="filtro" value="Filtrar"></input>
                </form>
                
                <?php 
/*            if(isset($_POST['filtro'])){
                var_dump($_POST['tamanho']);
                echo "====<br>".
                var_dump($_POST['categoria']); */ 

 
            
               ?>

                
            </div>
            </div>
        </div>
        </div>
</body>
</html>