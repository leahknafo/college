<?php
include 'links-variables-school.php';
$arrayOfStudentsByCourse= $sbl->getStudentByCourse($_SESSION["detailsofcourse"]);
// Server side validations;
    if (
      isset($_POST["savecourse"]) && 
      !empty($_POST["coursename"]) && 
      !empty($_POST["coursedesc"]) && 
      !empty($_FILES['input'])) {
        if(
          strlen($_POST['coursedesc']) <= 500 && 
          strlen($_POST['coursename']) <= 20){
      $detailsOfCourse= $cbl->getOne($_POST["savecourse"]);
      if ($_FILES['input']['tmp_name']!=null) {
        include 'upload-file-valid.php';
        }
    else{
          $uploadOk = 1 ;
          move_uploaded_file($_FILES['input']['tmp_name'],$path.$_FILES['input']['name']);
        }
      if ($uploadOk != 0){
      $detailsOfCourse->setCourseName($_POST['coursename']);
      $detailsOfCourse->setCourseDesc($_POST['coursedesc']);
      if ($_FILES['input']['tmp_name']!=null) {
         $detailsOfCourse->setCourseImage($path.$_FILES['input']['name']);
      }
        $cbl->update($detailsOfCourse);
        include 'details-course.php';
    }
  else{
    include 'edit-course.php';
}
}
      }
    if (isset($_POST["deletecourse"])) {
      $detailsOfCourse= $sbl->getOne($_POST['deletecourse']);
      if(count($arrayOfStudentsByCourse)>0){
        $message = "It is not possible to delete a course for which students are enrolled";
        echo "<script type='text/javascript'>alert('$message');</script>";
        include 'details-course.php';
      }
        else{
          $cbl->delete($_POST["deletecourse"]);
          include 'school.php';
        }
    }
?>