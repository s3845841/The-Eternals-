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
        $chatCrud = new ChatCrud();
        $url = $_SERVER['REQUEST_URI'];
        $url_components = parse_url($url);
        parse_str($url_components['query'], $params);
        $mentee = $userCrud->getUserByEmail($params['mentee_id']);
        $menteeName = $mentee->getName();
        $mentor = $userCrud->getUserByEmail($params['mentor_id']);
        $chats = $chatCrud->getChatsByMenteeMentorPostId($params['mentee_id'], $params['mentor_id'], $params['post_id']);
        $currentUser = getLoggedInUser();

    }
    if (isset($_POST['post'])) {
        $chatCrud = new ChatCrud();
        $randomNumber = rand();
        $chatMessage = new Chat($randomNumber, $params['post_id'], $mentor->getEmail(), $mentee->getEmail(), $_POST['text'], $date->getTimestamp(), $_SESSION[USER_SESSION_KEY]->getEmail());
        $chatCrud->create($chatMessage);
        header('Refresh:0');
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
  <!-- Main body of Mentor chat -->
  <div class="container-fluid">
        <h1 class="welcome">Chat</h1>

        <div class="row">
            <div class="col-sm-1"></div>
            <?php if ($currentUser->getMemberType() == "mentee") { ?>
            <div class="col-sm-2">
                <h2 class="your-posts-label">Mentor (<?php echo $mentor->getEmail()?>)</h2>
            </div>

            <div class="col-sm-7"></div>

            <div class="col-sm-2">
                <h2 class="your-posts-label">Mentee(You) (<?php echo $mentee->getEmail()?>)</h2>
            </div>
            <?php } else { ?>
            <div class="col-sm-2">
                <h2 class="your-posts-label">Mentee (<?php echo $mentee->getEmail()?>)</h2>
            </div>

            <div class="col-sm-7"></div>

            <div class="col-sm-1">
                <h2 class="your-posts-label">You(Mentor) (<?php echo $mentor->getEmail()?>)</h2>
            </div>
            <?php } ?>
            <div class="col-sm-1"></div>
        </div>

        <hr/>
    <div class="aligncenter">
        <div class="chat-messages">
            <!-- Holder side - notice the class -->
            <?php foreach ($chats as $chat): ?>
                <?php if ($chat->getRecipient() == $currentUser->getEmail()){ ?>
                    <div class="message-box-holder">
                        <div class="message-box">
                            <?php echo $chat->getText()?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="message-box-receiver">
                        <div class="message-box">
                            <?php echo $chat->getText()?>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
        </div>

    </div>

        <p style="page-break-after: always;">&nbsp;</p>
        <p style="page-break-before: always;">&nbsp;</p>
        <p style="page-break-after: always;">&nbsp;</p>
        <p style="page-break-before: always;">&nbsp;</p>
        <p style="page-break-after: always;">&nbsp;</p>
        <p style="page-break-before: always;">&nbsp;</p>

        <hr/>

        <form method="post" id="form" class="form-container">
            <div class="row">
                <div class="col-sm-10">
                    <div class="send-message">
                        <textarea class="chat-input" id="text" name="text"></textarea>
                    </div>
                </div>

                <div class="col-sm-1">
                    <button id="post" name="post" type="submit" class="posts-buttons see-all-button">Post</button>
                </div>

                <div class="col-sm-1"></div>
            </div>
        </form>
    </div>
  <br/>
</body>
</html>