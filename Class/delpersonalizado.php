<?php 
session_start();
require_once "../Class/conexao.php";

$pdo = conectar();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
/* primeiro chamar a conexão
criar uma variavel pra pegar o id mandado
e nem precisa do if 


if (isset($_POST['delete'])) {
    
    
    */
$sql = "DELETE FROM tb_materiasprimas WHERE id_materia = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
        echo "<script> alert('Produto excluído com sucesso.') </script>";
        echo"<script> window.location.assign('../Admin/editpersonalizado.php') </script>";
?>