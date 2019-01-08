<?php
include 'menu-school.php';  
$studentsDetails= $sbl->getOne($_SESSION["detailsOfStudent"]);
?>
    <main class="maincontainer">
    <div class="container">
    <h4><strong>Edit <?php echo $studentsDetails->getStudentName() ?></strong></h4>
    <br>
        <form class="form-horizontal" action="update-delete-student.php" method='POST' enctype="multipart/form-data">
                <div>
                    <button value='<?php echo $studentsDetails->getStudentId() ?>' name="savestudent" class="savebutton" onclick="validation(event)">Save</button>
                </div>
                <div>
                    <button value='<?php echo $studentsDetails->getStudentId() ?>' name="deletestudent"  class="deletebutton" onclick="return confirm('Are you sure about deleting the student permanently?')">delete</button>
                </div>
                <br><br><br>
            <div class="form-group">
                <label class="control-label col-md-2" for="name">Name:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="name" value="<?php echo $studentsDetails->getStudentName() ?>" name="studentname" required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-2" for="phone">Phone:</label>
                <div class="col-md-3">
                    <input type="number" class="form-control" id="phone" value="<?php echo $studentsDetails->getStudentPhone() ?>" name="studentphone" required>
                </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-2" for="email">Email:</label>
                    <div class="col-md-3">
                      <input type="email" class="form-control" id="email" value="<?php echo $studentsDetails->getStudentEmail() ?>" name="studentemail" required>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-md-2" for="input">image:</label>
                  <div class="col-md-3">
   <input type="file" class="form-control" name="input" accept="image/*" onchange="loadFile(event)">
   <br>
   <img id="output" src="<?php echo $studentsDetails->getStudentImage() ?>" style="width:50px; height:50px;"/>
</div>
    </div>
            <div class="form-group">
            <label class="control-label col-md-2" for="name">courses:</label>
            <?php foreach ($arrayOfCourse as $item) { ?>
            <?php
                $isReg = '';
  
                foreach($studentsDetails->getCourses() as $studentCourse) {
                    if ($item->getCourseId() == $studentCourse->getCourseId()) {
                        $isReg = 'checked';
                        break;
                    }
                }
                ?>
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <input type="checkbox" name="studentcourse[]" id="course" value='<?php echo $item->getCourseId()?>' <?php echo $isReg; ?>><?php echo $item->getCourseName() ?>
                        
                        </label>
                    </div>
                </div>
                <?php } ?>
            </div>
        </form>
    </div>
    <script>
       var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };  

    function validation(e)
    {
        if ($("#phone").val().length>10 || $("#phone").val().length<9)
            {
                alert ("Worng number. Please enter digits in sequence, including area code on landline phones");
                e.preventDefault();
              return false;
            }
            if ($("#name").val().length>20)
            {
                alert ("Name limited to 20 characters");
                e.preventDefault();
              return false;
            }
            if ($("#email").val().length>30)
            {
                alert ("Email limited to 30 characters");
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