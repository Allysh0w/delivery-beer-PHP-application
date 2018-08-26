<?php
include "conexao.php";
if (empty($_SESSION['nome'])){
	header("Location: http:login.php");	
} 
?>