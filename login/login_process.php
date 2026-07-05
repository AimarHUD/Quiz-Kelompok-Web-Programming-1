<?php
require_once __DIR__ . '/../config/session.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/login/login.php');
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    setFlash('danger', 'Username and password are required.');
    redirect('/login/login.php');
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
$stmt->execute(['username' => $username]);
$user = $stmt->fetch();
// Debug logging: ensure storage dir exists and append login attempt info
$storageDir = __DIR__ . '/../storage';
if (!is_dir($storageDir)) {
    @mkdir($storageDir, 0755, true);
}

$loginLog = $storageDir . '/login_debug.log';
$foundUser = $user ? 'yes' : 'no';
$hashPreview = $user ? substr($user['password'], 0, 10) : '';
$verified = $user ? (password_verify($password, $user['password']) ? 'yes' : 'no') : 'no';
file_put_contents($loginLog, date('[Y-m-d H:i:s]') . " username={$username} found={$foundUser} verified={$verified} hash={$hashPreview}\n", FILE_APPEND | LOCK_EX);

if ($user && password_verify($password, $user['password'])) {
    session_regenerate_id(true);
    $_SESSION['user_id'] = $user['id_user'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];

    redirect('/dashboard/index.php');
}

setFlash('danger', 'Invalid username or password.');
redirect('/login/login.php');
