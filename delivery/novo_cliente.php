<?php
ini_set('display_errors',1);
include "conexao.php";
$nome		= isset($_POST["nome"])?$_POST["nome"]:'';
$email		= isset($_POST["email"])?$_POST["email"]:'';
$usuario  	= isset($_POST["usuario"])?$_POST["usuario"]:'';
$senha      = isset($_POST["senha"])?$_POST["senha"]:'';
$telefone   = isset($_POST["telefone"])?$_POST["telefone"]:'';
$endereco   = isset($_POST["endereco"])?$_POST["endereco"]:'';
$imei       = isset($_POST["imei"])?$_POST["imei"]:'';
$cpf       = isset($_POST["cpf"])?$_POST["cpf"]:'';


/////////////////////////////////////
if($_POST){
		
	//////
	$resultado_procura_usuario = mysql_query("SELECT usuario FROM usuario where usuario='$usuario'");
	
	if(mysql_num_rows($resultado_procura_usuario)>0){
		$msg = "#Usuário não disponível, escolha outro nome de usuário.";
	}else{
	
	/////
	$sql = "insert into cliente (nome,email,usuario,senha,data_cadastro,telefone,endereco,imei,cpf) values 
	('$nome','$email','$usuario','$senha',now(),'$telefone','$endereco','$imei','$cpf')";
	$resultado = mysql_query($sql);
	if($resultado){
		$msg = "Dados cadastrados com sucesso";
	}else{
		$msg = "#Nao foi possivel efetuar o cadastro do usuário";
		}		
	}
	echo $msg;
}else{
	echo "impossivel efetuar a operação";
}




?>