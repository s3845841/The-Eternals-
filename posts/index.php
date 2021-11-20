<?php require_once('../model/user.php'); ?>
<?php require_once('../model/post.php'); ?>
<?php require_once('../includes/functions.inc.php'); ?>
<?php require_once('../crud/postCrud.php'); ?>

<?php

    if (empty($_SESSION[USER_SESSION_KEY])){
        header('Location: ../');
    } else {
        $currentUser = getLoggedInUser();
        $postCrud = new PostCrud();
        $allPosts = $postCrud->getAllPostsByEmail($currentUser->getEmail());
        if ($currentUser->getMemberType() == "mentor") {
            $allPosts = $postCrud->getAllPosts();
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Posts</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
        <link rel="icon" href="../images/logo.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../styles/header.css">
        <link rel="stylesheet" type="text/css" href="../styles/posts.css"> 
    </head>
    <body>
    <?php require_once('../includes/header.inc.php'); ?>
    <br>
    <article>
        <h1 class="welcome">Posts</h1>
        <br>
        <?php if (count($allPosts) > 0) { ?>
            <table>
                <?php foreach ($allPosts as $post): ?>
                    <tr onclick="window.location='../post/?id=<?php echo $post->getPostId(); ?>'">
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

        <?php if ($currentUser->getMemberType() == "mentee") { ?>
            <br>
            <div class="aligncenter">
                <a class="aligncenter" href="../createpost/">
                <button  id="create" type="button">CREATE</button>
                </a>
            </div>
        <?php } ?>

    </article>
    </body>
</html>