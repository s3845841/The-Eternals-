<?php require_once('model/user.php'); ?>
<?php require_once('includes/functions.inc.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/home.css">
    <title>EduPal</title>
  </head>

  
  <body>
    <?php
    require_once('includes/header.inc.php');
    ?>
    <!-- Main body of Home Page -->
    <div class="container-fluid">
        <br>
        <h1 class="welcome">Welcome!</h1>
        
        <p class="home-page-description">
            A local/online homework help web app for disadvantaged kids who might not have any access to 
            help around them. For example, kids who have parents that are unable to help either due to time 
            constraint or lack of education and they may not be able to afford tutoring. 
        </p>

        <div class="row">
            <div class="col-sm-1"></div>
            
            <div class="col-sm-4">
                <img class="home-page-image" src="images/1.png" alt="" width="70%" height="70%">
                </br>
                <a href="register/"><button type="button" class="home-page-button button1">Seek help as a Mentee</button></a>
            </div>

            
            <div class="col-sm-4">
                <img class="home-page-image" src="images/2.png" alt="" width="65%" height="65%">
                </br>
                <a href="register/"><button type="button" class="home-page-button button2">Volunteer as a Mentor</button></a>
            </div>
            
            <div class="col-sm-1"></div>
        </div>
    </div>

  </body>
</html>