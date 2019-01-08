
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>college</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
</head>
<body>
<header>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="img/college.png" width="70px"; height="30px";/></a>
              </div>
            </div>
          </nav>
    </div>
</header>
<main>
    <div class="container">
            <form class="form-horizontal" action="logged.php" method='POST'>
                <div class="form-group">
                  <label class="control-label col-md-4" for="email">username:</label>
                  <div class="col-md-4">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4" for="pwd">Password:</label>
                  <div class="col-md-4">          
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-md-offset-4 col-md-4">
                    <button type="submit" class="btn btn-default" name="loginbutton">login</button>
                  </div>
                </div>
              </form>
    </div>
</main>
    
</body>
</html>