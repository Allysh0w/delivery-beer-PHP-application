<?php 
include "conexao.php";
session_start();
include "checa_sessao.php";

?>

<?php
$Nome		= isset($_POST["nome"])?$_POST["nome"]:'';	// Pega o valor do campo Nome
$descricao  = isset($_POST["descricao"])?$_POST["descricao"]:'';	// Pega o valor do campo Descricao
$Deu_Certo  = False;



if(!(empty($Nome)) &&!(empty($descricao))){
	$sql = "insert into categoria (nome,data_cadastro,descricao) values ('$Nome',now(),'$descricao')";

	$resultado = mysql_query($sql);

	if($resultado){
		$Deu_Certo = true;
		$msg = "Cadastro de categoria efetuado com sucesso";
	}else{
		$msg = "Nao foi possivel efetuar o cadastro";
	}
	

}


?>

<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Beer Express</title>
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

			  	<a class="brand" href="index.php">
			  		Beer Express
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav nav-icons">
						<li class="active"><a href="#">
							<i class="icon-envelope"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-eye-open"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-bar-chart"></i>
						</a></li>
					</ul>

					<form class="navbar-search pull-left input-append" action="#">
						<input type="text" class="span3">
						<button class="btn" type="button">
							<i class="icon-search"></i>
						</button>
					</form>
				
					<ul class="nav pull-right">
						
						
						<li><a href="#">Bem vindo  <?php echo $_SESSION['nome'];?> </a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Perfil</a></li>								
								<li><a href="#">Configurações</a></li>
								<li class="divider"></li>
								<li><a href="sair.php">Sair</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="sidebar">

						<ul class="widget widget-menu unstyled">
							<li class="active">
								<a href="index.php">
									<i class="menu-icon icon-dashboard"></i>
									Página Inicial
								</a>
							</li>
							<li>
								<a href="activity.html">
									<i class="icon-briefcase"></i>
									&nbsp; Usuários
								</a>
							</li>
							<li>
                                <a href="produtos.php">
                                    <i class="icon-briefcase"></i>
                                    &nbsp; Produtos
                                </a>
                            </li>
							<li>
								<a href="message.html">
									<i class="menu-icon icon-inbox"></i>
									Caixa de Mensagem
									<b class="label green pull-right">11</b>
								</a>
							</li>													
						</ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
                                <li><a href="nova_categoria.php"><i class="menu-icon icon-tasks"></i> Nova Categoria </a></li>
                                <li><a href="novo_produto.php"><i class="menu-icon icon-inbox"></i>Adicionar Produto </a></li>
                                <li><a href="novo_usuario.php"><i class="icon-briefcase"></i> &nbsp;  Novo Usuário </a></li>
                                <li><a href="novo_tipo.php"><i class="menu-icon icon-table"></i>Novo Tipo </a></li>
                                <li><a href="graficos.php"><i class="menu-icon icon-bar-chart"></i>Estatísticas de vendas </a></li>
                            </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">												
							<li>
								<a href="sair.php">
									<i class="menu-icon icon-signout"></i>
									Sair
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->


				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Nova Categoria</h3>
							</div>
							<div class="module-body">
									<?php 
									if (isset($_POST["nome"])){
									if ($Deu_Certo == true && !empty($msg)){
										
											echo '<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong> :) &nbsp; </strong>'.$msg.'
											</div>';
										}else{
											echo '<div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>): &nbsp;</strong>'.$msg.' 
									</div>';		
									}
									}
									?>									
									<br />

									<form class="form-horizontal row-fluid"  method="post" action="nova_categoria.php">
										<div class="control-group">
											<label class="control-label" for="basicinput">Nome: </label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Informe o nome da categoria" class="span8" name="nome" required>
												<span class="help-inline">Mínimo 5 Caracteres</span>
											</div>
										</div>
																												
									<!--  	<div class="control-group">
											<label class="control-label" for="basicinput">Valor: </label>
											<div class="controls">
												<div class="input-append">
													<input type="number" placeholder="5.000" class="span8"><span class="add-on" name="valor">$</span>
												</div>
											</div>
										</div> -->										

								<!-- 		<div class="control-group">
											<label class="control-label" for="basicinput">Dropdown</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span8">
													<option value="">Select here..</option>
													<option value="Category 1">First Row</option>
													<option value="Category 2">Second Row</option>
													<option value="Category 3">Third Row</option>
													<option value="Category 4">Fourth Row</option>
												</select>
											</div>
										</div>

										 -->
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Descrição: </label>
											<div class="controls">
												<textarea class="span8" rows="5" name="descricao" required></textarea>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn">Salvar</button>
											</div>
										</div>
									</form>
							</div>
						</div>

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2015 Beer Express </b> Todos os direitos reservados.
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>