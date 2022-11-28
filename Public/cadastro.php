<!-- modal cadastro -->
<div class="modal fade" id="cadastromodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-top">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalToggleLabel2">Cadastre-se</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container fixed-center">
                    <div class="text-center mb-3">
                    <img style="width: 150px;" src="../Images/fantasma.png" />
                    </div>

                    <!-- formulario -->
                    <form method="post">
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Nome" aria-label=".form-control-lg example" type="text" name="nome" maxlength="45" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Telefone" aria-label=".form-control-lg example" type="text" name="telefone" maxlength="11" onkeypress="$(this).mask('(00) 00000-0000');" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="CPF" aria-label=".form-control-lg example" type="text" name="CPF" maxlength="11" onkeypress="$(this).mask('000.000.000-00'), {reverse: true}" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="E-mail" aria-label=".form-control-lg example" type="email" name="email" maxlength="45" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Usuário" aria-label=".form-control-lg example" type="text" name="usuario" maxlength="11" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Senha" aria-label=".form-control-lg example" type="password" name="senha" maxlength="32" / required>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Repetir senha" aria-label=".form-control-lg example" type="password" name="senha2" maxlength="32" / required>
                        </div>
                        <input type="submit" name="btnsignup" value="Cadastrar" class="button-submit">
                    </form>

                    <!-- direcionamento login -->
                    <div class="container-p">
                        <p class="text-center">Já é nosso cliente? <button class="text amodal" data-bs-target="#loginmodal" data-bs-toggle="modal">Entre aqui</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['btnsignup'])) {
    //echo'formulario enviado com sucesso';

    $nome       = isset($_POST['nome'])       ? $_POST['nome']        : null;
    $telefone   = isset($_POST['telefone'])   ? $_POST['telefone']    : null;
    $CPF        = isset($_POST['CPF'])        ? $_POST['CPF']         : null;
    $email      = isset($_POST['email'])      ? $_POST['email']       : null;
    $usuario    = isset($_POST['usuario'])    ? $_POST['usuario']     : null;
    $senha      = isset($_POST['senha'])      ? md5($_POST['senha'])  : null;
    $senha2     = isset($_POST['senha2'])     ? md5($_POST['senha2']) : null;

    // falta o cpf 


    if (empty($nome) || empty($telefone) || empty($CPF) || empty($email) || empty($usuario) || empty($senha) || empty($senha2)) {
        echo "<script> alert('Necessário preencher todos os campos') </script>";
        exit();
    }

    if ($senha != $senha2) {
        echo "<script> alert('As senhas não coincidem') </script>";
    }

    $CPF = explode(".", $CPF, 3);
    $CPF = $CPF[0] . $CPF[1] . $CPF[2];

    $CPF = explode("-", $CPF, 2);
    $CPF = $CPF[0] . $CPF[1];

    $telefone = explode("(", $telefone, 2);
    $telefone = $telefone[0] . $telefone[1];

    $telefone = explode(")", $telefone, 2);
    $telefone = $telefone[0] . $telefone[1];

    $telefone = explode("-", $telefone, 2);
    $telefone = $telefone[0] . $telefone[1];

    $telefone = explode(" ", $telefone, 2);
    $telefone = $telefone[0] . $telefone[1];

    //    $sql = "SELECT nome, telefone, email, usuario, senha FROM tb_cliente WHERE nome = :n, telefone = :t, email = :e, usuario = :u AND senha = :s";
    $sql = "INSERT INTO tb_clientes (nome, telefone, CPF, email, usuario, senha) VALUES (:n , :t, :c, :e , :u, :s)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':n', $nome);
    $stmt->bindParam(':t', $telefone);
    $stmt->bindParam(':c', $CPF);
    $stmt->bindParam(':e', $email);
    $stmt->bindParam(':u', $usuario);
    $stmt->bindParam(':s', $senha);


    try {
        $stmt->execute();
        echo "<script> alert('Usuário cadastrado com sucesso') </script>";
    } catch (PDOException $e) {
        $erro = explode("'", $e->getMessage(), 5);
        if ($erro[0] == "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry ") echo "<script> alert(' Já existe um usuário usando o " . $erro[3] . " :  " . $erro[1] . "'); </script>";
        else echo "<script> alert('Insira os dados da maneira correta'); </script>";
    } catch (Exception $e) {
        echo "<script> alert('Insira os dados da maneira correta'); </script>";
    }
}
?>