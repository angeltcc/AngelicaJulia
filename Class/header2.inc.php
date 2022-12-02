<header>  
        <div class="container" id="nav-container">
            <nav class="navbar navbar-expand-lg fixed-top">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbar-links" 
                 aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand ms-lg-2" href="#">
                <img id="logo" src="../Images/logo1.png" alt="angelicajulia">
                </a>
                
                <div class="collapse navbar-collapse justify-content-md-center" id="navbar-links">    
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link info" href="../Admin/index2.php">
                                Home
                            </a>
                        </li>    
                        <li class="nav-item">
                            <a class="nav-link info" href="../Admin/editarprodutos.php"> 
                                Editar produtos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link info" href="../Admin/editpersonalizado.php"> 
                                Personalizado
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link info" href="../Admin/vendas.php">
                                Vendas
                            </a>
                        </li>
                    </ul>
                </div>
                <!--abrir pagina normal para poder realizar compras-->
                <a type="image" href="../Public/carrinho.php" style="margin-right: 2rem;"> 
                    <img src="../Images/Icons/icons8-carrinho-de-compras-100.png" height ="40" width="40"/> 
                    <!--<p class="descricao"> carrinho </p> -->
                </a>

                <!--abrir modal login-->
                <div class="dropend">
                <button type="image" style="margin-right: 1.5rem; margin-left: 1.5rem;" 
                class="flex-shrink-0 order-lg-1 mx-auto ms-lg-0 pe-lg-2 me-lg-2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../Images/Icons/icons8-usuário-de-gênero-neutro-100.png"
                                    height ="40" width="40"/>
                </button>

                <ul class="dropdown-menu">
                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal" 
                    style="margin-left: -20px;"	data-bs-target="#loginmodal">Login</button></li>

                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                    style="margin-left: -20px;"	data-bs-target="#cadastromodal">Cadastro</button></li>

                    <li><a href="../Public/index.php">
                    <button class="dropdown-item" type="button" style="margin-left: -20px;">Página comum</button></a></li>

                    <li><hr class="dropdown-divider" style="margin-left: -20px;"></li>
                    <li><a href="../Class/logout.php" onclick="return confirm('Tem certeza que deseja sair?')">
                    <button class="dropdown-item" type="button" style="margin-left: -20px;">Sair</button></a></li>
                </ul>
                </div>
                <span>

                <?php 
                
                if (isset($_SESSION['nome'])) {
		                echo $_SESSION['nome']; }?> 

                </span>
            </nav>
        </div>
    </header>
    <?php include "../Admin/login2.php"; ?>
    <?php include "../Admin/cadastro2.php"; ?>

    


