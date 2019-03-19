<?php
/* All "view" pages of "school" are linked to this page which contains the code to execute while a button of the system buttons is pressed .
   If the clicked button is one of the "students-details" or "courses-details" buttons, the corresponding "session" will receive the ID information of the click. 
   This information will be used to perform the various actions of the system. 
   Additionally, this page also contains the necessary variables for all school pages, and the expression "session_srart" for them;*/

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
                require_once './bl-course.php';
                require_once './bl-student.php';
                require_once './bl-admin.php';
                $cbl = new BusinessLogicCourse;
                $sbl = new BusinessLogicStudent;
                $abl = new BusinessLogicAdmin;
                $arrayOfCourse = $cbl->get();
                $arrayOfStudent = $sbl->get();
                $path='img/';
                
?>
