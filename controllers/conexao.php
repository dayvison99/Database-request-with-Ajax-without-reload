<?php
      $host = "localhost";
      $db   = "bdcontass";
      $user = "root";
      $pass = "secreta123";
      // conecta ao banco de dados
      $con = new mysqli($host, $user, $pass,$db) or trigger_error(mysql_error(),E_USER_ERROR);

      if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
      }



?>
