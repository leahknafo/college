<?php
include 'links-variables-school.php';
    if (isset($_POST["deletestudent"])) {
      $detailsOfStudent= $sbl->getOne($_POST['deletestudent']);
        $sbl->delete($_POST["deletestudent"]);
        $sbl->deleteStudentByCourse($_POST["deletestudent"]);
        include 'school.php';
    }
    if (
        isset($_POST["savestudent"]) && 
        !empty($_POST["studentname"]) && 
        !empty($_POST["studentphone"]) && 
        !empty($_POST["studentemail"]) && 
        !empty($_POST["studentcourse"])) {
          if(
            strlen($_POST['studentname']) <= 20 && 
            strlen($_POST['studentphone']) <= 10 && 
            strlen($_POST['studentemail']) <= 30){
          $detailsOfStudent= $sbl->getOne($_POST['savestudent']);
          if ($_FILES['input']['tmp_name']!=null) {
            include 'upload-file-valid.php';
            }
        else{
              $uploadOk = 1 ;
              move_uploaded_file($_FILES['input']['tmp_name'],$path.$_FILES['input']['name']);
            }
          if ($uploadOk != 0){
          $detailsOfStudent->setStudentName($_POST['studentname']);
          $detailsOfStudent->setStudentPhone($_POST['studentphone']);
          $detailsOfStudent->setStudentEmail($_POST['studentemail']);
          if ($_FILES['input']['tmp_name']!=null) {
            $detailsOfStudent->setStudentImage($path.$_FILES['input']['name']);
          }
          $sbl->update($detailsOfStudent);
         
         

          $sbl->deleteStudentByCourse($_POST["savestudent"]);
          foreach ($_POST["studentcourse"] as $courseId) {
                $sbl->setStudentByCourse($_POST['savestudent'],$courseId);
          }
          include 'details-student.php';
  }
  else{
    include 'edit-student.php';
}
}
        }
  else if(isset($_POST["savestudent"]) && empty($_POST["studentcourse"])){
    $message = "Please choose a course";
    echo "<script type='text/javascript'>alert('$message');</script>";
    include 'edit-student.php';
  }
   
?>

