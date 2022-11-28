<?php 
session_start();
session_destroy(); 
?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="inserirteste.php" method="post" target="_self">
    <label for="email">Titulo:</label><br>
    <input type="text" id="titulo" name="titulo" value="">
    <br>

    <label for="senha">Descrição:</label><br>
    <input type="text" id="descricao" name="descricao" value="">
    <br>
    <label for="senha">Preço:</label><br>
    <input type="text" id="preco" name="preco" value="">
    <br>
    <button type="submit" id="acao" name="acao" value="cadastrar">Cadastrar</button>
</form>
</body>
</html>