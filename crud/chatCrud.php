<?php

    if (file_exists(('../includes/sqlConnection.inc.php'))) {
        require_once('../includes/sqlConnection.inc.php');
        require_once('../model/chat.php');
    } else {
        require_once('includes/sqlConnection.inc.php');
        require_once('model/chat.php');
    }

    class ChatCrud {
        public function create(Chat $chat) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("INSERT INTO CHAT (CHAT_ID, POST_ID, MENTOR, MENTEE, TEXT, TIMESTAMP) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$chat->getChatId(), $chat->getPostId(), $chat->getMentor(), $chat->getMentee(), $chat->getText(), $chat->getTimestamp()]);

            } catch (Exception $e) {
                error_log($e->getMessage());
            }
        }

        public function delete(Chat $chat) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("DELETE FROM CHAT WHERE CHAT_ID = ?");
                $stmt->execute([$chat->getChatId()]);
            } catch (Exception $e) {
                error_log($e->getMessage());
            }
        }

        public function getChatsByMentor($mentor) {
            try {
                $chats = [];
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("SELECT * FROM CHAT WHERE MENTOR = ?");
                $stmt->execute([$mentor]);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($chats, new Chat($row["CHAT_ID"], $row["POST_ID"], $row["MENTOR"], $row["MENTEE"], $row["TEXT"], $row["TIMESTAMP"]));
                }
                return $chats;
            } catch (Exception $e) {
                error_log($e->getMessage());
                return [];
            }
        }

        public function getChatsByMentee($mentee) {
            try {
                $chats = [];
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("SELECT * FROM CHAT WHERE MENTEE = ?");
                $stmt->execute([$mentee]);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($chats, new Chat($row["CHAT_ID"], $row["POST_ID"], $row["MENTOR"], $row["MENTEE"], $row["TEXT"], $row["TIMESTAMP"]));
                }
                return $chats;
            } catch (Exception $e) {
                error_log($e->getMessage());
                return [];
            }
        }

        public function getChatById($chat_id) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("SELECT * FROM CHAT WHERE CHAT_ID = ?");
                $stmt->execute([$chat_id]);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    return new Chat($row["CHAT_ID"], $row["POST_ID"], $row["MENTOR"], $row["MENTEE"], $row["TEXT"], $row["TIMESTAMP"]);
                }
                return null;

            } catch (Exception $e) {
                error_log($e->getMessage());
                return null;
            }
        }
    }
?>