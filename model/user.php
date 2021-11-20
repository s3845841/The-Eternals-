<?php

class User {
    private String $email;
    private String $name;
    private String $member_type;
    private String $password;
    private String $working_with_children;

    public function __construct(String $email, String $name, String $member_type, String $password, String $working_with_children) {
        $this->email = $email;
        $this->name = $name;
        $this->member_type = $member_type;
        $this->password = $password;
        $this->working_with_children = $working_with_children;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(String $name) {
        $this->name = $name;
    }

    public function getMemberType() {
        return $this->member_type;
    }

    public function setMemberType(String $member_type) {
        $this->member_type = $member_type;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword(String $password) {
        $this->password = $password;
    }

    public function getWorkingWithChildren() {
        return $this->working_with_children;
    }

    public function setWorkingWithChildren(String $working_with_children) {
        $this->working_with_children = $working_with_children;
    }
}

?>