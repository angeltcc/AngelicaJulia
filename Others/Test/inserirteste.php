<?php 
try { 

$titulo = $_REQUEST['titulo'];
$descricao = $_REQUEST['descricao'];
$preco = $_REQUEST['preco'];

    $pdo = new PDO('mysql:host=localhost;dbname=diner', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $stmt = $pdo->prepare('INSERT INTO prato(titulo, descricao, preco) VALUES(:titulo, :descricao, :preco)'); 
    $stmt->execute(array( ':titulo' => '$titulo' )); 
    $stmt->execute(array( ':descricao' => '$descricao' )); 
    $stmt->execute(array( ':preco' => '$preco' )); 
    echo $stmt->rowCount();
     } catch(PDOException $e) { 
        echo 'Error: ' . $e->getMessage();
     }
?>