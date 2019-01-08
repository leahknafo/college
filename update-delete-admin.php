<?php
include "links-variables-admin.php";  
$detailsOfAdmin= $abl->getOne($_POST["adminemail"]);

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
    //If an image has been updated, the image should be validated:
    if ($_FILES['input']['tmp_name']!=null) {
        include 'upload-file-valid.php';
        }
    else{
        //If the picture remains the same, continue;
          $uploadOk = 1 ;
          move_uploaded_file($_FILES['input']['tmp_name'],$path.$_FILES['input']['name']);
        }
    if ($uploadOk != 0){
        //If the picture remains the same or if it updated and validated successfully, update data in sql:
    $detailsOfAdmin->setAdminName($_POST["adminname"]);
    $detailsOfAdmin->setAdminPhone($_POST["adminphone"]);
    $detailsOfAdmin->setAdminEmail($_POST["adminemail"]);
    $detailsOfAdmin->setAdminRole($_POST["adminrole"]);
    $detailsOfAdmin->setAdminPassword(md5($pwd));
    if ($_FILES['input']['tmp_name']!=null) {
    $detailsOfAdmin->setAdminImage($path.$_FILES['input']['name']);
    }
    $abl->update($detailsOfAdmin);
    include 'homepage-admin.php';
    }
    else{
        //If the validations did not pass successfully return to "edit-admin.php":
        include 'edit-admin.php';
        }
    }
}

 
    
?>
