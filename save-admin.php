<?php
include "links-admin.php"; 
require_once './admin-bl.php';
    $abl = new BusinessLogicAdmin;
    $path='img/';
if (
    !empty($_POST['adminname']) && 
    !empty($_POST['adminphone']) && 
    !empty($_POST['adminemail']) && 
    !empty($_POST['adminrole']) && 
    !empty($_POST['adminpassword'])){
        if(
            strlen($_POST['adminname']) <= 20 && 
            strlen($_POST['adminphone']) <= 10 && 
            strlen($_POST['adminemail']) <= 30){
    $pwd = $_POST['adminpassword'];
    include 'upload-file-valid.php';
    if ($uploadOk != 0){
    $admin = new AdminModel([
        'admin_name' =>  $_POST['adminname'],
        'admin_phone' => $_POST['adminphone'],
        'admin_email' => $_POST['adminemail'],
        'admin_role' => $_POST['adminrole'],
        'admin_password' => md5($pwd),
        'admin_image' => $path.$_FILES['input']['name']
    ]);
 
    $abl->set($admin);
    include 'admin.php';
}
else{
    include 'add-admin.php';
    }
}
    }
