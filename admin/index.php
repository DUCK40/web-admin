<?php
session_start();
if(empty($_SESSION['name']) || $_SESSION['name'] != 'Super Admin'){
    header('Location: ../logout.php'); 
}else{
    header("location: ./listsubcate.php");
}
exit(0);
