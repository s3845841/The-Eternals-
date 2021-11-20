<!DOCTYPE HTML>
<html>
  <head>
      <title>Creating Posts</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../styles/header.css">
      <link rel="stylesheet" href="../styles/createPostsChats.css">      <style>
      .error {color: #FF0000;}
      </style>
  </head>
<body>
  <?php  require_once('../includes/header.inc.php'); ?>
  <?php
    // define variables and set to empty values
    $nameErr = $emailErr = $addressErr = $subjectErr = $textErr =  "";
    $name = $email = $address = $subject = $text = $timestamp = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["address"])) {
        $addressErr = "Address is required";
      } else {
        $address = test_input($_POST["address"]);
        // check if address is well-formed
        if (!preg_match("/^[a-zA-Z-' ]*$/",$address)) {
          $addressErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required";
      } else {
        $subject = test_input($_POST["subject"]);
        // check if subject is well-formed
        if (!preg_match("/^[a-zA-Z-' ]*$/",$subject)) {
          $subjectErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["text"])) {
        $textErr = "Description is required";
      } else {
        $text = test_input($_POST["text"]);
      }

      $timestamp = date("F j, Y, g:i a");
      $email = "test@gmail.com";
      // $email = $_SESSION[USER_SESSION_KEY]->getEmail();

    }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <br/>
  <div class = "text-center">
    <h1>Create a Post</h1>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Name: <input type="text" name="name" value="<?php echo $name;?>">
      <span class="error">* <?php echo $nameErr;?></span>
      <br><br>
      Address: <input type="text" name="address" value="<?php echo $address;?>">
      <span class="error">* <?php echo $addressErr;?></span>
      <br><br>
      Description/Question: <textarea name="text" rows="5" cols="40"> <?php echo $text;?></textarea><span class="error"> *</span>
      <br><br>
      <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    echo "<br>";
    echo "<h2>Input Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $address;
    echo "<br>";
    echo $text;
    echo "<br>";
    echo $timestamp;
    ?>
  </div>
</body>
</html>