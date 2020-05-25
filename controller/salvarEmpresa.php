<?php

//error_reporting(0);
session_start();
require_once("Conexao.php");




$salvar = isset($_POST['salvar']) ? addslashes(trim($_POST['salvar'])) : FALSE;
$excluir = isset($_POST['excluir']) ? addslashes(trim($_POST['excluir'])) : FALSE;
$id = $_POST['id_empresa'];
$fantasia = $_POST['fantasia'];
$razao_social = $_POST['razao_social'];
$tp_inscricao = $_POST['tp_inscricao'];
$inscricao = $_POST['inscricao'];
$cno = $_POST['cno'];

if ($salvar){

	if($id != ''){
		$sql = "UPDATE empresa SET fantasia = :fantasia, razao_social = :razao_social, tp_inscricao = :tp_inscricao, inscricao =:inscricao WHERE id = :id";
				try {
					$query = $db->prepare($sql);
					$param = array(':id' => $id, ':fantasia' => $fantasia, ':razao_social' => $razao_social, ':tp_inscricao' => $tp_inscricao, ':inscricao' => $inscricao);
					$query->execute($param);

					$_SESSION['cad_sucesso']=true;

				} catch (\PDOException $e) {
					echo "Erro ao inserir registro: " . $e->getMessage();
				}
	}else{

		$sql = "SELECT inscricao FROM empresa where inscricao = :inscricao ";

		$query = $db->prepare($sql);
		$query->bindParam(':inscricao', $inscricao);
		$query->execute();
		$row = $query->fetchAll();  


		if(!$row){
			$sql = "INSERT INTO empresa (fantasia, razao_social, tp_inscricao, inscricao) VALUES (:fantasia, :razao_social, :tp_inscricao, :inscricao)";
				try {
					$query = $db->prepare($sql);
					$param = array(':fantasia' => $fantasia, ':razao_social' => $razao_social, ':tp_inscricao' => $tp_inscricao, ':inscricao' => $inscricao);
					$query->execute($param);

					$_SESSION['cad_sucesso']=true;

				} catch (\PDOException $e) {
					echo "Erro ao inserir registro: " . $e->getMessage();
				}
		} else{
			$_SESSION['cad_existe']=true;
		}
	}
}

if ($excluir){
	$sql = "DELETE FROM empresa WHERE id = :id";
				try {
					$query = $db->prepare($sql);
					$param = array(':id' => $id);
					$query->execute($param);

					$_SESSION['cad_excluido']=true;

				} catch (\PDOException $e) {
					echo "Erro ao inserir registro: " . $e->getMessage();
				}
}

header('location: ../cadastrarEmpresa.php');	