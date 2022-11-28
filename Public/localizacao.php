<div class="modal fade" id="localizacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-top">
    <div class="modal-content">
      <div class="modal-header">
            <h1 class="modal-title fs-4" id="exampleModalLabel"> Localização </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
            <div class="container">
                <button type="image" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample"> <img src="../Images/icons8-adicionar-100.png" height="50px" width="50px"/> </button>
                <span class="fs-5" id="lilas" style="padding-left: 10px;"> adicionar localização </span> 
            <br>
            <div class="collapse" id="collapseExample" style="margin-top: 2rem;">
                <form method="post">
                <div class="row">
                    <div class="col-md-5">
                            <label for="cidade" class="form-label" id="lilas">Cidade</label>
                            <input type="text" name="cidade" class="form-control" id="cidade" required>
                    </div>
                        <div class="col-md-3">
                            <label for="estado" class="form-label" id="lilas">Estado</label>
                            <select id="inputestado" name="estado" class="form-select" required>
                            <option selected> Selecionar...</option>
                            <option>AC</option>
                            <option>AL</option>
                            <option>AP</option>
                            <option>AM</option>
                            <option>BA</option>
                            <option>CE</option>
                            <option>DF</option>
                            <option>ES</option>
                            <option>GO</option>
                            <option>MA</option>
                            <option>MT</option>
                            <option>MS</option>
                            <option>MG</option>
                            <option>PA</option>
                            <option>PB</option>
                            <option>PR</option>
                            <option>PE</option>
                            <option>PI</option>
                            <option>RJ</option>
                            <option>RN</option>
                            <option>RS</option>
                            <option>RO</option>
                            <option>RR</option>
                            <option>SC</option>
                            <option>SP</option>
                            <option>SE</option>
                            <option>TO</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                        <label for="cep" class="form-label" id="lilas">CEP</label>
                        <input type="text" name="cep" class="form-control" id="cep" placeholder="Apenas números" onkeypress="$(this).mask('99.999-999'), {reverse: true}" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="rua" class="form-label" id="lilas">Rua</label>
                        <input type="text" name="rua" class="form-control" id="rua" placeholder="Rua Xxx, 000" required>
                    </div>
                    <div class="col-md-6">
                        <label for="complemento" class="form-label" id="lilas">Complemento</label>
                        <input type="text" name="complemento" class="form-control" id="complemento" required>
                    </div>
                    
                    <div class="col-12">
                        <label for="bairro" class="form-label" id="lilas">Bairro</label>
                        <input type="text" name="bairro" class="form-control" id="bairro" required>
                    </div>     
                </div>
            </div>
        </div>
    </div>
    <?php   if (isset($_POST['btnlocation'])) {

$rua            = isset($_POST['rua'])              ? $_POST['rua']       : null;
$bairro         = isset($_POST['bairro'])           ? $_POST['bairro']       : null; 
$CEP            = isset($_POST['cep'])              ? $_POST['cep']          : null;
$complemento    = isset($_POST['complemento'])      ? $_POST['complemento']  : null;
$cidade         = isset($_POST['cidade'])           ? $_POST['cidade']     : null;
$estado         = isset($_POST['estado'])           ? $_POST['estado']       : null;
$cliente        = (int)$_SESSION['id']; // aqui só 6, falta 1 ai falta 1 campo

$sql = "INSERT INTO tb_enderecos (rua, bairro, CEP, complemento, cidade, estado, cliente) VALUES (:r, :b, :c, :co, :ci, :es, :cl)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':r', $rua);    
$stmt->bindParam(':b', $bairro);
$stmt->bindParam(':c', $CEP);
$stmt->bindParam(':co', $complemento);
$stmt->bindParam(':ci', $cidade);
$stmt->bindParam(':es', $estado);
$stmt->bindParam(':cl', $cliente); 
$stmt->execute();
$tb_enderecos = $stmt->fetchAll();
if($stmt->rowCount() >0){

foreach ($tb_enderecos as $e) { ?>
    <div class="container">
        <h1>—</h1> 
        <p id="lilas"> 
            <?php echo $rua ?>
            <?php echo $bairro ?>

        </p>

<?php    
} 
    }
}
//foreach id_endereco adicionar endereço 1, 2, 3 ...
?>
            <div class="modal-footer">
            <button type="submit" name="btnlocation" id="buttonlilas"> Salvar alterações</button>
            </form>          

        </div>
      </div>
    </div>
  </div>
</div>
<?php 
