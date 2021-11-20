<?php require_once('model/user.php'); ?>
<?php require_once('model/post.php'); ?>
<?php require_once('model/chat.php'); ?>
<?php require_once('includes/functions.inc.php'); ?>
<?php require_once('crud/postCrud.php'); ?>
<?php require_once('crud/chatCrud.php'); ?>
<?php
    $currentUser = getLoggedInUser();
    $postCrud = new PostCrud();
    $chatCrud = new ChatCrud();
    $allChats = [];
    if (!empty($_SESSION[USER_SESSION_KEY])){
        $allPosts = $postCrud->getAllPostsByEmail($currentUser->getEmail());
        if ($currentUser->getMemberType() == "mentor") {
            $allChats = $chatCrud->getChatsByMentor($currentUser->getEmail());
        } else {
            $allChats = $chatCrud->getChatsByMentee($currentUser->getEmail());
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/home.css">
    <title>EduPal</title>
  </head>

  
  <body>
    <?php
     require_once('includes/header.inc.php');
    ?>
    <article>

        <div class="container-fluid">
        <?php if (isset($currentUser)) { ?>
            <br>
            <!-- If logged in, show dashboard -->
            <h1 class="welcome">Dashboard</h1>
            <?php if ($currentUser->getMemberType() == "mentee") { ?>
            <!-- Your posts -->
            <br>
            <div class="row">
                <div class="col-sm-1"></div>
        
                <div class="col-sm-2">
                    <h2 class="your-posts-label">Your Posts</h2>
                </div>
                
                <div class="col-sm-1">
                    <a href="createpost/">
                        <button type="button" class="posts-buttons">Create</button>
                    </a>
                </div>
                <div class="col-sm-6"></div>
        
                <div class="col-sm-1">
                    <a href="posts/">
                        <button type="button" class="posts-buttons see-all-button">See all</button>
                    </a>
                </div>
        
                <div class="col-sm-1"></div>
            </div>
        
            <hr/>
        
            <p style="page-break-after: always;">&nbsp;</p>
            <?php if (count($allPosts) > 0) { ?>
                <table>
                    <?php foreach ($allPosts as $post): ?>
                        <tr onclick="window.location='post/?id=<?php echo $post->getPostId(); ?>'">
                            <td>
                                <b><?php echo $post->getEmail(); ?></b>
                                <p>Subjects: <?php echo $post->getSubject(); ?></p>
                            </td>
                            <td>
                                <p>Area: <?php echo $post->getAddress(); ?></p>
                            </td>
                            <td>
                                <p><?php echo date('d M Y', $post->getTimestamp()); ?></p>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php } else { ?>
                <h2 class="aligncenter">You have no posts. Create one to get help face-to-face from those around your neighbourhood!</h2>
    
            <?php } ?>
            <p style="page-break-before: always;">&nbsp;</p>
            <p style="page-break-after: always;">&nbsp;</p>
            <p style="page-break-before: always;">&nbsp;</p>
            <p style="page-break-after: always;">&nbsp;</p>
            <p style="page-break-before: always;">&nbsp;</p>
        
            <hr/>
            <?php } ?>
            <!-- Your chats -->
            <div class="row">
                <div class="col-sm-1"></div>
        
                <div class="col-sm-2">
                    <h2 class="your-posts-label">Your Chats</h2>
                </div>
                
                <div class="col-sm-1">
                    <!-- <a href="createchats/">
                        <button type="button" class="posts-buttons">Create</button>
                    </a> -->
                </div>
                
                <div class="col-sm-6"></div>
        
                <div class="col-sm-1">
                    <a href="chats/">
                        <button type="button" class="posts-buttons see-all-button">See all</button>
                    </a>
                </div>
        
                <div class="col-sm-1"></div>
            </div>
        
            <hr/>
        
            <p style="page-break-after: always;">&nbsp;</p>
            <?php if (count($allChats) > 0) { ?>
                <table>
                    <?php foreach ($allChats as $chat): ?>
                        <?php
                        $postDetails = $postCrud->getPostById($chat->getPostId());
                        ?>
                        <tr onclick="window.location='chat/?post_id=<?php echo $chat->getPostId(); ?>&mentee_id=<?php echo $chat->getMentee(); ?>&mentor_id=<?php echo $chat->getMentor(); ?>'">
                            <td>
                                <?php if ($currentUser->getMemberType() == "mentor") { ?>
                                    <b>Mentee: <?php echo $chat->getMentee(); ?></b>
                                <?php } else { ?>
                                    <b>Mentor: <?php echo $chat->getMentor(); ?></b>
                                <?php } ?>
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
            <p style="page-break-before: always;">&nbsp;</p>
            <p style="page-break-after: always;">&nbsp;</p>
            <p style="page-break-before: always;">&nbsp;</p>
            <p style="page-break-after: always;">&nbsp;</p>
            <p style="page-break-before: always;">&nbsp;</p>
        
            <hr/>
    
        <?php } else { ?>
            <!-- Main body of Home Page -->
            <br>
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
                    <a href="register/"><button type="button" class="home-page-button button1">Seek help as a Mentee</button></a>
                </div>
    
                
                <div class="col-sm-4">
                    <img class="home-page-image" src="images/2.png" alt="" width="65%" height="65%">
                    </br>
                    <a href="register/"><button type="button" class="home-page-button button2">Volunteer as a Mentor</button></a>
                </div>
                
                <div class="col-sm-1"></div>
            </div>
    
        <?php } ?>
    
        </div>
    </article>

  </body>
</html>