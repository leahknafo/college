<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['addadminbutton'])) {
   header("Location: add-admin.php");
   }
     if (isset($_POST['detailsadminbutton'])) {
        $_SESSION["detailsOfAdmin"] = $_POST['detailsadminbutton'];
       header("Location: edit-admin.php");
       } 
       if (isset($_POST["editbutton"])) {
        header("Location: edit-admin.php");
        }
        ?>