<?php
include "conexao.php";
session_start();
include "checa_sessao.php";
session_destroy();
sleep(1);
header("Location: http:index.php");

?>