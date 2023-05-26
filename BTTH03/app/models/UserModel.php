<?php
// app/Models/UserModel.php

class UserModel {
    public function getAllUsers() {
        // Logic truy vấn cơ sở dữ liệu và trả về danh sách người dùng
        return array(
            (object) array('name' => 'User 1'),
            (object) array('name' => 'User 2'),
            (object) array('name' => 'User 3')
        );
    }
}