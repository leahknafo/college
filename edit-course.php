<?php
include 'menu-school.php';
$courseDetails= $cbl->getOne($_SESSION["detailsofcourse"]);
$arrayOfStudentsByCourse= $sbl->getStudentByCourse($_SESSION["detailsofcourse"]);
?>
<main class="maincontainer">
    <div class="container">
    <h4><strong>Edit Course <?php echo $courseDetails->getCourseName() ?></strong></h4>
    <br>
    
        <form class="form-horizontal" action="update-delete-course.php" method='POST' enctype="multipart/form-data">
        <div>
                    <button value= '<?php echo $courseDetails->getCourseId() ?>' name="savecourse" class="savebutton" onclick="validation(event)">Save</button>
                </div>
                <div>
                    <button value= '<?php echo $courseDetails->getCourseId() ?>' name="deletecourse"  class="deletebutton" onclick="return confirm('Are you sure about deleting the course permanently?')">delete</button>
                </div>
                <br><br><br>
            <div class="form-group">
                <label class="control-label col-md-2" for="name">Name:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="name" value="<?php echo $courseDetails->getCourseName() ?>" name="coursename" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Description">Description:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="Description" value="<?php echo $courseDetails->getCourseDesc() ?>" name="coursedesc" required>
                </div>
            </div>
                  <div class="form-group">
                  <label class="control-label col-md-2" for="email">image:</label>
                  <div class="col-md-3">
                  <input type="file" class="form-control" name="input" accept="image/*" onchange="loadFile(event)">
                  <br>
                  <img id="output" src="<?php echo $courseDetails->getCourseImage() ?>" style="width:50px; height:50px;"/>
                    <input style="visibility: hidden;" type="number" class="form-control" id="courseid" value="<?php echo $courseDetails->getCourseId() ?>" name="courseid">
</div>
    </div>
    <?php echo "Total ".count($arrayOfStudentsByCourse)." students taking this course";?>
        </form>
    </div>
    <script>

      var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };  
 
    function validation(e)
    {
            if ($("#name").val().length>20)
            {
                alert ("Name limited to 20 characters");
                e.preventDefault();
              return false;
            }
            if ($("#desc").val().length>500)
            {
                alert ("Description limited to 500 characters");
                e.preventDefault();
              return false;
            }
            if ($("#img").val().length>50)
            {
                alert ("Image limited to 50 characters");
                e.preventDefault();
              return false;
            }
    }
    </script>
</main>
</body>

</html>