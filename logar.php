<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login | 3ªCIBM</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/css/custom.css">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = "fotos/brasao-cbm.ico"/>
	
	<div class="form-group" style="text-align:center; height: 80px; background-color: #d43f3a; color:#FFF; padding: 2px;">
    <section>
        <article style="font-weight: bold; font-size:14px; padding-top:4px;"> CADASTRO E CONSULTA DE PROCESSOS <br>
        </article>
    </section>
</div>
    </head>
    <body>
	
        <div class="container-fluid">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="row">
				<form action="login.php" method="post">
                    <h2><center><i class="glyphicon glyphicon-alert"></i></center></h2> <br /> 
                    <form name="meuform" id="meuform">
                        <div class="form-group" style="position: relative;">
                             <br />
							<i class="glyphicon glyphicon-user" style="position: absolute; padding: 28px 10px;"></i>
							<input type="text" name="login" id="login" class="form-control" placeholder="Digite o login" autofocus style="padding-left: 28px;"/>
                        </div><br />

                         <div class="form-group" style="position: relative;">
                            <i class="glyphicon glyphicon-lock" style="position: absolute; padding: 8px 10px;"></i>
                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite a senha"  style="padding-left: 28px;" />
                        </div>
					<div class="col-md-6" style="margin-left: 25%">
                        <button class="btn-primary form-control" type="submit"> <i class="glyphicon glyphicon-log-in"></i> LOGAR</button>
                   </div>
				   </form>

                </div>
            </div>

        </div>
	<div class="fixed-bottom" style="font-size: 14px; text-align:center; background-color: #d43f3a; color:#FFF; padding: 2px; margin-top: 15%; position: relative;">
<br />
</div>
    </body>
</html>