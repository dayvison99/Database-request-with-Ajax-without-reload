<?php
require("../controllers/conexao.php");

if(count($_POST)>0){

 if($_POST['type']==1){
   $name=strtoupper($_POST['name']);
   $email=strtoupper($_POST['email']);
   $usuario=strtoupper($_POST['usuario']);
   $senha=$_POST['senha'];

   $emailduplicado =mysqli_query($con,"select * from user where email='$email'");
   $usuarioduplicado =mysqli_query($con,"select * from user where usuario='$usuario'");
   if (mysqli_num_rows($usuarioduplicado)==0)
   {
	 if (mysqli_num_rows($emailduplicado)>0)
	{
		echo json_encode(array("statusCode"=>201));
	}
	else{
    $sql = "INSERT INTO `user`( `nome`, `email`,`usuario`,`senha`)
    VALUES ('$name','$email','$usuario','$senha')";
    if (mysqli_query($con, $sql)) {
      echo json_encode(array("statusCode"=>200));
    }
		else {
			echo json_encode(array("statusCode"=>201));
		}
	}
 }
 else {
   echo json_encode(array("statusCode"=>202));
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
   $sql = "DELETE FROM `user` WHERE id=$id ";
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
   $sql = "DELETE FROM `user`
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
