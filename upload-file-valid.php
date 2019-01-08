<?php
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["input"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(!empty($_FILES["input"]["tmp_name"])){
    $check = getimagesize($_FILES["input"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    }
    } else {
        $message = "File is not an image.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    $message = "Sorry, file already exists.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["input"]["size"] > 500000) {
    $message = "Sorry, your file is too large.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $message = "Sorry, your file was not uploaded.";
    echo "<script type='text/javascript'>alert('$message');</script>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["input"]["tmp_name"], $target_file)) {
        $uploadOk = 1;
    } else {
        $message = "Sorry, there was an error uploading your file.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>