<?php require_once('../model/user.php'); ?>
<?php require_once('../model/post.php'); ?>
<?php require_once('../model/chat.php'); ?>
<?php require_once('../includes/functions.inc.php'); ?>
<?php require_once('../crud/chatCrud.php'); ?>
<?php require_once('../crud/postCrud.php'); ?>
<?php
    $currentUser = getLoggedInUser();
    $postCrud = new PostCrud();
    $chatCrud = new ChatCrud();
    $allChats = $chatCrud->getChatsByMentor($currentUser->getEmail());
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chats</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../styles/header.css">
        <link rel="stylesheet" type="text/css" href="../styles/chats.css"> 
    </head>
    <body>
    <?php require_once('../includes/header.inc.php'); ?>
    <br>
    <article>
        <h1 class="aligncenter">Chats</h1>
        <br>
        <?php if (count($allChats) > 0) { ?>
                <table>
                    <?php foreach ($allChats as $chat): ?>
                        <?php
                        $postDetails = $postCrud->getPostById($chat->getPostId());
                        ?>
                        <tr onclick="window.location='../chat/?chat_id=<?php echo $chat->getChatId(); ?>&post_id=<?php echo $chat->getPostId(); ?>&mentee_id=<?php echo $chat->getMentee(); ?>&mentor_id=<?php echo $chat->getMentor(); ?>'">
                            <td>
                                <b>Mentee: <?php echo $chat->getMentee(); ?></b>
                                <p>Subjects: <?php echo $postDetails->getSubject(); ?></p>
                            </td>
                            <td>
                            <?php if ($postDetails->getAddress() != null) { ?>
                                <p>Area: <?php echo $postDetails->getAddress(); ?></p>
                            <?php } ?>
                            </td>
                            <td>
                                <p><?php echo date('d M Y', $chat->getTimestamp()); ?></p>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php } else { ?>
                <h2 class="aligncenter">You have no chat.</h2>
    
            <?php } ?>
    </article>
    </body>
</html>