<?php
include "conexao.php";
$latitude		= isset($_POST["latitude"])?$_POST["latitude"]:'';
$longitude		= isset($_POST["longitude"])?$_POST["longitude"]:'';
$localizacao  	= isset($_POST["localizacao"])?$_POST["localizacao"]:'';
$imei           = isset($_POST["imei"])?$_POST["imei"]:'';

$id_produto     = isset($_POST["id_produto"])?$_POST["id_produto"]:'';
$nome_usuario   = isset($_POST["nome_usuario"])?$_POST["nome_usuario"]:'';
$senha_cliente  = isset($_POST["senha_cliente"])?$_POST["senha_cliente"]:'';

	/////////////////////////////////////
	if($_POST){ 
		//Busca o endereco e telefone na tabela cliente
		$sql_endereco = mysql_query("select endereco,telefone from cliente where usuario='$nome_usuario'");
		 if(mysql_num_rows($sql_endereco)>0){
			while($linhas_endereco = mysql_fetch_array($sql_endereco, MYSQL_ASSOC)){
				$endereco  = $linhas_endereco['endereco'];
				$telefone  = $linhas_endereco['telefone'];
			
			}
		}
		
		$sql = "insert into auditoria (imei,latitude,longitude,numero_tel,localizacao,usuario_cliente,senha_cliente,id_produto,hora_ocorrencia) values
		 ('$imei','$latitude','$longitude','$telefone','$localizacao','$nome_usuario','$senha_cliente',$id_produto,now())";		
		$resultado = mysql_query($sql);
		if($resultado){			
			////
			//Busca o produto e valor na tabela produto
			$sql_produto = mysql_query("select nome,preco from produto where id=$id_produto");			
			if(mysql_num_rows($sql_produto)>0){				
				while($linhas = mysql_fetch_array($sql_produto, MYSQL_ASSOC)){
					$nome_produto = $linhas['nome'];
					$valor_produto = $linhas['preco'];
						
				}
			}
			
			/*$sql_endereco = mysql_query("select endereco,telefone from cliente where usuario='$nome_usuario'");
			if(mysql_num_rows($sql_endereco)>0){
				while($linhas = mysql_fetch_array($sql_endereco, MYSQL_ASSOC)){
					$endereco  = $linhas['endereco'];
					$telefone  = $linhas['telefone'];
			
				}
			}*/
			
			$sql_entrega = "insert into entrega (produto,quantidade,valor,data_entrega,endereco,latitude,longitude,telefone,usuario) values
			('$nome_produto',1,$valor_produto,now(),'$endereco','$latitude','$longitude','$telefone','$nome_usuario')";
			$resultado_entrega = mysql_query($sql_entrega);

			if ($resultado_entrega){
				$msg = "Requisição enviada com sucesso!";
			}
			////
		}else{
			$msg = "#Nao foi possivel efetuar o cadastro do usuário";
		}
		//echo $msg;
		echo $msg;
	}



?>
