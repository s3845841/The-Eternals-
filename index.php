<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Hello, world!</title>
  </head>

  <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark edupal-nav mb-2">
        <div class="container-fluid">
            <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01"
                    aria-controls="navbarExample01"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>
        
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link edupal-logo" aria-current="page" href="#" style="color: black;">
                        EduPal
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link edupal-links" href="about/" style="color: black;">
                      About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link edupal-links" href="login/" style="color: black;">
                      Log In
                    </a>
                </li>
            </ul>
        </div>
      </nav>
  </header>

  <body>
    <!-- Main body of Home Page -->
    <div class="container-fluid">
        
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
                <button type="button" class="home-page-button button1">Seek help as a Mentee</button>
            </div>

            
            <div class="col-sm-4">
                <img class="home-page-image" src="images/2.png" alt="" width="65%" height="65%">
                </br>
                <button type="button" class="home-page-button button2">Volunteer as a Mentor</button>
            </div>
            
            <div class="col-sm-1"></div>
        </div>
    </div>

  </body>
</html>