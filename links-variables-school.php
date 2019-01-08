<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 if (isset($_POST['addstudentbutton'])) {
    header("Location: add-student.php");
    }
    if (isset($_POST['addcoursebutton'])) {
      header("Location: add-course.php");
      }
      if (isset($_POST['detailsstudentbutton'])) {
        $_SESSION["detailsOfStudent"] = $_POST['detailsstudentbutton'];
        header("Location: details-student.php"); 
        }
        if (isset($_POST['detailscoursebutton'])) {
          $_SESSION["detailsofcourse"] = $_POST['detailscoursebutton'];
            header("Location: details-course.php");
            }
            if (isset($_POST["editstudentbutton"])) {
              header("Location: edit-student.php");
              }
              if (isset($_POST["editcoursebutton"])) {
                header("Location: edit-course.php");
                }
                require_once './course-bl.php';
                require_once './student-bl.php';
                require_once './admin-bl.php';
                $cbl = new BusinessLogicCourse;
                $sbl = new BusinessLogicStudent;
                $abl = new BusinessLogicAdmin;
                $arrayOfCourse = $cbl->get();
                $arrayOfStudent = $sbl->get();
                $path='img/';
                
?>