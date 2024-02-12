<?php
require 'conexao.php';
require 'Utils.php';
include_once ("painel_funcao.php");

#       conecta e consulta os membros no banco
	$conexao = conexao::getInstance();
	$sql = ('SELECT * FROM membro');  
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$usuarios = $stm->fetchAll(PDO::FETCH_OBJ);
	
	
?> 
<!--	Listar usuários -->
<!DOCTYPE html> 
  <html> 
    <head>
	<meta charset="utf-8">
	<title>Painel | Usuários</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = ""/>
		
	</head>
    <body> 
	<?php include 'header.php';?>
	<div class='container'>
	<fieldset>	
	
			
      <table class="table table-hover">
          <!-- Lista os dados dos membros -->
        
		<tr class='active'>
         
          <td>Usuário</td> 
          <td>Nome Completo</td>
          <td>Telefone</td>
          <td>Observação</td> 
          <td>Ação</td>
		  
        </tr>
		
       <?php
						foreach ($usuarios as $usuario) {
       ?>
        <tr> 
         <td><?=$usuario->usuario?></td> 
         <td><?=$usuario->nome_completo?></td> 
         <td><?=$usuario->telefone?></td> 
         <td><?=$usuario->obs?></td> 
         <td>
		 
			<a href='editar_usuario.php?id=<?=$usuario->id?>' class="btn btn-primary" title="Editar Usuário"> <span class="glyphicon glyphicon-pencil"></span> </a>
			
			 <a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$usuario->id?>" title="Excluir Usuário"><span class="glyphicon glyphicon-trash" ></span> </a>
		
		</td> 
        </tr>
      
		<?php } ?>
      </table>
	  
	<?php
		//mensagem que não existe usuários em caso de estar vazio no banco
		if(empty($usuarios)) {
		echo '<div class="alert alert-danger" role="alert" style="text-align:center;">Não existem usuários cadastrados.</div>';
			}
	?>
	  
	  
	  <br />
		<div class="col-md-12" style="margin-top: 30px; text-align:center; margin-bottom: 10px;">
					
				    <a href='painel.php' class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"> </span> Voltar </a>
		</div>
     	</fieldset>	
	</div>
	<script type="text/javascript" src="js/custom_usuarios.js"></script>
<?php include 'footer.php'; ?>
    </body>
    
       
</html>