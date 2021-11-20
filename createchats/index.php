<?php require_once('../crud/chatCrud.php'); ?>
<?php require_once('../model/user.php'); ?>
<?php require_once('../includes/functions.inc.php'); ?>
<?php
    $name = $post_id = "";
    if (empty($_SESSION[USER_SESSION_KEY])){
        header('Location: ../');
    } else {
        $currentUser = getLoggedInUser();
        $name = $_SESSION[USER_SESSION_KEY]->getName();
        $email = $_SESSION[USER_SESSION_KEY]->getEmail();
    }

    $date = new DateTime();

    if (isset($_POST['chat'])) {
        $chatCrud = new ChatCrud();
        $randomNumber = rand();
        $chat = new Chat($randomNumber, $post_id, $_POST['address'], $_POST['subject'], $_POST['description'], $date->getTimestamp(), $currentUser->getEmail());
        $postCrud->create($post);
        header('Location: ../');
        exit();
    }
?>

<!DOCTYPE HTML>
<html>
  <head>
      <title>Start a Chat</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../styles/header.css">
      <link rel="stylesheet" href="../styles/createPostsChats.css">
      <style>
      .error {color: #FF0000;}
      </style>
  </head>
<body>
  <?php  require_once('../includes/header.inc.php'); ?>
  <?php
    // define variables and set to empty values
    $post_idErr = $mentorErr = $menteeErr = $subjectErr = $textErr =  "";
    $post_id = $mentor = $mentee = $subject = $text = $timestamp = "";

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

      if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";
      } else {
        $description = test_input($_POST["description"]);
      }

      $timestamp = date("F j, Y, g:i a");
      $mentee = "test@gmail.com";
      // $mentee = $_SESSION[USER_SESSION_KEY]->getEmail();
      // $mentor = ???

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
    <h1>Starting a Chat</h2>
    <h4><span class="error">* required field</span></h4>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Name:
      <br><br>
      Subject: <input type="text" name="subject" value="<?php echo $subject;?>">
      <span class="error">* <?php echo $subjectErr;?></span>
      <br><br>
      Description/Question: <textarea name="text" rows="5" cols="40"> <?php echo $text;?></textarea><span class="error"> *</span>
      <br><br>
      <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    echo "<h2>Input:</h2>";
    echo $post_id;
    echo "<br>";
    echo $mentee;
    echo "<br>";
    echo $mentor;
    echo "<br>";
    echo $subject;
    echo "<br>";
    echo $text;
    echo "<br>";
    echo $timestamp;
    ?>
  </div>
</body>
</html>