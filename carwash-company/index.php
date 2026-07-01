<?php
require_once __DIR__ . '/config/session.php';

if (isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . '/dashboard/index.php');
    exit;
}

header('Location: ' . BASE_URL . '/login/login.php');
exit;
