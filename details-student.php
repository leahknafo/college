<?php
include 'menu-school.php';
//The variable gets as an array of objects the details of the student that was clicked;
$studentsDetails= $sbl->getOne($_SESSION["detailsOfStudent"]);
//The variable gets as an array of objects the courses of the student that was clicked;
$arrayOfCourseByStudent= $cbl->getCourseByStudent($_SESSION["detailsOfStudent"]);
?>

<main class="maincontainer">
    <div class="container">
    <form action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST'>
    <div class="col-md-0">   
    <h4><strong><?php echo $studentsDetails->getStudentName();?></strong></h4>
    </div>
    <div class="editbutton">
    <button name="editstudentbutton">Edit</button>
    </div>
    <br>
    <div class="row">
    <div class="col-md-1">
        <img src="<?php echo $studentsDetails->getStudentImage()?>" style="width:50px; height:50px;"/> 
      </div>
      <div class="col-md-1">
        <h4><strong><?php echo $studentsDetails->getStudentName();?></strong></h4> 
        <?php echo $studentsDetails->getStudentPhone();?> 
        <?php echo $studentsDetails->getStudentEmail();?> 
      </div>
      </div>
      <br>
      <?php foreach ($arrayOfCourseByStudent as $course) { ?>
      <div class="row">
      <img src="<?php echo $course->getCourseImage();?>" style="width:40px; height:40px;"/>
      <span>Course</span> 
      <strong><?php echo $course->getCourseName();?></strong>    
      </div>
      <?php $_SESSION["courseid"] = $course->getCourseId();?>
      <?php } ?>
      </div>
    </form>
</div>
</main>   
</body>
</html>