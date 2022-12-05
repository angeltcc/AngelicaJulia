<?php 
session_start();
include_once "../Class/conexao.php";

$pdo = conectar();

//variaveis
$sqlpr = "SELECT email FROM tb_clientes WHERE email = '". $_SESSION['email']."'";
$stmtpr = $pdo->prepare($sqlpr);
$stmtpr->execute();
$email = $stmtpr->fetch();
$email = $email[0];

$sqlpr = "SELECT nome FROM tb_clientes WHERE nome = '". $_SESSION['nome']."'";
$stmtpr = $pdo->prepare($sqlpr);
$stmtpr->execute();
$nome = $stmtpr->fetch();
$nome = $nome[0];

$descricao = $_POST['descricao'];
$color = $_POST['color'];
$file = $_POST['file'];
$tamanho = $_POST['tamanho'];

//corpo da mensagem
$arquivo = "
  <html>
    <p><b> Descrição: </b>$descricao</p>
    <p><b> Cor: </b>$color</p>
    <p><b> Imagem: </b>$file</p>
    <p><b> Tamanho: </b>$tamanho</p>
  </html>";

//email para quem será enviado o formulário
$destino = "angelica.pescador@escola.pr.gov.br";
$assunto = "Pedido camiseta personalizada";

//garantir a exibição correta dos caracteres
$headers = "MIME-Version: 1.0\n";
$headers .="Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: $nome <$email>";

//enviar
ini_set('smtp_port', 587);
mail($destino, $assunto, $arquivo, $headers);
echo "<script> alert('Pedido realizado com sucesso') </script>";
echo "<script> window.location.assign('../Public/personalizado.php') </script>";

?>