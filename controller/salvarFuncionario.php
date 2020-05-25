<?php

//error_reporting(0);
session_start();
require_once("Conexao.php");

$salvar = isset($_POST['salvar']) ? addslashes(trim($_POST['salvar'])) : FALSE;
$excluir = isset($_POST['excluir']) ? addslashes(trim($_POST['excluir'])) : FALSE;

$id = $_POST['id_funcionario'];
$data_nasc = $_POST['data_nasc'];
$data_adm = $_POST['data_adm'];
$cpf = $_POST['cpf'];
$pis = $_POST['pis'];
$nome = $_POST['nome'];
$nome_mae = $_POST['nome_mae'];
$ende = $_POST['ende'];
$id_uf = $_POST['id_uf'];
$id_cidade = $_POST['id_cidade'];
$id_bairro = $_POST['id_bairro'];
$tipo_adesao = $_POST['tipo_adesao'];
$data_acordo = $_POST['data_acordo'];
$perc_reducao_ch = $_POST['perc_reducao_ch'];
$meses_duracao = $_POST['meses_duracao'];
$cod_banco = $_POST['cod_banco'];
$agencia = $_POST['agencia'];
$dv_agencia = $_POST['dv_agencia'];
$conta_banco = $_POST['conta_banco'];
$dv_conta = $_POST['dv_conta'];
$tipo_conta = $_POST['tipo_conta'];
$ult_salario = $_POST['ult_salario'];
$pen_salario = $_POST['pen_salario'];
$ante_salario = $_POST['ante_salario'];


if ($salvar){

	if($id != ''){
		$sql = "UPDATE funcionario SET data_nasc = :data_nasc, data_adm = :data_adm, cpf = :cpf, pis = :pis, nome = :nome,  nome_mae = :nome_mae, tipo_adesao = :tipo_adesao, data_acordo = :data_acordo, perc_reducao_ch = :perc_reducao_ch, meses_duracao = :meses_duracao, cod_banco = :cod_banco, agencia = :agencia, dv_agencia = :dv_agencia, conta_banco = :conta_banco, dv_conta = :dv_conta, tipo_conta = :tipo_conta, ult_salario = :ult_salario, pen_salario = :pen_salario, ante_salario = :ante_salario, ende = :ende, id_uf = :id_uf, id_cidade = :id_cidade, bairro = :id_bairro WHERE id = :id";
				try {
					$query = $db->prepare($sql);
					$param = array(':id' => $id, ':data_nasc' => $data_nasc, ':data_adm' => $data_adm, ':cpf' => $cpf, ':pis' => $pis, ':nome' => $nome, ':nome_mae' => $nome_mae, ':tipo_adesao' => $tipo_adesao, ':data_acordo' => $data_acordo, ':perc_reducao_ch' => $perc_reducao_ch, ':meses_duracao' => $meses_duracao, ':cod_banco' => $cod_banco, ':agencia' => $agencia, ':dv_agencia' => $dv_agencia, ':conta_banco' => $conta_banco, ':dv_conta' => $dv_conta, ':tipo_conta' => $tipo_conta, ':ult_salario' => $ult_salario, ':pen_salario' => $pen_salario, ':ante_salario' => $ante_salario,':ende' => $ende, ':id_uf' => $id_uf, 'id_cidade' => $id_cidade, ':id_bairro' => $id_bairro);
					$query->execute($param);

					$_SESSION['cad_sucesso']=true;

				} catch (\PDOException $e) {
					var_dump($query);
echo '<pre>';
					echo "Erro ao alterar registro: " . $e->getMessage();
				}
	}else{

		$sql = "SELECT cpf FROM funcionario where cpf = :cpf ";

		$query = $db->prepare($sql);
		$query->bindParam(':cpf', $cpf);
		$query->execute();
		$row = $query->fetchAll();  


		if(!$row){
			$sql = "INSERT INTO funcionario (data_nasc, data_adm, cpf, pis, nome, nome_mae, tipo_adesao, data_acordo, perc_reducao_ch, meses_duracao, cod_banco, agencia, dv_agencia, conta_banco, dv_conta, tipo_conta, ult_salario, pen_salario, ante_salario, id_uf, id_cidade, bairro, ende) VALUES (:data_nasc, :data_adm, :cpf, :pis, :nome, :nome_mae, :tipo_adesao, :data_acordo, :perc_reducao_ch, :meses_duracao, :cod_banco, :agencia, :dv_agencia, :conta_banco, :dv_conta, :tipo_conta, :ult_salario, :pen_salario, :ante_salario, :id_uf, :id_cidade, :id_bairro, :ende)";
				try {
					$query = $db->prepare($sql);
					$param = array(':data_nasc' => $data_nasc, ':data_adm' => $data_adm, ':cpf' => $cpf, ':pis' => $pis, ':nome' => $nome, ':nome_mae' => $nome_mae, ':tipo_adesao' => $tipo_adesao, ':data_acordo' => $data_acordo, ':perc_reducao_ch' => $perc_reducao_ch, ':meses_duracao' => $meses_duracao, ':cod_banco' => $cod_banco, ':agencia' => $agencia, ':dv_agencia' => $dv_agencia, ':conta_banco' => $conta_banco, ':dv_conta' => $dv_conta, ':tipo_conta' => $tipo_conta, ':ult_salario' => $ult_salario, ':pen_salario' => $pen_salario, ':ante_salario' => $ante_salario, ':id_uf' => $id_uf, ':id_cidade' => $id_cidade, ':id_bairro' => $id_bairro, ':ende' => $ende);
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
	$sql = "DELETE FROM funcionario WHERE id = :id";
				try {
					$query = $db->prepare($sql);
					$param = array(':id' => $id);
					$query->execute($param);

					$_SESSION['cad_excluido']=true;

				} catch (\PDOException $e) {
					echo "Erro ao inserir registro: " . $e->getMessage();
				}
}

header('location: ../cadastrarFuncionario.php');	