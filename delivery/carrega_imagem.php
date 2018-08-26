<?php
include "conexao.php";
$id_id = isset($_POST["id_id"])?$_POST["id_id"]:'';	// Pega o valor do campo Valor
$sql = mysql_query("select foto_caminho from produto where id=$id_id");
if(mysql_num_rows($sql)>0){
	while($linhas = mysql_fetch_array($sql, MYSQL_ASSOC)){
		echo $linhas['foto_caminho'];
			
	}
}else{
	echo "#Nenhum produto encontrado";	
}


?>