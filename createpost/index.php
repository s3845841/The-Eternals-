<?php require_once('../crud/postCrud.php'); ?>
<?php require_once('../model/user.php'); ?>
<?php require_once('../includes/functions.inc.php'); ?>
<?php
    $name = $email = "";
    if (empty($_SESSION[USER_SESSION_KEY])){
        header('Location: ../');
    } else {
        $name = $_SESSION[USER_SESSION_KEY]->getName();
        $email = $_SESSION[USER_SESSION_KEY]->getEmail();
    }

    $date = new DateTime();

    if (isset($_POST['post'])) {
        $postCrud = new PostCrud();
        $randomNumber = rand();
        $post = new Post($randomNumber, $email, $_POST['address'], $_POST['subject'], $_POST['description'], $date->getTimestamp());
        $postCrud->create($post);
        header('Location: ../');
        exit();
    }
?>
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
  <br/>
  <div class = "text-center">
    <h1>Create a Post</h1>
    <p><span class="error">* required field</span></p>
    <form method="post"  method="post">
      Name: <?php echo $name;?>
      <br><br>
      <div class="noselect">
        <label for="address">Address</label>
      </div>
      <input type="text" id="address" name="address" required>
      <br><br>
      <div class="noselect">
          <label for="subject">Subject<span class="error">*</span></label>
      </div>
      <input type="text" id="subject" name="subject" required>
      <br><br>
      <div class="noselect">
        <label for="description">Description<span class="error">*</span></label>
      </div>
      <textarea rows="5" cols="40" id="description" name="description" required></textarea>
      <br><br>
      <input id="post" name="post" type="submit" value="Post">
    </form>
  </div>
</body>
</html>