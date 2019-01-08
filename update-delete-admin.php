<?php
include "links-admin.php";  
require_once './admin-bl.php';
$abl = new BusinessLogicAdmin;
$arrayOfAdmin = $abl->get();
$detailsOfAdmin= $abl->getOne($_POST["adminemail"]);
$path='img/';
if (isset($_POST["deleteadmin"])) {
    $abl->delete($_POST["adminemail"]);
}
// Server side validations
if (!empty($_POST["adminname"]) 
    && !empty($_POST["adminphone"])
    && !empty($_POST["adminemail"]) 
    && !empty($_POST["adminrole"])) {
        if(
            strlen($_POST['adminname']) <= 20 && 
            strlen($_POST['adminphone']) <= 10 && 
            strlen($_POST['adminemail']) <= 30){
    $pwd = $_POST['adminpassword'];
    if ($_FILES['input']['tmp_name']!=null) {
        include 'upload-file-valid.php';
        }
    else{
          $uploadOk = 1 ;
          move_uploaded_file($_FILES['input']['tmp_name'],$path.$_FILES['input']['name']);
        }
    if ($uploadOk != 0){
    $detailsOfAdmin->setAdminName($_POST["adminname"]);
    $detailsOfAdmin->setAdminPhone($_POST["adminphone"]);
    $detailsOfAdmin->setAdminEmail($_POST["adminemail"]);
    $detailsOfAdmin->setAdminRole($_POST["adminrole"]);
    $detailsOfAdmin->setAdminPassword(md5($pwd));
    if ($_FILES['input']['tmp_name']!=null) {
    $detailsOfAdmin->setAdminImage($path.$_FILES['input']['name']);
    }
    $abl->update($detailsOfAdmin);
    include 'admin.php';
    }
    else{
        include 'edit-admin.php';
        }
    }
}

 
    
?>
