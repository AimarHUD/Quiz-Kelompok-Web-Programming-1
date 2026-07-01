<?php
require_once __DIR__ . '/../config/auth.php';
requireLogin();
header('Location: ' . BASE_URL . '/tabel/index.php');
exit;

