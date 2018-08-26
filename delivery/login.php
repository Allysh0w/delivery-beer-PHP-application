<?php 

include "conexao.php";
//session_start();


$login = isset($_POST['login'])?$_POST['login']:'';
$senha = isset($_POST['senha'])?$_POST['senha']:'';

if(!(empty($login) || empty($senha))){

	$resultado = mysql_query("SELECT * FROM usuario where usuario='$login'");

	if(mysql_num_rows($resultado)>0){


		while($linhas = mysql_fetch_array($resultado, MYSQL_ASSOC)){


			if($linhas['usuario'] == $login  && $linhas['senha'] == $senha){
				session_start();
				$_SESSION['nome'] = $linhas['nome'];
				$_SESSION['imagem'] = $linhas['imagem'];
				$_SESSION['login'] = $linhas['login'];
				$_SESSION['id'] = $linhas['id'];
				header("Location: http:index.php");
			}else{
			
			echo "errado";
		   }
		}
		 
	}else{
		$msg = "Dados Incorretos! Por favor, Tente novamente.";
		echo $msg;		

	}

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Beer Express </title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>
				
			  	<a class="brand" href="index.html">
			  		<i class="icon-briefcase"></i>					
					<b> Beer Express</b>			  				  
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="#">
							Nova Conta
						</a></li>

						

						<li><a href="#">
							Esqueceu a senha?
						</a></li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="post" action="login.php">
						<div class="module-head">						
							<h3>Login</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="inputEmail" placeholder="Username" name="login">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" id="inputPassword" placeholder="Password" name="senha">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right">Entrar</button>
									<label class="checkbox">
										<input type="checkbox"> Lembrar?
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2015 Beer Express </b> Todos os direitos reservados.
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>