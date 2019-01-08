<?php
include 'menu-school.php';
?>
<main class="maincontainer">
    <div class="container">
    <h4><strong>Add Course</strong></h4>
    <br>
     <!-- After filling out the details on the form and clicking the button, Upon completion of the client-side validation,
         the data goes to the page specified in "action" for server-side validation and saving information in sql -->
        <form class="form-horizontal" action="save-course.php" method='POST' enctype="multipart/form-data">
        <div class="form-group">
                <div class="col-md-offset-0 col-sm-10">
                    <button type="submit" class="btn btn-default" name="savebutton" onclick="validation(event)">Save</button>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="name">Name:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="coursename" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Description">Description:</label>
                <div class="col-md-3">
                    <textarea type="text" class="form-control" id="Description" placeholder="Enter Description" name="coursedesc" required></textarea>
                </div>
            </div>
                  <div class="form-group">
                  <label class="control-label col-md-2" for="email">image:</label>
                  <div class="col-md-3">
                  <input type="file" class="form-control" name="input" accept="image/*" onchange="loadFile(event)" required>
            <br>
            <img id="output" style="width:50px; height:50px;"/>
</div>
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