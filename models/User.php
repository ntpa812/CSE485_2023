<?php
// models/User.php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function findUserByUsername($username) {
        $sql = "SELECT * FROM Users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updatePassword($userId, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE Users SET password = ? WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('si', $hashedPassword, $userId);
        return $stmt->execute();
    }
}
?>
