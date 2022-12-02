<?php 
session_start();
require_once "../Class/conexao.php";

$pdo = conectar();

$id_endereco = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
/* primeiro chamar a conexão
criar uma variavel pra pegar o id mandado
e nem precisa do if 


if (isset($_POST['delete'])) {
    
    
    */
$sql = "DELETE FROM tb_enderecos WHERE id_endereco = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id_endereco);
$stmt->execute();
        echo "<script> alert('Endereço excluído com sucesso.') </script>";
        echo"<script> window.location.assign('../Public/index.php') </script>";
//    } catch (PDOException $e) {
//        echo "<script> alert('Não foi possível excluir produto') </script>";
 //   }

?>