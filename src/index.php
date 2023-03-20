<?php
   include('checksession/security.php');
   require "database/dbconfig.php";
   echo $_SESSION['username'];
   header('Location:../home/');
?>
