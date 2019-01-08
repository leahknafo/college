<?php
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
            if ($uploadOk != 0){
    $student = new StudentModel([
        'student_name' =>  $_POST['studentname'],
        'student_phone' => $_POST['studentphone'],
        'student_email' => $_POST['studentemail'],
        'student_image' => $path.$_FILES['input']['name']
    ]);

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
    include 'add-student.php';
}
}
    }
else{
    $message = "One or more fields are incorrect or missing";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>



