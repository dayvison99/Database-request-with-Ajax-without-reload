<!DOCTYPE html>
<html lang="pt-br">
  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../img/favicon.ico">
        <title>Contass</title>
        <!-- Bootstrap core CSS -->
        <link href="/static/css/bootstrap.min.css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="/static/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/static/css/signin.css" rel="stylesheet">
        <script src="/static/js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>
    <div class="container">
      <form class="form-signin" method="POST" action="../controllers/valida_login.php" >
	  	<h2 class="form-signin-heading"><img src="/static/assets/img/contasslogo.png" height="80%" width="80%"> </h2>
        <h3 class="form-signin-heading"><center>Projeto Contass </h3></center>
	         <label for="inputEmail" class="sr-only">Usuário </label>
             <input type="text" name="usuario" class="form-control" placeholder="Digite o Usuário" required autofocus>
                <br />
  	               <label for="inputPassword" class="sr-only">Senha</label>
                   <input type="password" name="senha" class="form-control" placeholder="Digite a Senha" required>

               <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
       </form>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../static/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
