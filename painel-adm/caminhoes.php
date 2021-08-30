<?php 
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'caminhoes';

require_once($pagina."/campos.php");

?>

<div class="col-md-12 my-3">
	<a href="#" onclick="inserir()" type="button" class="btn btn-dark btn-sm">Novo Caminhão</a>
</div>

<small>
	<div class="tabela bg-light" id="listar">

	</div>
</small>



<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form" method="post">
				
				<div class="modal-body">
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo1?></label>
						<input type="text" class="form-control" name="<?php echo $campo1 ?>" placeholder="<?php echo $campo1 ?>" id="<?php echo $campo1 ?>" required>
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo2 ?></label>
						<input type="text" class="form-control" name="<?php echo $campo2 ?>" placeholder="<?php echo $campo2 ?>" id="<?php echo $campo2 ?>" required>
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo3 ?></label>
						<input type="text" class="form-control" name="<?php echo $campo3 ?>" placeholder="<?php echo $campo3 ?>" id="<?php echo $campo3 ?>" required>
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo4 ?></label>
						<input type="date" class="form-control" name="<?php echo $campo4 ?>" placeholder="<?php echo $campo4 ?>" id="<?php echo $campo4 ?>" required>
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Empresa </label>
						<select class="form-select" aria-label="Default select example" name="<?php echo $campo5 ?>" id="<?php echo $campo8 ?>">
							<?php 
							$query = $pdo->query("SELECT * FROM empresas order by nome asc");
							$res = $query->fetchAll(PDO::FETCH_ASSOC);
							for($i=0; $i < @count($res); $i++){
								foreach ($res[$i] as $key => $value){	}
									$id = $res[$i]['id'];
									$nome = $res[$i]['nome'];
								?>
								<option value="<?php echo $id ?>"><?php echo $nome ?></option>

							<?php } ?>


						</select>
					</div>	

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Frota </label>
						<select class="form-select" aria-label="Default select example" name="<?php echo $campo6 ?>" id="<?php echo $campo9 ?>">
							<?php 
							$query = $pdo->query("SELECT * FROM frotas order by nomeFrota asc");
							$res = $query->fetchAll(PDO::FETCH_ASSOC);
							for($i=0; $i < @count($res); $i++){
								foreach ($res[$i] as $key => $value){	}
									$id = $res[$i]['id'];
									$nomeFrota = $res[$i]['nomeFrota'];
								?>
								<option value="<?php echo $id?>"><?php echo $nomeFrota ?></option>

							<?php } ?>


						</select>
					</div>	


					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo7 ?></label>
						<input type="date" class="form-control" name="<?php echo $campo7 ?>" placeholder="<?php echo $campo7 ?>" id="<?php echo $campo5 ?>" required>
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo8 ?></label>
						<input type="date" class="form-control" name="<?php echo $campo8 ?>" placeholder="<?php echo $campo8 ?>" id="<?php echo $campo8 ?>">
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo9 ?></label>
						<input type="number" class="form-control" name="<?php echo $campo9 ?>" placeholder="<?php echo $campo9 ?>" id="<?php echo $campo7 ?>" required>
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo10 ?></label>
						<input type="number" class="form-control" name="<?php echo $campo10 ?>" placeholder="<?php echo $campo10 ?>" id="<?php echo $campo10 ?>" required>
					</div>
				

					<small><div id="mensagem" align="center"></div></small>

					<input type="hidden" class="form-control" name="id"  id="id">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Excluir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-excluir" method="post">
				<div class="modal-body">

					Deseja Realmente excluir este Registro: <span id="nome-excluido"></span>?

					<small><div id="mensagem-excluir" align="center"></div></small>

					<input type="hidden" class="form-control" name="id-excluir"  id="id-excluir">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
					<button type="submit" class="btn btn-danger">Excluir</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">var pag = "<?=$pagina?>"</script>
<script src="../js/ajax.js"></script>




