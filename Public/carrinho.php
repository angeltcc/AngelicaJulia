<?php
session_start();

include_once "../Class/conexao.php";

$pdo = conectar();

$sqlpr = "SELECT * FROM tb_clientes";
$stmtpr = $pdo->prepare($sqlpr);
$stmtpr->execute();
$clientes = $stmtpr->fetch();
//var_dump($clientes);
?>

<!doctype html>
<html lang="pt-br">

<head>
	<div class="offcanvas offcanvas-top" tabindex="-1" id="carrinho" aria-labelledby="offcanvasTopLabel">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title" id="offcanvasTopLabel">Offcanvas top</h5>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			...
		</div>
	</div>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="js/jquery.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		
	<link rel="stylesheet" href="../CSS/index.css">
	<title>carrinho</title>
</head>

	<!-- header -->
	<?php include "../Class/header.inc.php"; ?>
	<!-- body -->

	<?php


	if (!isset($_SESSION['nome'])) {
		echo '
	
    <!-- modal login -->
<div class="modal fade show" id="loginmodal" aria-labelledby="exampleModalToggleLabel" tabindex="-1" aria-modal="true" role="dialog" style="display: block;">
        <div class="modal-dialog modal-lg modal-dialog-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="exampleModalToggleLabel">Iniciar sessão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div class="container fixed-center">
                    <div class="text-center mb-3">
                        <img style="width: 150px;" src="../Images/fantasma.png">
                        </div>
                            
                <!-- formulario -->
                    <form id="login-usuario-form" method="post">
					<span id="msgAlertErroLogin"></span>
					<div class="mb-4">
					<input class="form-control form-control-lg" placeholder="E-mail" aria-label=".form-control-lg example" type="text" name="email" maxlength="45" required="">
					</div>
					
					<input class="form-control form-control-lg" placeholder="Senha" aria-label=".form-control-lg example" type="password" name="senha" maxlength="32" 
					
					<!--="" checkbox="" --="">
					<div class="container-p">
					<input type="submit" name="btnlogin" value="Entrar" class="button-submit">
					<br><br>
					<input class="form-check-input" type="checkbox" value="" id="loginCheck" checked="">
					<label class="form-check-label" for="loginCheck"> Lembrar de mim </label>
                    </div>

                <!-- esqueceu a senha -->
                    <div class="col-12 col-md-6 order-md-1">
                        <a class="amodal" href="headerEfooter/esqueceusenha.php">Esqueceu a senha?</a>
                    </div> 


                    <div class="container-p">
                        <p class="text-center">Não é nosso cliente? <button class="text amodal" data-bs-target="#cadastromodal" data-bs-toggle="modal">Cadastre-se<p></p>
                    </button></p></div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
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
                    <img style="width: 150px;" src="../Images/fantasma.png">
                    </div>

                    <!-- formulario -->
                    <form method="post">
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Nome" aria-label=".form-control-lg example" type="text" name="nome" maxlength="45" required="">
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Telefone" aria-label=".form-control-lg example" type="text" name="telefone" maxlength="11" onkeypress="$(this).mask(\'(00) 00000-0000\');" required="">
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="CPF" aria-label=".form-control-lg example" type="text" name="CPF" maxlength="11" onkeypress="$(this).mask(\'000.000.000-00\'), {reverse: true}" required="">
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="E-mail" aria-label=".form-control-lg example" type="email" name="email" maxlength="45" required="">
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Usuário" aria-label=".form-control-lg example" type="text" name="usuario" maxlength="11" required="">
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Senha" aria-label=".form-control-lg example" type="password" name="senha" maxlength="32" required="">
                        </div>
                        <div class="mb-4">
                            <input class="form-control form-control-lg" placeholder="Repetir senha" aria-label=".form-control-lg example" type="password" name="senha2" maxlength="32" required="">
                        </div>
                        <input type="submit" name="btnsignup" value="Cadastrar" class="button-submit">
                    </form>

                    <!-- direcionamento login -->
                    <div class="container-p">
                        <p class="text-center">Já é nosso cliente? <button class="text amodal" data-bs-target="#loginmodal" data-bs-toggle="modal">Entre aqui<p></p>
                    </button></p></div>
                </div>
            </div>
        </div>
    </div>
</div>

    




	<!-- body -->

	<script> document.querySelector(\'#loginmodal\').scrollIntoView(); </script>



<div class="modal-backdrop fade show"></div></body>';
	} else {
		?> <body> <?php 
		$id_cliente = $_SESSION['nome'];

		// Consulta os dados da produto 
		$sql        = "SELECT * FROM tb_clientes WHERE id_cliente = :id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue('id', $id_cliente);
		$stmt->execute();
		$sql = $stmt->fetch();

		if (!isset($_SESSION['carrinho'])) {
			$_SESSION['carrinho'] = array();
		}

		if (isset($_GET['ac'])) {

			// adiciona ao carrinho

			if ($_GET['ac'] == 'add') {
				$id = intval($_GET['id']);
				if (!isset($_SESSION['carrinho'][$id])) {
					$_SESSION['carrinho'][$id] = 1;
				} else {
					$_SESSION['carrinho'][$id] += 1;
				}
			}

			if ($_GET['ac'] == 'del') {
				$id = intval($_GET['id']);
				if (isset($_SESSION['carrinho'][$id])) {
					unset($_SESSION['carrinho'][$id]);
				}
			}

			if ($_GET['ac'] == 'up' && count($_SESSION['carrinho']) != 0) {
				if (is_array($_POST['prod'])) {
					foreach ($_POST['prod'] as $id => $qtd) {
						$id = intval($id);
						$qtd = intval($qtd);
						if (!empty($qtd) || $qtd <> 0) {
							$_SESSION['carrinho'][$id] = $qtd;
						} else {
							unset($_SESSION['carrinho'][$id]);
						}
					}
				}
			}
			echo "<script> window.location.assign('../Public/Carrinho.php') </script>";
		}
	?>
		<section>
			<div class="container w-100 p-3">
				<div class="row justify-content-md-center">
					<div class="bg-light">
						<h1>Carrinho de Compras</h1>

						<table class="table tabela">
							<tr>
								<td class="acao">Ação</td>
								<td>Produto</td>
								<td>Quant</td>
								<td>Preço</td>
								<td>SubTotal</td>
							</tr>
							<form action="?ac=up" method="post">
								<?php
								if (count($_SESSION['carrinho']) == 0) {
									echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
								} else {
									$total = 0;
									$i = 0;

									foreach ($_SESSION['carrinho'] as $id => $qtd) {
										$sql = "SELECT * FROM tb_produtos WHERE id_produto = :p";
										$stmt = $pdo->prepare($sql);
										$stmt->bindValue(':p', $id);
										$stmt->execute();
										$dados = $stmt->fetch(PDO::FETCH_ASSOC);

										$produto = $dados['nome_produto'];
										$preco = number_format($dados['valor'], 2, ',', '.');
										$sub = number_format($dados['valor'] * $qtd, 2, ',', '.');
										$total += $dados['valor'] * $qtd;

										$_SESSION['valor_total'] = $total;
										$i++;
										echo '
					<tr>
						<td><a href="?ac=del&id=' . $id . '"><img src="../Images/lixeira.png" width="20px" height="20px"></a></td>
						<td><b>' . $produto . '</b></td>
						<td><input type="text" style="text-align:right" size="3" name="prod[' . $id . ']" value="' . $qtd . '" /></td>
						<td style="text-align: right;">R$ ' . $preco . '</td>
						<td style="text-align: right;">R$ ' . $sub . '</td>
					</tr>';
									}
									$total = number_format($total, 2, ',', '.');

									echo '<tr>
				<td colspan="2"><input class="btn btn-success col-12" type="submit" value="Atualizar Carrinho" /></td> </td>
				<td colspan="2" class="text-right font-weight-bold">Total</td><td class="font-weight-bold">R$ ' . $total . '</td></tr>';
								} ?>
							</form>

						</table>
						<div class="row justify-content-md-center">
							<div class="col-6"><a class="btn btn-dark col-12" href="produtos.php">Continuar Comprando</a></td>
							</div>
							<div class="col-6"><button type="button" class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#vendas">Finalizar compra</button></div>
						</div>

						<div class="modal fade" id="vendas" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Finalizando a venda</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<form method="post">
											<div class="form-group">
												<label class="col-form-label">Cliente:</label>
												<input type="text" name="cliente" value="<?php echo $id_cliente; ?>" readonly="readonly">
											</div>
											<div class="form-group">
												<?php $hoje = date('d/m/Y'); ?>
												<label class="col-form-label">Data:</label>
												<input type="text" value="<?php echo $hoje; ?>" readonly="readonly">
											</div>
									</div>
									<div class="modal-footer">
										<button type="submit" name="finalizaVenda" class="btn btn-primary">Finalizar compra</button>
									</div>
									</form>
								</div>
							</div>
						</div>
		</section>
		<?php include "../Class/footer.inc.php"; ?>

	<?php
	} ?>

</body>

</html>
<?php
/*if (isset($_POST['finalizaVenda'])) {

	$Movimentos = array(
		'tipo' => "S",
		'cliente' => (int) $_SESSION['cliente'],
		'dataCompra' => date('Y-m-d'),
		'valorTotal' => $_SESSION['valor_total']
	);

	$movimento   = $crud->insert($Movimentos);

	$_SESSION['ultimoId'] = $movimento[1];
	//var_dump($_SESSION);

	//inserindo os itens comprados 
	foreach ($_SESSION['carrinho'] as $id => $qtd) {

		$stmt = $pdo->prepare("insert into tb_vendas (id_venda, data_venda, cliente) values (?,?,?)");
		$stmt->bindValue('1', $_SESSION["ultimoId"]);
		$stmt->bindValue('2', $id);
		$stmt->bindValue('3', $qtd);
		$stmt->execute();

		$stmt = $pdo->prepare("insert into tb_vendaprodutos (venda, produto, cliente, quantidade) values (?,?,?)");
		$stmt->bindValue('1', $_SESSION["ultimoId"]);
		$stmt->bindValue('2', $id);
		$stmt->bindValue('3', $qtd);
		$stmt->execute();


		unset($_SESSION['carrinho']);
		unset($_SESSION['valor_total']);

		header("Location: produtos.php");
	}
} */
?>