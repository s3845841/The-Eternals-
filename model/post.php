<?php
    
    class Post {
        private int $post_id;
        private String $email;
        private String $address;
        private String $subject;
        private String $description;
        private int $timestamp;

        public function __construct(int $post_id, String $email, String $address, String $subject, String $description, int $timestamp) {
            $this->post_id = $post_id;
            $this->email = $email;
            $this->address = $address;
            $this->subject = $subject;
            $this->description = $description;
            $this->timestamp = $timestamp;
        }

        public function getPostId() {
            return $this->post_id;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getAddress() {
            return $this->address;
        }

        public function setAddress(String $address) {
            $this->address = $address;
        }

        public function getSubject() {
            return $this->subject;
        }

        public function setSubject(String $subject) {
            $this->subject = $subject;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setDescription(String $description) {
            $this->description = $description;
        }

        public function getTimestamp() {
            return $this->timestamp;
        }

        public function setTimestamp(String $timestamp) {
            $this->timestamp = $timestamp;
        }
    }

?>