<?php require_once('../crud/userCrud.php'); ?>
<?php require_once('../crud/chatCrud.php'); ?>
<?php require_once('../model/user.php'); ?>
<?php require_once('../includes/functions.inc.php'); ?>
<?php
    $name = $email = "";
    if (empty($_SESSION[USER_SESSION_KEY])){
       header('Location: ../');
    } else {
        $date = new DateTime();
        $userCrud = new UserCrud();
        $url = $_SERVER['REQUEST_URI'];
        $url_components = parse_url($url);
        parse_str($url_components['query'], $params);
        $mentee = $userCrud->getUserByEmail($params['mentee_id']);
        $menteeName = $mentee->getName();
        $mentor = $userCrud->getUserByEmail($params['mentor_id']);
    }
    if (isset($_POST['post'])) {
        $chatCrud = new ChatCrud();
        $randomNumber = rand();
        $chatMessage = new Chat($randomNumber, $params['post_id'], $mentor->getEmail(), $mentee->getEmail(), $_POST['text'], $date->getTimestamp());
        $chatCrud->create($chatMessage);
        header('Refresh:0');
        exit();
    }
/**

get all chats
list based off timestamp
auto scrolled to the end

based on current user - they go to the right

*/
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
    <h1 style="text-align: center;"><?php echo $menteeName?> </h1>
    <hr />
    <h4>Name: <?php echo $menteeName?></h4>
    <br/>
    <h4>Address: <?php echo $params['chat_id']?></h4>
    <br/>
    <h4>Subject: <?php echo $params['post_id']?></h4>
    <br/>
    <br/>
    <hr/>
      <form id="form" method="post">
         <div class="noselect">
           <label for="text"> </label>
         </div>
         <textarea rows="1" cols="90" id="text" name="text" required></textarea>
         <br><br>
         <input id="post" name="post" type="submit" value="Send">
      </form>
  </div>

</body>
</html>