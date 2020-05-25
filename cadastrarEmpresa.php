<?php
require_once("includes/header.php");
require_once("controller/Conexao.php");

$id = $_GET['id'];

$sql = "SELECT case when tp_inscricao = 1 then 'CNPJ' else 'CEI' end as tpinsc,* FROM empresa where id = :id ";

				$query = $db->prepare($sql);
				$query->bindParam(':id', $id);
				$query->execute();
				$row = $query->fetch(PDO::FETCH_ASSOC);

?>

<form action="controller/salvarEmpresa.php" method="POST">
	<div class="row">
		<div class="col-md-2">
			<div class="form-group">
				<label for="codigo">Código:</label>
				<input type="text" class="form-control" placeholder="" id="id_empresa" name = "id_empresa" readonly value="<?php echo $row["id"]?>">
			</div>
		</div>
	</div>
	<div class="row">			
		<div class="col-md-6">
			<div class="form-group">
				<label for="nome">Fantasia:</label>
				<input type="text" class="form-control" placeholder="" id="fantasia" name="fantasia" value="<?php echo $row["fantasia"]?>">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="nome">Razão Social:</label>
				<input type="text" class="form-control" placeholder="" id="razao_social" name="razao_social" value="<?php echo $row["razao_social"]?>">
			</div>
		</div>
	</div> 
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="nome">Tipo Inscrição:</label>
				<select class="form-control" placeholder="" id="tp_inscricao" name="tp_inscricao" value="<?php echo $row["tp_inscricao"]?>">
					<option value="1">CNPJ</option>
					<option value="2">CEI</option>
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="nome">CNPJ/CEI:</label>
				<input type="text" class="form-control" placeholder="" id="inscricao" name="inscricao" maxlength="14" value="<?php echo $row["inscricao"]?>">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="nome">CNO:</label>
				<input type="text" class="form-control" placeholder="" id="cno" name = "cno" maxlength="12" value="<?php echo $row["cno"]?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="btn-group">
			<button type="submit" class="btn btn-primary" name="salvar" value="1">Salvar</button>
			<button type="submit" class="btn btn-primary" name="excluir" value="1">Excluir</button>
			<button type="button" id="btnExibeOcultaDiv" class="btn btn-primary" >Pesquisar</button>
		</div>
	</div>
</form>   
<br>

				</div> 
			</div>				
		</div>
	</div>
</div>

<!-- Inicio Div de Pesquisa -->
<div class="container"  id="dvPesquisa" >
						<div>
						<h3>Empresas</h3>
					</div>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Fantasia</th>
					<th>Tipo Inscrição</th>
					<th>CNPJ/CEI</th>
					<th>CNO</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$sql = "SELECT case when tp_inscricao = 1 then 'CNPJ' else 'CEI' end as tpinsc,* FROM empresa";

				$query = $db->prepare($sql);
				//$query->bindParam(':inscricao', $inscricao);
				$query->execute();


				while($row = $query->fetch(PDO::FETCH_ASSOC)){

					echo '<tr>';
					echo '<td>'.$row["id"].'</td>';
					echo '<td>'.$row["fantasia"].'</td>';
					echo '<td>'.$row["tpinsc"].'</td>';
					echo '<td>'.$row["inscricao"].'</td>';
					echo '<td>'.$row["cno"].'<span style="float: right;"><a href="cadastrarEmpresa.php?id='. $row["id"] .'" class="btn btn-primary btn-custom">Editar</a></span></td>';
					echo '</tr>';

				}

			?>
			</tbody>
		</table>
	<div class="btn-group">
		<button type="button" id="btnExibeOcultaDPesq" class="btn btn-primary" >Voltar</button>
	</div>
</div>
<!-- Fim Div de Pesquisa -->

<?php
require_once("includes/footer.php");

?>