<?php
include "conexao.php";

$sql = mysql_query("select foto_caminho from produto where promocao='S' limit 4");
if(mysql_num_rows($sql)>0){
	while($linhas = mysql_fetch_array($sql, MYSQL_ASSOC)){
		echo $linhas['foto_caminho']."|";
			
	}
}else{
	echo "#Nenhum produto encontrado";	
}


?>