<?php
session_start();
require_once "conexao.php";

$pdo = conectar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
</head>
<body>
    
</body>
</html>

<form method="post">
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Nome" 
                            aria-label=".form-control-lg example" type="text" name="nome" maxlength="45" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Telefone" 
                            aria-label=".form-control-lg example" type="text" name="telefone" maxlength="11" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="CPF" 
                            aria-label=".form-control-lg example" type="text" name="CPF" maxlength="14" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="RG" 
                            aria-label=".form-control-lg example" type="text" name="RG" maxlength="15" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="E-mail" 
                            aria-label=".form-control-lg example" type="email" name="email" maxlength="45" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Usuário" 
                            aria-label=".form-control-lg example" type="text" name="usuario" maxlength="11" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Senha" 
                            aria-label=".form-control-lg example" type="password" name="senha" maxlength="32" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Repetir senha" 
                            aria-label=".form-control-lg example" type="password" name="senha2" maxlength="32" / required>
                        </div>
                        <input type="submit" name="btnsignup" value="Cadastrar" class="button-submit">
                    </form>



<?php if (isset($_POST['btnsignup'])) {
	//echo'formulario enviado com sucesso';

    $nome       = isset($_POST['nome'])       ? $_POST['nome']        : null;
    $telefone   = isset($_POST['telefone'])   ? $_POST['telefone']    : null;
    $CPF   = isset($_POST['CPF'])        ? $_POST['CPF']         : null;
    $RG   = isset($_POST['RG'])         ? $_POST['RG']          : null;
    $email      = isset($_POST['email'])      ? $_POST['email']       : null; 
    $usuario    = isset($_POST['usuario'])    ? $_POST['usuario']     : null;
    $senha      = isset($_POST['senha'])      ? md5($_POST['senha'])  : null;

    // falta o cpf 


    if(empty($nome) || empty($telefone) || empty($email) || empty($usuario) || empty($senha) ){
        echo "Necessário preencher todos os campos";
        exit();
    }

    //    $sql = "SELECT nome, telefone, email, usuario, senha FROM tb_cliente WHERE nome = :n, telefone = :t, email = :e, usuario = :u AND senha = :s";
    $sql = "INSERT INTO tb_clientes (nome, telefone, CPF, RG, email, usuario, senha) VALUES (:n , :t, :c, :r, :e , :u, :s)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':n', $nome);
    $stmt->bindParam(':t', $telefone);
    $stmt->bindParam(':c', $CPF);
    $stmt->bindParam(':r', $RG);
    $stmt->bindParam(':e', $email);
    $stmt->bindParam(':u', $usuario);
    $stmt->bindParam(':s', $senha);

    
    if($stmt->execute()){
        echo "Usuário cadastrado com sucesso";
    } else{
        echo "Insira os dados de maneira correta";
    }
}
?>