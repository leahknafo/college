<?php
include 'menu-school.php';
?>
    <main class="maincontainer">
    <div class="container">
    <h4><strong>Add Student</strong></h4>
    <br>
     <!-- After filling out the details on the form and clicking the button, Upon completion of the client-side validation,
         the data goes to the page specified in "action" for server side validation and data retention. -->
        <form class="form-horizontal" action="save-student.php" method='POST' enctype="multipart/form-data">
        <div class="form-group">
                <div class="col-md-offset-0 col-sm-10">
                    <button type="submit" class="btn btn-default" name="savebutton" onclick="validation(event)">Save</button>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="name">Name:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="studentname" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="phone">Phone:</label>
                <div class="col-md-3">
                    <input type="number" class="form-control" id="phone" placeholder="Enter phone" name="studentphone" required> 
                </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-2" for="email">Email:</label>
                    <div class="col-md-3">
                      <input type="email" class="form-control" id="email" placeholder="Enter email" name="studentemail" required>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-md-2" id="img">image:</label>
                  <div class="col-md-3">
                  <input type="file" class="form-control" name="input" accept="image/*" onchange="loadFile(event)" required>
            <br>
            <img id="output" style="width:50px; height:50px;"/>
</div>
    </div>
            <div class="form-group">
            <label class="control-label col-md-2" for="name">courses:</label>
            <?php foreach ($arrayOfCourse as $item) { ?>
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox" name="studentcourse[]" value='<?php echo $item->getCourseId()?>'><?php echo $item->getCourseName() ?></label>
                    </div>
                </div>
                <?php } ?>
            </div>
        </form>  
    </div>
    <script>
//This code snippet allows the previewing of the uploaded image;
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };  
  
  //client-side validations;
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