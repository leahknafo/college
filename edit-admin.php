<?php
  include "menu-admin.php";
            require_once './admin-bl.php';
            $abl = new BusinessLogicAdmin;
            $arrayOfAdmin = $abl->get();
            $adminDetails= $abl->getOne($_SESSION["detailsOfAdmin"]);
?>
<main class="maincontainer">
    <div class="container">
    <form class="form-horizontal" action="update-delete-admin.php" method='POST' enctype="multipart/form-data">
    <h4><strong>Edit <?php echo $adminDetails->getAdminName() ?> </strong></h4>
                <div>
                    <button name="saveadmin" class="savebutton" onclick="validation(event)">Save</button>
                </div>
                <?php if($_SESSION["user"] =="owner" || $_SESSION["user"] =="manager" && $adminDetails->getAdminRole()=="sales") { ?>
                <div>
                    <button name="deleteadmin"  class="deletebutton" onclick="return confirm('Are you sure about deleting this administrator permanently?')">delete</button>
                </div>
                <?php } ?>
                <br><br><br><br><br><br>
            <div class="form-group">
                <label class="control-label col-md-2" for="name">Name:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="name" value="<?php echo $adminDetails->getAdminName() ?>" name="adminname" required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-2" for="phone">Phone:</label>
                <div class="col-md-3">
                    <input type="number" class="form-control" id="phone" value="<?php echo $adminDetails->getAdminPhone() ?>" name="adminphone" required>
                </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-2" for="email">Email:</label>
                    <div class="col-md-3">
                      <input type="email" class="form-control" id="email" value="<?php echo $adminDetails->getAdminEmail() ?>" name="adminemail" required>
                    </div>
                  </div>
            <div class="form-group">
            <label class="control-label col-md-2" for="role">Role:</label>
            <div class="col-md-3">
            <?php if($_SESSION["user"] =="owner") { ?>
                <select class="form-control" id="role"  name="adminrole" required>
                <option><?php echo $adminDetails->getAdminRole() ?></option> 
                <option>manager</option> 
                <option>sales</option>
                </select>
                <?php } 
                else{?>
                <input class="form-control" value="<?php echo $adminDetails->getAdminRole() ?>" name="adminrole" readonly>
                <?php }
                ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="password">Password:</label>
                <div class="col-md-3">
                    <input type="password" class="form-control" id="password" value="<?php echo $adminDetails->getAdminPassword() ?>" name="adminpassword" required>
                </div>
            </div>
                  <div class="form-group">
                  <label class="control-label col-md-2" for="image">image:</label>
                  <div class="col-md-3">
                  <input type="file" class="form-control" name="input" accept="image/*" onchange="loadFile(event)">
                  <br>
                  <img id="output" src="<?php echo $adminDetails->getAdminImage() ?>" style="width:50px; height:50px;"/>
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