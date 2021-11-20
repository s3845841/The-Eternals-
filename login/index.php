<?php require_once('../crud/userCrud.php'); ?>
<?php require_once('../includes/functions.inc.php'); ?>
<?php require_once('../model/user.php'); ?>
<?php
    $loginError = false;
    if(isset($_POST['login'])) {
        $userCrud = new UserCrud();
        $currentUser = $userCrud->isLogin($_POST['email'], $_POST['pw']);
        if (isset($currentUser)) {
            $_SESSION[USER_SESSION_KEY] = $currentUser;
            header('Location: ../');
            exit();
        } else {
            $loginError = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <link rel="icon" href="../images/logo.png"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../styles/header.css">
        <link rel="stylesheet" type="text/css" href="../styles/loginrego.css"> 
    </head>
    <body>
        <?php
        require_once('../includes/header.inc.php');
        ?>
        <article>
            <div class="formcontainer aligncenter">
                <form id="form" method="post">

                    <div class="noselect">
                        <label for="email">Email</label>
                    </div>
                        <input type="text" id="email" name="email" required>
                    <?php 
                        if ($loginError) {
                            echo displayError("Email incorrect!"); 
                        }
                    ?>


                    <div class=" noselect">
                        <label for="pw">Password</label>
                    </div>


                    <input type="password" id="pw" name="pw" required>

                    <?php 
                        if ($loginError) {
                            echo displayError("Password incorrect!"); 
                        }
                    ?>

                    <br><br><br>
                    <input id="login" name="login" type="submit" value="LOG IN">
                    <br><br>
                    <h3>OR</h3>
                    <br>
                    <a href="../register/">
                    <button id="register" type="button">REGISTER</button>
                    </a>
                    
                </form>
            </div>
        </article>
    </body>
</html>