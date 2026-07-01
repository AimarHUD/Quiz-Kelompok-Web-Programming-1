<?php
require_once __DIR__ . '/session.php';
require_once __DIR__ . '/database.php';

/**
 * Check whether the current user is logged in.
 */
function isLoggedIn(): bool
{
    return isset($_SESSION['user_id']);
}

/**
 * Get the current logged-in user data from the session.
 */
function currentUser(): ?array
{
    if (!isLoggedIn()) {
        return null;
    }

    return [
        'id_user' => $_SESSION['user_id'],
        'nama' => $_SESSION['nama'],
        'username' => $_SESSION['username'],
        'email' => $_SESSION['email'],
        'role' => $_SESSION['role'],
    ];
}

/**
 * Store a flash message for the next request.
 */
function setFlash(string $type, string $message): void
{
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message,
    ];
}

/**
 * Retrieve and consume a flash message.
 */
function getFlash(): ?array
{
    if (!isset($_SESSION['flash'])) {
        return null;
    }

    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

/**
 * Redirect unauthenticated users to the login page.
 */
function requireLogin(): void
{
    if (!isLoggedIn()) {
        setFlash('danger', 'Please log in to continue.');
        header('Location: ' . BASE_URL . '/login/login.php');
        exit;
    }
}

/**
 * Restrict access to users with one of the allowed roles.
 */
function requireRole(array $roles): void
{
    requireLogin();

    if (!in_array($_SESSION['role'] ?? '', $roles, true)) {
        setFlash('warning', 'You do not have permission to access this page.');
        header('Location: ' . BASE_URL . '/dashboard/index.php');
        exit;
    }
}
