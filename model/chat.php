<?php

    class Chat {
        private int $chat_id;
        private int $post_id;
        private String $mentor;
        private String $mentee;
        private String $text;
        private int $timestamp;

        public function __construct(int $chat_id, int $post_id, String $mentor, String $mentee, String $text, int $timestamp, String $recipient) {
            $this->chat_id = $chat_id;
            $this->post_id = $post_id;
            $this->mentor = $mentor;
            $this->mentee = $mentee;
            $this->text = $text;
            $this->timestamp = $timestamp;
            $this->recipient = $recipient;
        }

        public function getChatId() {
            return $this->chat_id;
        }

        public function getPostId() {
            return $this->post_id;
        }

        public function getMentor() {
            return $this->mentor;
        }

        public function setMentor(String $mentor) {
            $this->mentor = $mentor;
        }

        public function getMentee() {
            return $this->mentee;
        }

        public function setMentee(String $mentee) {
            $this->mentee = $mentee;
        }

        public function getText() {
            return $this->text;
        }

        public function setText(String $text) {
            $this->text = $text;
        }

        public function getTimestamp() {
            return $this->timestamp;
        }

        public function setTimestamp(String $timestamp) {
            $this->timestamp = $timestamp;
        }

       public function getRecipient() {
             return $this->recipient;
       }

       public function setRecipient(String $recipient) {
            $this->recipient = $recipient;
       }
}
?>