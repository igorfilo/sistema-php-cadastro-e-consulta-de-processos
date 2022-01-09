<?php
require 'conexao.php';
require 'Utils.php';

if (!isset($_GET['pg']) || $_GET['pg'] == '') {
    //header("location: ?pg=1");
    echo "<script>window.location=location+'" . (isset($_GET['termo']) ? '&' : '?') . "pg=1'</script>";
}

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
$page = $_GET['pg'];

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nprotocolo, assunto, data, hora, destino, interessado, arquivo FROM tab_processos ORDER BY data DESC, hora DESC';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$processos = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nprotocolo, assunto, data, destino FROM tab_processos WHERE nprotocolo LIKE :nprotocolo OR assunto LIKE :assunto';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nprotocolo', $termo.'%');
	$stm->bindValue(':assunto', '%'.$termo.'%');
	$stm->execute();
	$processos = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<?php include 'header.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Listagem de Processos</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = ""/>
</head>
<body>

	<div class='container'>

		<fieldset>		
		
			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-1 control-label" for="termo"></label>
				<div class='col-md-6'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Pesquise pelo NÚMERO do protocolo ou ASSUNTO">
				</div>
			    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
			    <a href='processo.php' class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Todos</a>
			</form>

			<!-- Link para página de cadastro -->
			<a href='cadastro.php' class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"> </span>  Cadastrar Processo</a>
			
			<div class='clearfix'></div>
			<br />
			<!-- Cabeçalho da Listagem -->

			<?php
			if (!empty($processos)) {
            $processosPag = getListaPaginada($processos, 10);
            $pages = sizeof($processosPag);
            ?>

			<h3 style="text-align:center;">PROCESSOS CADASTRADOS</h3>
				<!-- Tabela de Processos -->
				
				<table class="table table-bordered">
					<tr class='active'>
						<th>NÚMERO DE PROTOCOLO</th>
						<th>ASSUNTO</th>
						<th>DATA</th>
						<th>INTERESSADO</th>
						<th>AÇÃO</th>
					</tr>

					<?php
						foreach ($processosPag[$page - 1] as $processo) {
                    ?>
                    <tr>
							<td><?=$processo->nprotocolo?></td> 
							<td class="p-assunto"><?=$processo->assunto?></td> 
							<td><?php echo date('d/m/Y', strtotime($processo->data));?></td> 
							<td><?=$processo->interessado?></td> 
							<td>
							<a href='editar.php?id=<?=$processo->id?>' class="btn btn-primary"> <span class="glyphicon glyphicon-pencil"></span> Editar</a>
								<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$processo->id?>"><span class="glyphicon glyphicon-trash"></span> Excluir</a>
							</td>
						</tr>
                    <?php
                }
                ?>
					
				<td colspan="6">
				<nav aria-label="paginacao">
					  <ul class="pagination">
						<?php
                                $back = ($page > 1 ? '' : "class='disabled' ");
                                ?>
						<li <?= $back ?> class="page-item"><a class="page-link" href="?pg=<?php echo($page > 1 ? $page - 1 : $page); ?>">Anterior</a></li>
						
						<!-- 
						<?php /*
                            if ($pages > 0) {
                                for ($i = 0; $i < $pages; $i++) {
                                    $active = ($i + 1 == $page ? "class='active'" : "");
                                    $pg = ($i + 1);
                                    echo "<li {$active}><a href='?pg={$pg}'>{$pg}</a></li>";
                                }
                            }
                            $next = ($page < $pages ? '' : "class='disabled' ");
                        */ ?> -->
						
						
						<li class="page-item"><a class="page-link" href="?pg=<?php echo($page < $pages ? $page + 1 : $page); ?>">Próximo</a></li>
						
					  </ul>
					
				</nav>
				</td>
				</table>

		<?php } else { ?>

				<!-- Mensagem caso não exista processos ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem processos cadastrados!</h3>
		<?php } ?>
		
		<th class="col-md-4">Quantidade de Processos Cadastrados: 
                <?php
				$conexao = conexao::getInstance();
				
				$sql = ('SELECT COUNT(*) FROM tab_processos');  
				$stm = $conexao->prepare($sql);
				$stm->execute();
			   
                $contador = (int) $stm->fetchColumn(0);
                if ($contador > 0) {
                    echo " $contador <br />";
                }
                ?>
		</th>


		</fieldset>
		
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
<?php include 'footer.php'; ?>

</body>
</html>