<?php

    if (file_exists(('../includes/sqlConnection.inc.php'))) {
        require_once('../includes/sqlConnection.inc.php');
        require_once('../model/post.php');
    } else {
        require_once('includes/sqlConnection.inc.php');
        require_once('model/post.php');
    }

    class PostCrud {

        public function create(Post $post) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("INSERT INTO POST (POST_ID, EMAIL, ADDRESS, SUBJECT, DESCRIPTION, TIMESTAMP) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$post->getPostId(), $post->getEmail(), $post->getAddress(), $post->getSubject(), $post->getDescription(), $post->getTimestamp()]);

            } catch (Exception $e) {
                error_log($e->getMessage());
            }
        }

        public function delete(Post $post) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("DELETE FROM POST WHERE POST_ID = ?");
                $stmt->execute([$post->getPostId()]);
            } catch (Exception $e) {
                error_log($e->getMessage());
            }
        }

        public function getAllPostsByEmail($email) {
            try {
                $posts = [];
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("SELECT * FROM POST WHERE EMAIL = ?");
                $stmt->execute([$email]);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($posts, new Post($row["POST_ID"], $row["EMAIL"], $row["ADDRESS"], $row["SUBJECT"], $row["DESCRIPTION"], $row["TIMESTAMP"]));
                }
                return $posts;
            } catch (Exception $e) {
                error_log($e->getMessage());
                return [];
            }
        }

        public function getPostById($post_id) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("SELECT * FROM POST WHERE POST_ID = ?");
                $stmt->execute([$post_id]);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    return new Post($row["POST_ID"], $row["EMAIL"], $row["ADDRESS"], $row["SUBJECT"], $row["DESCRIPTION"], $row["TIMESTAMP"]);
                }
                return null;

            } catch (Exception $e) {
                error_log($e->getMessage());
                return null;
            }
        }
    }
?>