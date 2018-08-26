<?php
include "conexao.php";
$login = isset($_POST['login'])?$_POST['login']:'';
$senha = isset($_POST['senha'])?$_POST['senha']:'';


if(!(empty($login) || empty($senha))){

	$resultado = mysql_query("SELECT * FROM cliente where usuario='$login' and senha='$senha'");

	if(mysql_num_rows($resultado)>0){
		$msg = "deu certo";

		/*while($linhas = mysql_fetch_array($resultado, MYSQL_ASSOC)){

			if($linhas['usuario'] == $login  && $linhas['senha'] == $senha){			
				$msg = "Autenticado";
			}else{
					
				$msg = "#errado";;
			}
		}
			*/
	}else{
		$msg = "#Dados Incorretos! Por favor, Tente novamente.";	

	}
	echo $msg;
}
?>