<?php require_once('../crud/userCrud.php'); ?>
<?php require_once('../includes/functions.inc.php'); ?>
<?php require_once('../model/user.php'); ?>
<?php
    $emailError = false;
    if (isset($_POST['register'])) {
        $userCrud = new UserCrud();
        if (!$userCrud->emailExists(htmlspecialchars(trim($_POST['email'])))) {
            $randomNumber = rand();
            $currentUser = new User($_POST['email'], $_POST['fullname'], $_POST['membertype'], $_POST['pw'], $_POST['wwc']);
            $userCrud->create($currentUser);
            $_SESSION[USER_SESSION_KEY] = $currentUser;
            header('Location: ../');
            exit();
        } else {
            $emailError = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
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
                        <label for="fullname">Full name</label>
                    </div>
                        <input type="text" id="fullname" name="fullname" required>
                    <?php 
                        // if ($loginError) {
                        //     echo displayError("Full name incorrect!"); 
                        // }
                    ?>

                    <div class="noselect">
                        <label for="membertype">Member Type</label>
                    </div>
                    <select name="membertype" id="membertype" required onchange="isMentor()">
                        <option value="">--Please Select--</option>
                        <option value="mentor">Mentor</option>
                        <option value="mentee">Mentee</option>
                    </select>
                    <?php 
                        // if ($loginError) {
                        //     echo displayError("Email incorrect!"); 
                        // }
                    ?>


                    <div class="noselect">
                        <label for="email">Email</label>
                    </div>
                        <input type="text" id="email" name="email" required>
                    <?php 
                        if ($emailError) {
                            echo displayError("Email already exists!"); 
                        }
                    ?>


                    <div class=" noselect">
                        <label for="pw">Password</label>
                    </div>


                    <input type="password" id="pw" name="pw" required>

                    <?php 
                        // if ($loginError) {
                        //     echo displayError("Password incorrect!"); 
                        // }
                    ?>

                    <span id="wwcg">
                        <div class="noselect">
                            <label for="wwc">Working With Children No.</label>
                        </div>
                        <input type="text" id="wwc" name="wwc">
                        <?php 
                            // if ($loginError) {
                            //     echo displayError("Email incorrect!"); 
                            // }
                        ?>
                    </span>

                    <br><br><br>
                    <input id="register" name="register" type="submit" value="Register">
                    
                </form>
            </div>
        </article>
        <script>

            function isMentor() {
                memberType = document.getElementById("membertype").value;
                if (memberType == "mentor") {
                    document.getElementById("wwcg").style.display = "inline";
                } else {
                    document.getElementById("wwcg").style.display = "none";
                }
            }
        </script>
    </body>
</html>