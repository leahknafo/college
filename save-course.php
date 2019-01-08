<?php
include 'links-variables-school.php';   
    if (
        !empty($_POST['coursedesc']) && 
        !empty($_POST['coursename']) && 
        !empty($_FILES['input'])) {
            if(
                strlen($_POST['coursedesc']) <= 500 && 
                strlen($_POST['coursename']) <= 20){
            include 'upload-file-valid.php';
            if ($uploadOk != 0){
            $course = new CourseModel([
            'course_name' => $_POST['coursedesc'],
            'course_desc' => $_POST['coursename'],
            'course_image' => $path.$_FILES['input']['name']
        ]);
     
        $newCourseId=$cbl->set($course);
        $courseDetails= $cbl->getOne($newCourseId);
        $_SESSION["detailsofcourse"]=$newCourseId;
        include 'details-course.php';
    }
            else{
            include 'add-course.php';
            }
}
        }

  
?>

