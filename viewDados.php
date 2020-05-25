<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
</head>
<body>
	<div class="container">
	<table style="width:100%" class="table table-striped">
<?php 
	require_once("controller/Conexao.php");

	$inscricao = '0123456789';

	$sql = "SELECT e.fantasia, f.nome, f.cpf, f.data_adm, f.bairro, u.uf, r.descricao as regiao, c.descricao as cidade
			FROM funcionario f
			left join empresa e on f.id_empresa = e.id
			left join cidade c on f.id_cidade = c.id
			left join estado u on f.id_uf = u.id
			left join regiao r on u.id_regiao = r.id";

	$query = $db->prepare($sql);
//	$stmt->bindParam(':inscricao', $inscricao);
	$query->execute();
		echo "
		
			<tr>
				<th>Empresa</th>
				<th>Funcionario</th>
				<th>CPF</th>
				<th>Admissão</th>
				<th>Bairro</th>
				<th>Cidade</th>
				<th>UF</th>
				<th>Região</th>
			</tr>
			<tr>";

	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		echo "
				<td>".$row['fantasia']."</td>
				<td>".$row['nome']."</td>
				<td>".$row['cpf']."</td>
				<td>".$row['data_adm']."</td>
				<td>".$row['bairro']."</td>
				<td>".$row['cidade']."</td>				
				<td>".$row['uf']."</td>
				<td>".$row['regiao']."</td>
				</tr>
		";
	}
	echo "
		<tr>
	</table>";	
?>
</div>
</body>
</html>