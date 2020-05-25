<?php
require_once("includes/header.php");
require_once("controller/Conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM funcionario where id = :id ";

				$query = $db->prepare($sql);
				$query->bindParam(':id', $id);
				$query->execute();
				$row = $query->fetch(PDO::FETCH_ASSOC);

?>

	<form action="controller/salvarFuncionario.php" method="POST">
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text" class="form-control" placeholder="" id="id_funcionario" name="id_funcionario" readonly value="<?php echo $row["id"]?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="codigo">Empresa</label>
					<select name="id_empresa" id="id_empresa"  class="form-control">
					<?php
					
					$sql = "SELECT id, fantasia, inscricao FROM empresa ";

					$query = $db->prepare($sql);
					//$query->bindParam(':id', $id);
					$query->execute();
					while($rowE = $query->fetch(PDO::FETCH_ASSOC)){
						
						echo '<option value="'.$rowE['id'].'">'.$rowE['id'].' - '.$rowE['fantasia'].' - '.$rowE['inscricao'].'</option>';
					}

					?>
					</select>
				</div>
			</div>

		</div>
		<fieldset>
			<legend>Dados do Trabalhador</legend>
			<div class="row">			
				<div class="col-md-3">
					<div class="form-group">
						<label for="nome">Data Nascimento</label>
						<input type="text" class="form-control" placeholder="DD/MM/YYYY" id="data_nasc" maxlength="10" oninput="mascara(this, 'data')" name="data_nasc"  value="<?php echo $row["data_nasc"]?>">			
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="nome">Data Admissão</label>
						<input type="text" class="form-control" placeholder="DD/MM/YYYY" id="data_adm" maxlength="10" oninput="mascara(this, 'data')" name="data_adm" value="<?php echo $row["data_adm"]?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="nome">CPF</label>
						<input type="text" class="form-control" placeholder="" id="cpf" maxlength="11" name="cpf" value="<?php echo $row["cpf"]?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="nome">PIS</label>
						<input type="text" class="form-control" placeholder="" id="pis" maxlength="11" name="pis" value="<?php echo $row["pis"]?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="nome">Nome do Trabalhador</label>
						<input type="text" class="form-control" placeholder="" id="nome" maxlength="80" name="nome" value="<?php echo $row["nome"]?>">				
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="nome">Nome da Mãe</label>
						<input type="text" class="form-control" placeholder="" id="nome_mae" maxlength="80" name="nome_mae" value="<?php echo $row["nome_mae"]?>">				
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="nome">Endereço</label>
						<input type="text" class="form-control" placeholder="" id="ende" maxlength="80" name="ende" value="<?php echo $row["ende"]?>">				
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label for="codigo">UF</label>
						<select name="id_uf" id="id_uf"  class="form-control">
						<?php
					
						$sql = "SELECT id, uf FROM estado ";

						$query = $db->prepare($sql);
						//$query->bindParam(':id', $id);
						$query->execute();
						
						while($rowUF = $query->fetch(PDO::FETCH_ASSOC)){
						
							echo '<option value="'.$rowUF['id'].'">'.$rowUF['uf'].'</option>';
						}

						?>
						</select>				
					</div>
				</div>				

				<div class="col-md-5">
					<div class="form-group">
						<label for="nome">Cidade</label>
						<input type="text" class="form-control" placeholder="" id="id_cidade" maxlength="80" name="id_cidade" value="<?php echo $row["ds_cidade"]?>">				
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="nome">Bairro</label>
						<input type="text" class="form-control" placeholder="" id="id_bairro" maxlength="80" name="id_bairro" value="<?php echo $row["ds_bairro"]?>">				
					</div>
				</div>
			</div>								
		</fieldset>	
		<br>
		<fieldset>
			<legend>Dados do Acordo</legend>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group" >
						<label for="nome">Tipo Adesão</label>
						<select class="form-control" name="tipo_adesao" value="<?php echo $row["tipo_adesao"]?>">
							<option value="0">Suspensão</option>
							<option value="1">Redução</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="nome">Data Acordo</label>
						<input type="text" class="form-control" placeholder="DD/MM/YYYY" id="data_acordo" maxlength="10" oninput="mascara(this, 'data')" name="data_acordo" value="<?php echo $row["data_acordo"]?>">				
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="nome">% Redução CH</label>
						<select class="form-control" name="perc_reducao_ch" value="<?php echo $row["perc_reducao_ch"]?>">
							<option value="25">25</option >
							<option value="50">50</option>
							<option value="70">70</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="nome">Meses Duração</label>
						<input type="text" class="form-control" placeholder="" id="meses_duracao" maxlength="1" name="meses_duracao" value="<?php echo $row["meses_duracao"]?>">			
					</div>
				</div>
			</div>
		</fieldset>
		<br>
		<fieldset>
			<legend>Dados Bancários</legend>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="nome">Banco</label>
							<input type="text" class="form-control" placeholder="" id="cod_banco" maxlength="3" name="cod_banco" value="<?php echo $row["cod_banco"]?>">			
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="nome">Agencia</label>
							<input type="text" class="form-control" placeholder="" id="agencia" maxlength="4" name="agencia" value="<?php echo $row["agencia"]?>">			
						</div>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<label for="nome">DV</label>
							<input type="text" class="form-control" placeholder="" id="dv_agencia" maxlength="1" name="dv_agencia" value="<?php echo $row["dv_agencia"]?>">			
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="nome">Conta</label>
							<input type="text" class="form-control" placeholder="" id="conta_banco" maxlength="12" name="conta_banco" value="<?php echo $row["conta_banco"]?>">			
						</div>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<label for="nome">DV</label>
							<input type="text" class="form-control" placeholder="" id="dv_conta" maxlength="1" name="dv_conta" value="<?php echo $row["dv_conta"]?>">			
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="nome">Tipo Conta</label>
							<select class="form-control" name="tipo_conta" value="<?php echo $row["tipo_conta"]?>">
								<option value="0">Corrente</option>
								<option value="1">Poupança</option>
							</select>
						</div>
					</div>
				</div>
		</fieldset>
		<br>
		<fieldset>
			<legend>Dados de Salário</legend>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="nome">Ultimo Salário</label>
						<input type="text" class="form-control" placeholder="" id="ult_salario" maxlength="10" name="ult_salario" value="<?php echo $row["ult_salario"]?>">			
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="nome">Penultimo Salário</label>
						<input type="text" class="form-control" placeholder="" id="pen_salario" maxlength="10" name="pen_salario" value="<?php echo $row["pen_salario"]?>">			
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="nome">Antepenultimo Salário</label>
						<input type="text" class="form-control" placeholder="" id="ante_salario" maxlength="10" name="ante_salario" value="<?php echo $row["ante_salario"]?>">			
					</div>
				</div>
			</div>
		</fieldset>
		<br>
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
					<th>CPF</th>
					<th>PIS</th>
					<th>Nome</th>
					<th>Data Nasc</th>
					<th>Data Adm</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$sql = "SELECT id, cpf, pis, nome, data_nasc, data_adm FROM funcionario";

				$query = $db->prepare($sql);
				//$query->bindParam(':inscricao', $inscricao);
				$query->execute();


				while($row = $query->fetch(PDO::FETCH_ASSOC)){

					echo '<tr>';
					echo '<td>'.$row["id"].'</td>';
					echo '<td>'.$row["cpf"].'</td>';
					echo '<td>'.$row["pis"].'</td>';
					echo '<td>'.$row["nome"].'</td>';
					echo '<td>'.$row["data_nasc"].'</td>';
					echo '<td>'.$row["data_adm"].'<span style="float: right;"><a href="cadastrarFuncionario.php?id='. $row["id"] .'" class="btn btn-primary btn-custom">Editar</a></span></td>';
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