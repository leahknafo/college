<?php
// Server side validations
include 'links-variables-school.php'; 
if (!empty($_POST['studentcourse']) 
    && !empty($_POST['studentname']) 
    && !empty($_POST['studentphone']) 
    && !empty($_POST['studentemail'])) {
        if(
            strlen($_POST['studentname']) <= 20 && 
            strlen($_POST['studentphone']) <= 10 && 
            strlen($_POST['studentemail']) <= 30){
            include 'upload-file-valid.php';
            //If image is supported, Insert data to sql:
            if ($uploadOk != 0){
    $student = new StudentModel([
        'student_name' =>  $_POST['studentname'],
        'student_phone' => $_POST['studentphone'],
        'student_email' => $_POST['studentemail'],
        'student_image' => $path.$_FILES['input']['name']
    ]);
    // We used the "lastInsertId" function (See: "dal.php") to save the data also in the reference table;
    $newStudentId=$sbl->set($student);
    foreach ($_POST["studentcourse"] as $courseId) {
    $sbl->setStudentByCourse($newStudentId,$courseId);
    }
    $studentsDetails= $sbl->getOne($newStudentId);
    $arrayOfCourseByStudent= $cbl->getCourseByStudent($newStudentId);
    $_SESSION["detailsOfStudent"]=$newStudentId;
    include 'details-student.php';
}
else{
    //If image is not supported, go back to "add-student" page;
    include 'add-student.php';
}
}
    }
    //If the validations falsed, You will receive an error message:
else{
    $message = "One or more fields are incorrect or missing";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>



