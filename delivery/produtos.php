<?php
include "conexao.php";
session_start();
include "checa_sessao.php";

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

			  	<a class="brand" href="index.html">
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
                                    <li><a href="#">Edit Profile</a></li>
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
								<a href="auditoria.php">
									<i class="menu-icon icon-inbox"></i>
									Auditoria									
								</a>
							</li>
							<li>
								<a href="entrega.php">
									<i class="menu-icon icon-inbox"></i>
									Entregas									
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
								<h3>Tables</h3>
							</div>
							<div class="module-body">
								<p>
									
								

								<br />
								<!-- <hr /> -->
								<br />
								
								<table class="table table-striped">
								  <thead>
									<tr>
									  <th>Id</th>
									  <th>Nome</th>
									  <th>Descricao</th>
									  <th>Qt. Disponível</th>
									  <th>Preço</th>
									  <th> Editar</th>
									  <th> Apagar </th>
									</tr>
								  </thead>
								  <tbody>
									<tr>
										<?php 
											$sql = mysql_query("select * from produto");
	
											if(mysql_num_rows($sql)>0){
												while($linhas = mysql_fetch_array($sql, MYSQL_ASSOC)){
												echo "<td>".$linhas['id']."</td>";
												echo "<td>".$linhas['nome']."</td>";
												echo "<td>".$linhas['descricao']."</td>";
												echo "<td>".$linhas['quantidade_disponivel']."</td>";
												echo "<td>".$linhas['preco']."</td>";
												echo "<td> <a href='editar_produto.php?id=".$linhas['id']."'>Editar</a> </td>";
												echo "<td> <a href='apagar_produto.php?id=".$linhas['id']."'>Apagar</a> </td>";
												echo "</tr>";	
												}
											}else{
												//echo "#Nenhum produto encontrado";
											}

										?>	
																  								
								  </tbody>
								</table>

								<br />
								<!-- <hr /> -->
								<br />

															</div>
						</div>

						<!--<div class="module">
							<div class="module-head">
								<h3>Lista de Produtos</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>Nome</th>
											<th>Quantidade disponível</th>
											<th>Promoção</th>
											<th>Preço</th>
											<th>Categoria / Tipo</th>
											
										</tr>
									</thead>
									<tbody>
										
										<tr class="even gradeC">
											<td>Vodka Italiana</td>
											<td>5</td>
											<td>Não</td>
											<td class="center">R$50,40</td>
											<td class="center">Vodka / Importada</td>
										</tr>
										<tr class="odd gradeA">
											<td>Ciroc</td>
											<td>Vodka</td>
											<td>Win 95+</td>
											<td class="center">R$89,00</td>
											<td class="center">Vodka / Importada</td>
										</tr>
																			</tbody>
									<tfoot>
										<tr>
											<th>Nome</th>
											<th>Quantidade disponível</th>
											<th>Promoção</th>
											<th>Preço</th>
											<th>Categoria / Tipo</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div><!--/.module-->

					<br />
						
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

	<script src="scripts/jquery-1.9.1.min.js"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>