<?php
session_start();
include_once "conexao.php";

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
    <link rel="stylesheet" href="index.css">    
        <title>Bem vindo!</title>
    </head>    
    <body>
    <!-- header -->
    <?php include "headerEfooter/header.inc.php"; ?>
    <!-- body -->
        <div class="container">
        <body>
    <div class="form-group">
        <form method="POST">
            <label>Nome: </label>
            <input type="text" name="nome"/ required>
            <br><br>
            <label>CPF: </label>
            <input type="text" id="cpf" placeholder="Apenas Números"/ required>
            <br><br>
            <label>RG: </label>
            <input type="text" name="rg" placeholder="Apenas Números"/ required>
            <br><br>
            <label>Cidade: </label>
            <input type="text" name="cidade"/ required>
            <br><br>
            <label>Endereço: </label>
            <input type="text" name="endereco"/ required>
            <br><br>
            <label>Complemento: </label>
            <input type="text" name="complemento">
            <br><br>
            <label>CEP: </label>
            <input type="text" name="cep"/ required>
            <br><br>
            <label>Telefone: </label>
            <input type="text" name="telefone"/ required>
            <br><br>
            <label>E-mail: </label>
            <input type="text" name="email"/ required>
            <br><br>
            <label>Tipo de cadastro </label>
            <input type="text" name="cadastro">
            <br><br>
            <label>Escolha seu nome de usuário: </label>
            <input type="text" name="usuario"/ required>
            <br><br>
            <label>Escolha sua senha: </label>
            <input type="text" name="senha"/ required>
            <br><br>
            <input type="submit" name="btnsignup" value="Sign up" class="btn btn-primary">
            </form>
        </div>
    </body>
        </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </body>
</html>
<?php
if (isset($_POST['btnSalvar'])) {
	echo'formulario enviado com sucesso';
}

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$rg = isset($_POST['rg']) ? $_POST['rg'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
$cep = isset($_POST['cep']) ? $_POST['cep'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$cadastro = isset($_POST['cadastro']) ? $_POST['cadastro'] : null;
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;


if(empty($usuario) && empty($senha)){
        echo "Necessário informar usuario e senha";
        exit();
    }

    $sql = "SELECT nome, cpf, rg, endereco, cep, complemento, telefone, email, tipo_cadastro, usuario, senha,  FROM tb_cliente WHERE nome = :n, cpf = :c, rg = :r, 
    cidade = :ci, endereco = :e, complemento = :co, cep = :ce, telefone = :t, email = :em, cadastro = :ca, usuario = :u AND senha = :s";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':n', $nome);
    $stmt->bindParam(':c', $cpf);
    $stmt->bindParam(':r', $rg);
    $stmt->bindParam(':ci', $cidade);
    $stmt->bindParam(':e', $endereco);
    $stmt->bindParam(':co', $complemento);
    $stmt->bindParam(':ce', $cep);
    $stmt->bindParam(':t', $telefone);
    $stmt->bindParam(':em', $email);
    $stmt->bindParam(':ca', $cadastro);
    $stmt->bindParam(':u', $usuario);
    $stmt->bindParam(':s', $senha);
    if ($stmt->execute()) {
        echo ('Registro inserido com sucesso');
        }
?>

