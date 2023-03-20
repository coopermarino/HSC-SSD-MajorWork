<?php
session_start();

if(!$_SESSION['username'])
{
    echo "no session";
    header('Location:../login/');
}
?>