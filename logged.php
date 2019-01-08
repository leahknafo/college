<?php
include 'links-variables-school.php'; 
 require_once 'bl-admin.php';
$abl = new BusinessLogicAdmin;
if(isset($_POST["loginbutton"])){
  $Admin = $abl->getOne($_POST["email"]);
  $_SESSION["adminemail"]=$_POST["email"];
  if($Admin->getAdminPassword() == md5($_POST["password"])){
    if($Admin->getAdminRole() == "owner"){
        $_SESSION["user"] ="owner";
    }
    else if($Admin->getAdminRole() == "manager"){
        $_SESSION["user"] ="manager";
      }
    else if($Admin->getAdminRole() == "sales"){
      $_SESSION["user"] ="sales";
      }
      include 'homepage-school.php';
  }
  else{
    $message = "Unregistered user";
    echo "<script type='text/javascript'>alert('$message');</script>";
    include 'login.php';
}
}
?>