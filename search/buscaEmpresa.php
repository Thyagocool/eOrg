<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>e-Org</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-whidth, initial-scale=1">

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css"/>

<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/General.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>

<style type="text/css">
fieldset {

border-radius: 4px;
border: 1px solid #ddd;
padding: 2px;
}

legend {
background-color: #fff;
border-radius: 4px;
font-size: 15px;
font-weight: bold;
width: auto;
}
</style>
</head>
<body style="background-color: #DCDCDC;">
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-2">
			<br><br><br><br>
			<div class="card" style="width: 100%;">
				<div class="card-header"  align=" center">
					<a href="../cadastrarEmpresa.php" class="btn btn-outline-primary">
						<i class="fa fa-id-card" aria-hidden="true"></i>Cadastro Empresa
					</a>
					<a href="../cadastrarFuncionario.php" class="btn btn-outline-primary">
						<i class="fa fa-id-card" aria-hidden="true"></i>Cadastro Funcionario
					</a>
				</div>
				<div class="card-body"> 
				</div>    
			</div> 
		</div>				
	</div>
</div>
</body>
</html>							