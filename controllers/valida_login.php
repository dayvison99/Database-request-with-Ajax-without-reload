<?php
require("../controllers/conexao.php");
if(!isset($_SESSION)){
        session_start();
  }

  $usuariot = $_POST['usuario'];
  $senhat = $_POST['senha'];

  $result = mysqli_query($con,"SELECT * FROM user WHERE usuario='$usuariot' AND senha='$senhat' ");
  $resultado = mysqli_fetch_assoc($result);

   if($resultado == FALSE) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      require("../templates/login.php");
      echo "<center>Usuário ou Senha Invalidos!</center>";

  } else {

      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNome'] = $resultado['usuario'];
      $_SESSION['Nome'] = $resultado['nome'];
      require("../templates/index.php");

      }
?>
