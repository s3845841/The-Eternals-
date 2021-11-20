<?php require_once('../crud/userCrud.php'); ?>
<?php require_once('../crud/postCrud.php'); ?>
<?php require_once('../model/user.php'); ?>
<?php require_once('../includes/functions.inc.php'); ?>
<?php
    $name = $email = "";
    if (empty($_SESSION[USER_SESSION_KEY])){
       header('Location: ../');
    } else {
        $userCrud = new UserCrud();
        $postCrud = new PostCrud();
        $postId = $_GET['id'];
        $post = $postCrud->getPostById($postId);
        $mentee = $userCrud->getUserByEmail($post->getEmail());
        $name = $address = $subject = $description = "";
        print_r($mentee);
//         $name = $mentee->getName();
        $address = $post->getAddress();
        $subject = $post->getSubject();
        $description = $post->getDescription();

        $chat_id = rand();
        $contactLink = "../chat/?chat_id=".strval($chat_id)."&post_id=".$postId."&mentee_id=".$mentee->getEmail()."&mentor_id=".$_SESSION[USER_SESSION_KEY]->getEmail();
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
    <h1 style="text-align: center;">Post Information</h1>
    <hr />
    <h4>Name: <?php echo $name?></h4>
    <br/>
    <h4>Address: <?php echo $chat_id?></h4>
    <br/>
    <h4>Subject: <?php echo $subject?></h4>
    <br/>
    <h4>Question/Description: <?php echo $description?></h4>
    <br/>
    <a class="btn btn-primary btn-lg" href="<?php echo $contactLink?>" role="button"> Contact this mentee!</a>
  </div>
</body>
</html>