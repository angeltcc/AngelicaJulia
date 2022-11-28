<!-- modal login -->
<div class="modal fade" id="loginmodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="exampleModalToggleLabel">Iniciar sessão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div class="container fixed-center">
                    <div class="text-center mb-3">
                        <img style="width: 150px;" src="../Images/fantasma.png" />
                        </div>
                            
                <!-- formulario -->
                    <form id="login-usuario-form" method="post">
                        <span id="msgAlertErroLogin"></span>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="E-mail" 
                            aria-label=".form-control-lg example" type="text" name="email" maxlength="45" required/>
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Senha" 
                            aria-label=".form-control-lg example" type="password" name="senha" maxlength="32" required/>
                        </div>
                        <input type="submit" name="btnlogin" value="Entrar" class="button-submit">
                        

                <!-- checkbox -->
                    <div class="container-p">
                        <input class="form-check-input" type="checkbox" value id="loginCheck" checked>
                        </input>
                        <label class="form-check-label" for="loginCheck"> Lembrar de mim </label>
                    </div>

                <!-- esqueceu a senha 
                    <div class="col-12 col-md-6 order-md-1">
                        <a class="amodal" href="headerEfooter/esqueceusenha.php">Esqueceu a senha?</a>
                    </div> -->


                    <div class="container-p">
                        <p class="text-center">Não é nosso cliente? <button class="text amodal" data-bs-target="#cadastromodal" data-bs-toggle="modal">Cadastre-se</a></p>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <?php

if (isset($_POST['btnlogin'])) {
    $email      = isset($_POST['email']) ? $_POST['email']      : null;
    $senha      = isset($_POST['senha']) ? md5($_POST['senha']) : null;

    if(empty($email) && empty($senha)){
        echo "<script>alert('É necessário preencher todos os campos')</script>";
        exit();
    }
    
    $sql = "SELECT * FROM tb_clientes WHERE email = :e AND senha = :s";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':e', $email);
    $stmt->bindParam(':s', $senha);
    $stmt->execute();
    $user = $stmt->fetch();

    if($stmt->rowCount()> 0){
        $_SESSION['nome']  = $user['nome'];
        $_SESSION['nivel'] = $user['nivel'];
        $_SESSION['id']    = $user['id_cliente'];

        if ($_SESSION['nivel'] == 1) {
            echo"<script> window.location.assign('index2.php') </script>";
           } else {
            echo"<script> window.location.assign('index.php') </script>";
            }
        }

       // var_dump($_SESSION);
        
    else{
        echo "<script>alert('Usuário ou senha inválidos')</script>";
        exit();
    }
} ?>