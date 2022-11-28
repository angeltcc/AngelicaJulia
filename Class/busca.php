<?php 

session_start();

include 'conexao.php';

$pesquisa = $_GET['txtbuscar'];
$consulta = $pdo->query("select * from tb_produtos where nome_produto like concat ('%','$pesquisa','%') || 
modelagem like concat ('%','$pesquisa','%') || cor like concat ('%','$pesquisa','%') || categoria like concat ('%','$pesquisa','%')");

?> 