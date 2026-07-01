<?php
require_once __DIR__ . '/../config/auth.php';
requireLogin();
header('Location: ' . BASE_URL . '/profile/index.php');
exit;
