<?php
require("../controllers/conexao.php");

   #$usuario=strtoupper($_POST['usuario']);
  # $datatarefa=strtoupper($_POST['datai']);
   #$data_tarefa = date("d-m-Y");
   #date('d-m-Y', strtotime('NOW()'));
   #$datacriacao = $data_tarefa;

  # $sql = "INSERT INTO `tarefas`( `descricao`, `usuario`,`datatarefa`,`datacriacao`)
  #VALUES ('$name','$usuario','$datatarefa','$datacriacao')";
  echo $_POST['descricao'];
  if(count($_POST)>0){

   if($_POST['type']==1){
     $descricao=strtoupper($_POST['descricao']);

     $email=strtoupper($_POST['email']);
     $usuario=strtoupper($_POST['usuario']);
     $senha=$_POST['senha'];
     $repiatasenha=$_POST['senha1'];

     $sql = "INSERT INTO `tarefas`( `descricao`)
     VALUES ('$descricao')";
     if (mysqli_query($con, $sql)) {
       echo json_encode(array("statusCode"=>200));
     }
     else {
       echo "Error: " . $sql . "<br>" . mysqli_error($con);
     }
     mysqli_close($con);
   }
  }


if(count($_POST)>0){

 if($_POST['type']==2){
   $id=$_POST['id'];
   $name=strtoupper($_POST['name']);
   $email=strtoupper($_POST['email']);
   $usuario=strtoupper($_POST['usuario']);
   $senha=$_POST['senha'];
   $sql = "UPDATE `user` SET `nome`='$name',`email`='$email',`usuario`='$usuario',`senha`='$senha' WHERE id=$id";
   if (mysqli_query($con, $sql)) {
     echo json_encode(array("statusCode"=>200));
   }
   else {
     echo "Error: " . $sql . "<br>" . mysqli_error($con);
   }
   mysqli_close($con);
 }
}
if(count($_POST)>0){

 if($_POST['type']==3){
   $id=$_POST['id'];
   echo $id;
   $sql = "DELETE FROM `tarefas` WHERE id=$id ";
   if (mysqli_query($con, $sql)) {
     echo $id;
   }
   else {
     echo "Error: " . $sql . "<br>" . mysqli_error($con);
   }
   mysqli_close($con);
 }
}
if(count($_POST)>0){

 if($_POST['type']==4){
   $id=$_POST['id'];
   $sql = "DELETE FROM `tarefas`
    WHERE id in ($id)";
   if (mysqli_query($con, $sql)) {
     echo $id;
   }
   else {
     echo "Error: " . $sql . "<br>" . mysqli_error($con);
   }
   mysqli_close($con);
 }
}

?>
