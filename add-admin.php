<?php
include 'menu-admin.php';
?>
    <main class="maincontainer">
    <div class="container">
    <h4><strong>Add Administrator</strong></h4>
    <hr>
        <form class="form-horizontal" action="save-admin.php" method='POST' enctype="multipart/form-data">
        <div class="form-group">
                <div class="col-md-offset-0 col-sm-10">
                    <button type="submit" class="btn btn-default" onclick="validation(event)">Save</button>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="name">Name:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="adminname" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="phone">Phone:</label>
                <div class="col-md-3">
                    <input type="number" class="form-control" id="phone" placeholder="Enter phone" name="adminphone" required>
                </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-2" for="email">Email:</label>
                    <div class="col-md-3">
                      <input type="email" class="form-control" id="email" placeholder="Enter email" name="adminemail" required>
                    </div>
            </div>
            <div class="form-group">
            <label class="control-label col-md-2" for="role">Role:</label>
            <div class="col-md-3">
                <select class="form-control" id="role" placeholder="Enter role" name="adminrole" required>
                <option>manager</option> 
                <option>sales</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="password">Password:</label>
                <div class="col-md-3">
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="adminpassword" required>
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
            if ($("#role").val()!="manager" && $("#role").val()!="owner" && $("#role").val()!="sales")
            {
                alert ("You must enter a role only from the existing");
                e.preventDefault();
              return false;
            }
           

    }
    </script>
</main>
</body>

</html>