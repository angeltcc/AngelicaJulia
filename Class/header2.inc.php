<header>  
        <div class="container" id="nav-container">
            <nav class="navbar navbar-expand-lg fixed-top">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbar-links" 
                 aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand ms-lg-2" href="#">
                <img id="logo" src="imagens/logo1.png" alt="angelicajulia">
                </a>
                <!-- abrir pagina normal para poder realizar compras -->
                <a type="image" href="index.php" class="flex-shrink-0 order-lg-1 mx-auto ms-lg-0 pe-lg-2 me-lg-2"> 
                    <img src="imagens/icons8-carrinho-de-compras-100.png" height ="40" width="40"/> 
                    <!--<p class="descricao"> carrinho </p> -->
                </a>
                <!--abrir modal login-->
                <button type="image" style="padding-left: 20px;" class="flex-shrink-0 order-lg-1 mx-auto ms-lg-0 pe-lg-2 me-lg-2"
                    data-bs-toggle="modal" data-bs-target="#loginmodal"> <img src="imagens/icons8-usuário-de-gênero-neutro-100.png"
                    height ="40" width="40"/> 
                    <!--<p class="descricao"> login </p> -->
                </button>

                <div class="collapse navbar-collapse justify-content-md-center" id="navbar-links">    
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link info" href="index2.php">
                                Home
                            </a>
                        </li>    
                        <li class="nav-item">
                            <a class="nav-link info" href="editarprodutos.php"> Editar produtos

                            </a>
                            <!--<ul class="dropdown-menu"> 
                                <li><a href="minimalista.php" class="dropdown-item">Minimalista</a></li>
                                <li><a href="medio.php" class="dropdown-item">Médio</a></li>
                                <li><a href="extravagante.php" class="dropdown-item">Extravagante</a></li>
                            </ul> -->
                            
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link info" href="vendas.php">
                                Vendas
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <?php include "login2.php"; ?>
    <?php include "cadastro2.php"; ?>
    <?php include "localizacao.php"; ?>

    


