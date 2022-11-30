<?php
session_start();

if (!isset($_SESSION)) {
	header('Location: loginCliente.php');
} else {
	$id_cliente = $_SESSION['nome'];
}

include_once "../Class/conexao.php";

$pdo = conectar();

// Consulta os dados da produto 
$sql        = "SELECT * FROM tb_clientes WHERE id_cliente = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('id', $id_cliente);
$stmt->execute();

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
	header("Location: ../Public/carrinho2.php");
}
?>

<!doctype html>
<html lang="pt-br">
    <head>
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
    <body>
    <!-- header -->
    <?php include "../Class/header.inc.php"; ?>
    <!-- body -->
	<body>
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
								$sql = "SELECT * FROM tb_materiasprimas WHERE id_materia = :p";
								$stmt = $pdo->prepare($sql);
								$stmt->bindValue(':p', $id);
								$stmt->execute();
								$dados = $stmt->fetch(PDO::FETCH_ASSOC);

								$produto = $dados['nome'];
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
					<div class="col-6"><a class="btn btn-dark col-12" href="personalizado.php">Continuar Comprando</a></td>
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
										<input type="text" name="cliente" value="<?php echo $tb_clientes->nome; ?>">
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
</body>

</html>
<?php
if (isset($_POST['finalizaVenda'])) {

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

		$stm = $pdo->prepare("insert into itens (Venda_idVenda,Produto_codigoProduto,quantidade) values (?,?,?)");
		$stm->bindValue('1', $_SESSION["ultimoId"]);
		$stm->bindValue('2', $id);
		$stm->bindValue('3', $qtd);
		$stm->execute();


		unset($_SESSION['carrinho']);
		unset($_SESSION['valor_total']);

		header("Location: ../Public/personalizado.php");
	}
}
?>