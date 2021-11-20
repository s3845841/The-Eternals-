<?php

    if (file_exists(('../includes/sqlConnection.inc.php'))) {
        require_once('../includes/sqlConnection.inc.php');
        require_once('../model/user.php');
    } else {
        require_once('includes/sqlConnection.inc.php');
        require_once('model/user.php');
    }

    class UserCrud {

        public function create(User $user) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("INSERT INTO USER (EMAIL, NAME, MEMBER_TYPE, PASSWORD, WORKING_WITH_CHILDREN) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$user->getEmail(), $user->getName(), $user->getMemberType(), $user->getPassword(), $user->getWorkingWithChildren()]);

            } catch (Exception $e) {
                error_log($e->getMessage());
            }
        }

        public function update(User $user) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("UPDATE USER SET NAME = ? AND PASSWORD = ? AND WORKING_WITH_CHILDREN = ? WHERE EMAIL = ?");
                $stmt->execute([$user->getName(), $user->getPassword(), $user->getWorkingWithChildren(), $user->getEmail()]);
            } catch (Exception $e) {
                error_log($e->getMessage());
            }
        }

        public function delete(User $user) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("DELETE FROM USER WHERE EMAIL = ?");
                $stmt->execute([$user->getEmail()]);
            } catch (Exception $e) {
                error_log($e->getMessage());
            }
        }

        public function isLogin($email, $password) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("SELECT * FROM USER WHERE EMAIL = ? AND PASSWORD = ?");
                $stmt->execute([$email, $password]);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    return new User($row["EMAIL"], $row["NAME"], $row["MEMBER_TYPE"], $row["PASSWORD"], $row["WORKING_WITH_CHILDREN"]);
                }
                return null;

            } catch (Exception $e) {
                error_log($e->getMessage());
                return null;
            }
        }

        public function emailExists($email) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("SELECT * FROM USER WHERE EMAIL = ?");
                $stmt->execute([$email]);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    return true;
                }
                return false;

            } catch (Exception $e) {
                error_log($e->getMessage());
                return false;
            }
        }

         public function getUserByEmail($email) {
            try {
                $pdo = (new SQLConnection())->connect();
                $stmt = $pdo->prepare("SELECT * FROM USER WHERE EMAIL = ?");
                $stmt->execute([$email]);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    return new User($row["EMAIL"], $row["NAME"], $row["MEMBER_TYPE"], $row["PASSWORD"], $row["WORKING_WITH_CHILDREN"]);
                }
                return null;

            } catch (Exception $e) {
                error_log($e->getMessage());
                return null;
            }
        }
    }
?>