<?php 
session_start();
require_once "../Class/conexao.php";

$pdo = conectar();

$id_produto = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
/* primeiro chamar a conexão
criar uma variavel pra pegar o id mandado
e nem precisa do if 


if (isset($_POST['delete'])) {
    
    
    */
$sql = "DELETE FROM tb_produtos WHERE id_produto = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id_produto);
$stmt->execute();
        echo "<script> alert('Produto excluído com sucesso.') </script>";
        echo"<script> window.location.assign('../Admin/editarprodutos.php') </script>";
//    } catch (PDOException $e) {
//        echo "<script> alert('Não foi possível excluir produto') </script>";
 //   }

?>