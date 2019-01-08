<?php
 include 'menu-school.php';
          ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        <link href="college.css" rel="stylesheet" />
</head>
<body>
<header>
</header>
<main class="maincontainer">
    <div class="container">
    <br>
    <div class="row">
    <div class="alert alert-info col-md-3">Total Students:<?php echo count($arrayOfStudent); ?></div>
    </div>
    <div class="row">
    <div class="alert alert-info col-md-3">Total Courses:<?php echo count($arrayOfCourse); ?></div>
    </div>
    </div>
</main>   
</body>
</html>