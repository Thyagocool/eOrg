<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>e-Org</title>
	<meta charset="utf-8">
	
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css" type="text/css"/>
    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css"/>
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/General.js"></script>


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
	<script type="text/javascript">
		$(document).ready(function(){
			$("#dvPesquisa").toggle();
		});
	</script>	
</head>
<body style="background-color: #DCDCDC;">

	<div id="dvPrincipal" class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<br><br><br><br>
				<div class="card" style="width: 100%;">
					<div class="card-header"  align=" center">
						<a href="cadastrarEmpresa.php" class="btn btn-outline-primary">
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                            Cadastro Empresa
                        </a>
                        <a href="cadastrarFuncionario.php" class="btn btn-outline-primary">
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                            Cadastro Funcionario
                        </a>
                        <a href="viewDados.php" class="btn btn-outline-primary" target="_blank">
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                            Visualizar Dados
                        </a>
					</div>
						<div class="card-body">     

<?php 
	if($_SESSION['cad_sucesso']):
?>
	<div class="alert alert-success">
		Cadastro efetuado com sucesso!
	</div>
<?php 
	endif;
	unset($_SESSION['cad_sucesso']);
	if($_SESSION['cad_existe']):			
?>
	<div class="alert alert-danger" role="alert">
		Registro já cadastrado!
	</div>
<?php
	endif;
	unset($_SESSION['cad_existe']);
	if($_SESSION['cad_excluido']):
?>							
	<div class="alert alert-success">
		Cadastro excluido com sucesso!
	</div>
<?php
	endif;
	unset($_SESSION['cad_excluido']);
?>