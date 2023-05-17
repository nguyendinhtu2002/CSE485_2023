<?php
    Class Student  {
        // khai bao cac bien thuoc tinh cua sinh vien
        private $id;
        private $name ;
        private $birthday ;
        private $email;
        private $courses;
        private $contactInfo ;
        // khai bao 1 construct 
    public function __construct($id,$name,$birthday,$email,$courses,$contactInfo){
        
        $this->id = $id;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->email = $email;
        $this->contactInfo = $contactInfo;
        $this->courses = $courses;
    }
    // khai bao ham set/ get
    public function setid($id){
        $this->id = $id;
    }
    public function getid(){
        return $this->id;
    }
    public function setname($name){
        $this->name = $name;
    }
    public function getname(){
        return $this->name;
    }
    public function setbirthday($birthday){
        $this->birthday = $birthday;
    }
    public function getbirthday(){
        return $this->birthday;
    }
    public function setemail($email){
        $this->email  = $email ;
    }
    public function getemail (){
        return $this->email ;
    }
    public function setcontactInfo($contactInfo){
        $this->contactInfo = $contactInfo;
    }
    public function getcontactInfo(){
        return $this->contactInfo;
    }
    public function setcourses($courses){
        $this->courses = $courses;
    }
    public function getcourses(){
        return $this->courses;
    }
}