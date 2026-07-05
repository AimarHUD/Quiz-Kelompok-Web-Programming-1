<?php
/**
 * Start the PHP session with hardened cookie settings.
 */
if (session_status() === PHP_SESSION_NONE) {
    session_name('carwash_session');
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => $cookieParams['path'],
        'domain' => $cookieParams['domain'],
        'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

define('BASE_URL', '/carwash-company');
