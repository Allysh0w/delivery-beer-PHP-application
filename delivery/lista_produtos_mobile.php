
<?php
include "conexao.php";

//$se_por_categoria = isset($_POST["categoria"])?$_POST["categoria"]:'';	// Pega o valor do campo Nome

//$se_por_tipo = isset($_POST["tipo"])?$_POST["tipo"]:'';	// Pega o valor do campo Nome



//$promocao  = isset($_POST["promocao_mobile"])?$_POST["promocao_mobile"]:'';	// Pega o valor do campo Valor
$id_categoria = isset($_POST["id_categoria"])?$_POST["id_categoria"]:'';	// Pega o valor do campo Valor
//$id_tipo = isset($_POST["id_tipo"])?$_POST["id_tipo"]:'';	// Pega o valor do campo Valor




//if (!empty($se_por_categoria)){

	$sql = mysql_query("select id, nome,foto_caminho,preco from produto where id_categoria=$id_categoria");
	
	if(mysql_num_rows($sql)>0){
		while($linhas = mysql_fetch_array($sql, MYSQL_ASSOC)){
			echo $linhas['id']."|".$linhas['nome']." | ".$linhas['foto_caminho']." | ".$linhas['preco']." | ";			
			
		}
	}else{
		echo "#Nenhum produto encontrado";
	}
	
	
//}else if(!empty($se_por_tipo)){
	
	//$sql = mysql_query("select nome,foto_caminho,quantidade_disponivel,promocao,peco from produto where id_tipo='$id_tipo'");
	//if(mysql_num_rows($sql)>0){
		//$count = 0;
		//while($linhas = mysql_fetch_array($sql, MYSQL_ASSOC)){
			//echo $linhas['nome']." | ".$linhas['foto_caminho']." | ".$linhas['quantidade_disponivel']." | ".$linhas['promocao']." | ".$linhas['preco']." | ";
				
		//}
	//}	
	
	
//}else{
	//echo "Nenhum produto foi encontrado";
//}


?>