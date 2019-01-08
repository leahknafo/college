<?php
// All "view" pages of "admin" are linked to this page which contains the code to execute while a button of the system buttons is pressed.
// If the clicked button is one of "admin-details" buttons, the corresponding "session" will receive the ID information of the click.
// This information will be used to perform the various actions of the system. 
// Additionally, this page also contains the necessary variables for all admin's pages, and the expression "session_srart" for them;

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
        require_once './bl-admin.php';
        $abl = new BusinessLogicAdmin;
        $arrayOfAdmin = $abl->get();
        $path='img/';
        ?>