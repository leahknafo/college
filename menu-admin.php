<?php
    include "links-admin.php"; 
    require_once './admin-bl.php';
    $abl = new BusinessLogicAdmin;
    $arrayOfAdmin = $abl->get();
    $admin = $abl->getOne($_SESSION["adminemail"]);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>college</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        <link href="college.css" rel="stylesheet" />
</head>
<body>
<header>
    <div class="container">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="img/college.png" width="70px"; height="30px";/></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="school.php">school</a></li>
      <li class="active"><a href="admin.php">administration</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php">logout</a></li>
      <li><span style="color:white;"><?php echo $admin->getAdminName().', '?>&nbsp</span></li>
      <li><span style="color:white;"><?php echo $admin->getAdminRole()?>&nbsp</span></li>
      <li><img src='<?php echo $admin->getAdminImage() ?>' style="width:40px; height:50px; color:white;"/></li>
      <li></li>
    </ul>
  </div>
</nav>
    </div>
</header>
<main>
<form action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST'>
    <div class="container">
      <div class="row">
          <div class="col-md-4">administrators
          <button class="glyphicon glyphicon-plus-sign" name="addadminbutton"></button>
        <p>
      <?php foreach ($arrayOfAdmin as $item) { ?>
        <?php if($_SESSION["user"] =="owner" || $item->getAdminRole()!="owner"){?>
      <div>
      <button value='<?php echo $item->getAdminEmail() ?>' name='detailsadminbutton'>
      <div class="row">
      <div class="col-md-3">
        <img src="<?php echo $item->getAdminImage() ?>" style="width:30px; height:40px;"/> 
      </div>
        <div class="col-md-2">
        <?php echo $item->getAdminName() ?>
        <?php echo $item->getAdminRole() ?>
        <?php echo $item->getAdminPhone() ?>
        <?php echo $item->getAdminEmail() ?>
        </div>
        </div>
      </button>
      </div>
      <br>
      <?php } ?>
      <?php } ?>
      </p>
      </div>
    </div>
    </div>
    </form>
</main>
</body>
</html>