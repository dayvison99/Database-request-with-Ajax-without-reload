<?php
require("../controllers/conexao.php");

  if(count($_POST)>0){

   if($_POST['type']==1){

     $descricao=strtoupper($_POST['descricao']);
     $usuario=strtoupper($_POST['usuario']);
     $datatarefa=$_POST['datai'];
     $datacriacao = date("d-m-Y");
     date('d-m-Y', strtotime('NOW()'));
     $datacriacao = $datacriacao;

     $sql = "INSERT INTO `tarefas`( `descricao`,`usuario`,`datatarefa`,`datacriacao`)
     VALUES ('$descricao','$usuario','$datatarefa','$datacriacao')";
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
   $descricao=strtoupper($_POST['descricao']);
   $usuario=strtoupper($_POST['usuario']);
   $datatarefa=strtoupper($_POST['datai']);

   $sql = "UPDATE `tarefas` SET `descricao`='$descricao',`usuario`='$usuario',`datatarefa`='$datatarefa' WHERE id=$id";
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
