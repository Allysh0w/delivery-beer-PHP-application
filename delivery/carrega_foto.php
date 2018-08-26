

<?php
include "conexao.php";

$id_id = isset($_POST["id_elemento"])?$_POST["id_elemento"]:'';	// Pega o valor do campo Valor
$sql = mysql_query("select id,nome,foto_caminho,preco from produto where id=$id_id");
	
	if(mysql_num_rows($sql)>0){
		$count = 0;
		while($linhas = mysql_fetch_array($sql, MYSQL_ASSOC)){
			echo $linhas['foto_caminho']."|".$linhas['preco']."|".$linhas['id']."|".$linhas['nome'];			
			
		}
	}else{
		echo "#Nenhum produto encontrado";
	}
	
	


?>