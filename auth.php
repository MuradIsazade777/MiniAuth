<?php
require 'db.php'; 
require 'jwt.php';
$config = require 'config.php';

function register($username, $password) {
    global $db;
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    return $stmt->execute([$username, $hash]);
}

function login($username, $password) {
    global $db, $config;
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        return generate_jwt(['username' => $username], $config['jwt_secret'], $config['token_expiry']);
    }
    return false;
}
