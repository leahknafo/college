<?php
include 'links-variables-school.php';  
// Server side validations 
    if (
        !empty($_POST['coursedesc']) && 
        !empty($_POST['coursename']) && 
        !empty($_FILES['input'])) {
            if(
                strlen($_POST['coursedesc']) <= 500 && 
                strlen($_POST['coursename']) <= 20){
            include 'upload-file-valid.php';
            //If image is supported, Insert data to sql:
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
            //If image is not supported, go back to "add-course" page;
            include 'add-course.php';
            }
}
        }
//If the validations falsed, You will receive an error message:
else{
    $message = "One or more fields are incorrect or missing";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

  
?>

