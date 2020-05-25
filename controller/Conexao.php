<?php

	if (!is_dir('db'))
  		mkdir('db', 0755);

		$db = new PDO('sqlite:C:\wamp64\www\e-Org\controller\db\eorg.sqlite');
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

		$sql = "CREATE TABLE IF NOT EXISTS empresa (id INTEGER PRIMARY KEY, fantasia TEXT, razao_social TEXT, tp_inscricao NUMERIC, inscricao NUMERIC, cno NUMERIC)";

		try {
	  		$db->exec($sql);
		} catch (\PDOException $e) {
  			echo "Erro ao criar tabela: " . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS funcionario (id INTEGER PRIMARY KEY, data_adm TEXT, cpf NUMERIC, pis NUMERIC, nome TEXT, nome_mae TEXT, data_nasc TEXT, tipo_adesao NUMERIC, data_acordo TEXT, perc_reducao_ch NUMERIC, meses_duracao NUMERIC, cod_banco TEXT, agencia NUMERIC, dv_agencia TEXT, conta_banco NUMERIC, dv_conta NUMERIC, tipo_conta NUMERIC, ult_salario NUMERIC, pen_salario NUMERIC, ante_salario NUMERIC, ende TEXT, bairro VARCHAR(60), id_cidade INTEGER REFERENCES cidade (id), id_uf INTEGER REFERENCES estado (id) )";

		try {
	  		$db->exec($sql);
		} catch (\PDOException $e) {
  			echo "Erro ao criar tabela: " . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS  estado (id INTEGER PRIMARY KEY NOT NULL, uf VARCHAR(2)NOT NULL, descricao VARCHAR (60) NOT NULL, capital VARCHAR(60) NOT NULL, id_regiao INTEGER); ";

		try{
			$db->exec($sql);
		} catch (\PDOException $e){
			echo "Erro ao criar tabela: " . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS regiao (id INTEGER PRIMARY KEY NOT NULL, descricao VARCHAR (60));";

		try{
			$db->exec($sql);
		} catch (\PDOException $e){
			echo "Erro ao criar tabela: " . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS cidade (id INTEGER PRIMARY KEY NOT NULL, descricao VARCHAR (60), uf INTEGER REFERENCES estado (id));";

		try{
			$db->exec($sql);
		} catch (\PDOException $e){
			echo "Erro ao criar tabela: " . $e->getMessage();
		}