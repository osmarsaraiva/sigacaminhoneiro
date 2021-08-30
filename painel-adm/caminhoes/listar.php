<?php 
require_once("../../conexao.php");
require_once("campos.php");

echo <<<HTML
<table id="example" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
<th>Marca</th>
<th>Modelo</th>
<th>Placas</th>
<th>Data da Compra</th>
<th>Empresa</th>
<th>Frota</th>
<th>Data de início</th>
<th>Data de venda</th>
<th>Km inicial</th>
<th>Km final</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;


$query = $pdo->query("select c.id, c.marcaCaminhao, c.modelo, c.placasCaminhao, c.dataCompra, c.empresa_id, c.frota_id, c.dataInicio, c.dataVenda, c.km_inicial, c.km_final, e.nome, f.nomeFrota from caminhoes as c INNER JOIN empresas as e ON c.empresa_id = e.id INNER JOIN frotas as f ON c.frota_id = f.id");

$res = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($res); $i++){
	foreach ($res[$i] as $key => $value){} 

		$id = $res[$i]['id'];
		$cp1 = $res[$i]['marcaCaminhao'];
		$cp2 = $res[$i]['modelo'];
		$cp3 = $res[$i]['placasCaminhao'];
		$cp4 = $res[$i]['dataCompra'];
		$cp5 = $res[$i]['nome'];
		$cp6 = $res[$i]['nomeFrota'];
		$cp7 = $res[$i]['dataInicio'];
		$cp8 = $res[$i]['dataVenda'];
		$cp9 = $res[$i]['km_inicial'];
		$cp10 = $res[$i]['km_final'];

	
		$cp4_data = implode('/', array_reverse(explode ('-', $cp4)));
		$cp7_data = implode('/', array_reverse(explode ('-', $cp7)));
		$cp8_data = implode('/', array_reverse(explode ('-', $cp8)));


		echo <<<HTML
	<tr>
	<td>{$cp1}</td>	
	<td>{$cp2}</td>
	<td>{$cp3}</td>
	<td>{$cp4_data}</td>
	<td>{$cp5}</td>
	<td>{$cp6}</td>
	<td>{$cp7_data}</td>
	<td>{$cp8_data}</td>
	<td>{$cp9}</td>	
	<td>{$cp10}</td>	
									
	<td>
	<a href="#" onclick="editar('{$id}', '{$cp1}','{$cp2}','{$cp3}','{$cp4}','{$cp5}','{$cp6}','{$cp7}','{$cp8}','{$cp9}', '{$cp10}')" title="Editar Registro"><i class="bi bi-pencil-square text-primary"></i></a>

	<a href="#" onclick="excluir('{$id}' , '{$cp7}')" title="Excluir Registro">	<i class="bi bi-trash text-danger"></i></a>
	</td>
	</tr>
HTML;
} 
echo <<<HTML
</tbody>
</table>
HTML;

?>

<script>
$(document).ready(function() {    
	$('#example').DataTable({
		"ordering": false
	});

} );

function editar(id, marcaCaminhao, modelo, placasCaminhao, dataCompra, empresa_id, frota_id, dataInicio, dataVenda, km_inicial, km_final){
	$('#id').val(id);
	$('#<?=$campo1?>').val(marcaCaminhao);
	$('#<?=$campo2?>').val(modelo);
	$('#<?=$campo3?>').val(placasCaminhao);
	$('#<?=$campo4?>').val(dataCompra);
	$('#<?=$campo5?>').val(empresa_id);
	$('#<?=$campo6?>').val(frota_id);
	$('#<?=$campo7?>').val(dataInicio);
	$('#<?=$campo8?>').val(dataVenda);
	$('#<?=$campo9?>').val(km_inicial);
	$('#<?=$campo10?>').val(km_final);

	$('#tituloModal').text('Editar Registro');
	var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {		});
	myModal.show();
	$('#mensagem').text('');
}



function limparCampos(){
	$('#id').val('');
	$('#<?=$campo1?>').val('');
	$('#<?=$campo2?>').val('');
	$('#<?=$campo3?>').val('');
	$('#<?=$campo4?>').val('');
	$('#<?=$campo5?>').val('');
	$('#<?=$campo6?>').val('');
	$('#<?=$campo7?>').val('');
	$('#<?=$campo8?>').val('');
	$('#<?=$campo9?>').val('');
	$('#<?=$campo10?>').val('');
	

	$('#mensagem').text('');
	
}

</script>