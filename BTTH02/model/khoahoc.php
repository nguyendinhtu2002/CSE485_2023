<?php
    Class Course{
        private $id_KH;
        private $title;
        private $description;
        public function __construct($id_KH,$title,$description){
            $this->id_KH = $id_KH;
            $this->title = $title;
            $this->description = $description;
        }
        public function setId_Kh($id_KH) {
            $this->id_KH = $id_KH;
        }
        public function getId_Kh(){
            return $this->id_KH;
        }
        public function setTitle($title){
            $this->title = $title;
        }
        public function getTitle(){
            return $this->title;
        }
        public function setDescription($description){
            $this->description = $description;
        }
        public function getDescription(){
            return $this->description;
        }
    }
