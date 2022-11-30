            <div class="modal-header">
            <h4 class="modal-title"> Iniciar sessão </h4>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modalbody">

            <!--pills signup-->
            <div class="tab-pane fade active show" id="pills-signup" role="tabpanel" aria-labelledby="tab-signup"> 
                <div class="container fixed-center">
                    <!--sign-in-->
                    <div class="text-center mb-3">
                        <p>Cadastrar com:</p>
                        <button type="img" href="google.com" class="mx-1">
                        <img src="imagens/icons8-google-logo-37.png"/>
                        </button>

                        <button type="img" class="mx-1">
                        <img src="imagens/icons8-facebook-novo-37.png"/>
                        </button>

                        <button type="img" class="mx-1">
                        <img src="imagens/icons8-twitter-37.png"/>
                        </button>
                    </div>
                    <div class="text-center mb-3">
                        <p>ou</p>
                    </div>
                    
            <!--formulario login-->
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
                <input type="submit" name="btnlogin" value="Entrar" class="button-submit">
                </form>

            <!-- direcionamento login -->
            <div class="container-p">
                <p class="text-center">Não é nosso cliente? <a class="amodal" href="#pills-login">Cadastre-se</a></p>
            </div>   
        </div>
    </div>
</div>
