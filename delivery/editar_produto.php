<?php 
include "conexao.php";
session_start();
include "checa_sessao.php";

?>

<?php
$id_produto_banco =  isset($_GET["id"])?$_GET["id"]:'';	// Pega o valor do campo Nome

$Nome		= isset($_POST["nome"])?$_POST["nome"]:'';	// Pega o valor do campo Nome
$descricao  = isset($_POST["descricao"])?$_POST["descricao"]:'';	// Pega o valor do campo Descricao
$valor  = isset($_POST["valor"])?$_POST["valor"]:'';	// Pega o valor do campo Valor
$quantidade_disp  = isset($_POST["quantidade"])?$_POST["quantidade"]:'';	// Pega o valor do campo Valor
$promocao  = isset($_POST["promocao"])?$_POST["promocao"]:'';	// Pega o valor do campo Valor
$id_categoria = isset($_POST["id_categoria"])?$_POST["id_categoria"]:'';	// Pega o valor do campo Valor
$Deu_Certo  = False;
$id_tipo = isset($_POST["id_tipo"])?$_POST["id_tipo"]:'';	// Pega o valor do campo Valor
//$msg =  isset($msg)?$msg:'';
//$img = isset($img)?$img:'';

$arquivo = isset($_FILES['arquivo']['name'])?$_FILES['arquivo']['name']:'';
if(isset($_FILES['arquivo']['name'])){
	$destino = "imagens_produtos/".$arquivo;
	if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $destino)){
		//if(!copy($arquivo, $destino)){
		$img= 1;
	}else{
		$img= 2;
	}

}
/////////////////////////////////////
if($_POST){
	if($img == 1){
	$sql = "UPDATE produto SET nome='$Nome',descricao='$descricao',id_tipo=$id_tipo,foto_caminho='$arquivo', quantidade_disponivel=$quantidade_disp,
	 		promocao='$promocao',preco=$valor,id_categoria=$id_categoria where id=$id_produto_banco";
	
	}else{
		$sql = "UPDATE produto SET nome='$Nome',descricao='$descricao',id_tipo=$id_tipo, quantidade_disponivel=$quantidade_disp,
		promocao='$promocao',preco=$valor,id_categoria=$id_categoria where id=$id_produto_banco";
		
	}
	//$sql = "UPDATE produto SET (nome,descricao,id_tipo,foto_caminho,data_cadastro,quantidade_disponivel,promocao,preco,id_categoria) values
	//('$Nome','$descricao', $id_tipo ,'$arquivo',now(),$quantidade_disp,'$promocao',$valor,$id_categoria)";

	$resultado = mysql_query($sql);

	if($resultado){
		$Deu_Certo = true;
		$msg = "Produto editado com sucesso";
	}else{
		$msg = "Nao foi possivel editar o produto";
	}
	
}

///////////////////////////////////////
/*if(!(empty($Nome)) &&!(empty($descricao)) && !empty($valor)){
	$sql = "insert into categoria (nome,descricao,foto_caminho,data_cadastro,quantidade_disponivel,promocao,preco,id_produto) values 
								  ('$Nome','$descricao','$foto_caminho',now(),'$quantidade_disp','$promocao',$preco,)";

	$resultado = mysql_query($sql);

	if($resultado){
		$Deu_Certo = true;
		$msg = "Cadastro de categoria efetuado com sucesso";
	}else{
		$msg = "Nao foi possivel efetuar o cadastro";
	}
	
*/



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
								<h3>Novo Produto</h3>								
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
										<?php 
										/////////////////////
										if($_GET){
										$sql_banco = mysql_query("select p.nome, p.descricao, p.id_tipo, p.foto_caminho, p.quantidade_disponivel, p.promocao, p.preco, p.id_categoria, t.nome as nome_tipo,
																 c.nome as nome_categoria from produto as p 
																 inner join tipo as t on t.id=p.id_tipo 
																 inner join categoria as c on c.id=p.id_categoria where p.id=$id_produto_banco");
										
										if(mysql_num_rows($sql_banco)>0){
											while($linhas_banco = mysql_fetch_array($sql_banco, MYSQL_ASSOC)){												
												$nome_produto_banco       =	$linhas_banco['nome'];
												$descricao_produto_banco  = $linhas_banco['descricao'];
												$quantidade_produto_banco = $linhas_banco['quantidade_disponivel'];												
												$preco_produto_banco      = $linhas_banco['preco'];
												$promocao_produto_banco	  = $linhas_banco['promocao'];
												$id_categoria_banco       = $linhas_banco['id_categoria'];
												$nome_categoria_banco 	  = $linhas_banco['nome_categoria'];
												$id_tipo_banco            = $linhas_banco['id_tipo'];
												$nome_tipo_banco          = $linhas_banco['nome_tipo'];	
												
												
											}
										}else{
											//echo "#Nenhum produto encontrado";
										}
										}
										
										///////////////////
										?>										
									<form class="form-horizontal row-fluid"  method="post" action="editar_produto.php?id=<?php echo $id_produto_banco;?>" enctype="multipart/form-data">
										<div class="control-group">
											<label class="control-label" for="basicinput">Nome: </label>
											<div class="controls">
												<input type="text" id="basicinput" class="span8" name="nome" value="<? echo $nome_produto_banco;?>"  required>
												<span class="help-inline">Mínimo 5 Caracteres</span>
											</div>
										</div>
																												
									 	<div class="control-group">
											<label class="control-label" for="basicinput">Valor: </label>
											<div class="controls">
												<div class="input-append">
													<span class="add-on" >R$</span><input type="number" class="span8" name="valor" value="<? echo $preco_produto_banco;?>" required>													
												</div>
												<span class="help-inline">Obs: Usar apenas números inteiros</span>
											</div>
										</div> 	
										<div class="control-group">
											<label class="control-label" for="basicinput">Quantidade: </label>
											<div class="controls">
												<div class="input-append">
													<input type="number" class="span8" name="quantidade" value="<? echo $quantidade_produto_banco;?>" >
												</div>
											</div>
										</div> 									
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Promoção</label>
											<div class="controls">
												<select tabindex="1"  class="span8" name="promocao" >
													<option value="<? echo $promocao_produto_banco;?>" ><? echo $promocao_produto_banco;?> </option>											
													<option value="S">Sim</option>
													<option value="N">Não</option>
					
												</select>
											</div>
										</div>
										
										
										
										
								 		<div class="control-group">
											<label class="control-label" for="basicinput">Categoria</label>
											<div class="controls">
												<select tabindex="1" class="span8" name="id_categoria" >
													<option value="<? echo $id_categoria_banco;?>"><? echo $nome_categoria_banco;?></option>
													<?php 
										$cat = mysql_query("select id,nome from categoria");
			
											if(mysql_num_rows($cat)>0){
			
			
												while($linhas = mysql_fetch_array($cat, MYSQL_ASSOC)){
													echo '<option value="'.$linhas['id'].'">'.$linhas['nome'].'</option>';					


												}
											}
									?>								
												</select>
											</div>
										</div>

							
							<div class="control-group">
											<label class="control-label" for="basicinput">Tipo</label>
											<div class="controls">
												<select tabindex="1" class="span8" name="id_tipo">
												
													<option value="<? echo $id_tipo_banco;?>"><? echo $nome_tipo_banco;?></option>
													<?php 
										$cat = mysql_query("select id,nome from tipo");
			
											if(mysql_num_rows($cat)>0){
			
			
												while($linhas = mysql_fetch_array($cat, MYSQL_ASSOC)){
													echo '<option value="'.$linhas['id'].'">'.$linhas['nome'].'</option>';					


												}
											}
									?>								
												</select>
											</div>
										</div>
							
							
							
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Descrição: </label>
											<div class="controls">
												<textarea class="span8" rows="5" name="descricao" required><? echo $descricao_produto_banco;?></textarea>
											</div>
										</div>
										<br>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp; Selecione uma imagem: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="arquivo" type="file" />
											<br><br><br>
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