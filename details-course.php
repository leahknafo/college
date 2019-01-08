<?php
include 'menu-school.php'; 
$arrayOfStudentsByCourse= $sbl->getStudentByCourse($_SESSION["detailsofcourse"]);
$courseDetails= $cbl->getOne($_SESSION["detailsofcourse"]);
?>
<main class="maincontainer">
    <div class="container">
    <form action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST'>
    <div class="col-md-0">   
    <h4><strong><?php echo $courseDetails->getCourseName();?></strong></h4>
    </div>
    <?php if($_SESSION["user"] =="owner"||$_SESSION["user"] =="manager") { ?>
    <div class="editbutton">
    <button name="editcoursebutton">Edit</button>
    </div>
    <?php } ?>
    <br>
    <div class="row">
    <div class="col-md-1">
        <img src="<?php echo $courseDetails->getCourseImage() ?>" style="width:50px; height:50px;"/> 
      </div>
      <div class="col-md-8">
        <h4><strong><?php echo $courseDetails->getCourseName().','.' '.count($arrayOfStudentsByCourse); ?> Students</strong></h4> 
        <p class="desc">
        <?php echo $courseDetails->getCourseDesc() ?>
        </p>
      </div>
      </div>
      <?php foreach ($arrayOfStudentsByCourse as $students) { ?>
      <div class="row">
      <span class="col-md-1">
      <img src="<?php echo $students->getStudentImage();?>" style="width:40px; height:40px;"/>
      </span>
      <span>
      <h4><strong><?php echo $students->getStudentName();?></strong></h4>
      </span>
      </div> 
      <br>   
      <?php } ?>
      </div>
    </form>
</div>
</main>   
</body>
</html>