<?php
require 'config/database.php';
$stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
$stmt->execute(['username' => 'admin']);
$user = $stmt->fetch();
var_dump($user['username']);
var_dump($user['password']);
var_dump(password_verify('admin123', $user['password']));
