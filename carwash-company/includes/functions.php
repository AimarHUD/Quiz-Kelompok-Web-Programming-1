<?php
require_once __DIR__ . '/../config/auth.php';

/**
 * Escape a value for safe output in HTML.
 */
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/**
 * Redirect the user to a path inside the application.
 */
function redirect(string $path): void
{
    header('Location: ' . BASE_URL . $path);
    exit;
}

/**
 * Format a database date string into a readable output.
 */
function formatDate(string $date): string
{
    return date('d M Y, H:i', strtotime($date));
}

/**
 * Convert a title string to a friendly URL slug.
 */
function slugify(string $text): string
{
    $text = preg_replace('/[^\pL\pN]+/u', '-', $text);
    $text = trim($text, '-');
    $text = strtolower($text);
    return $text ?: 'berita';
}

/**
 * Validate whether an uploaded file is an accepted image type.
 */
function isImageFile(array $file): bool
{
    return isset($file['tmp_name']) && $file['tmp_name'] !== '' && in_array(strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'gif'], true);
}

function getUserProfilePhoto(int $userId, ?string $storedPhoto = null): string
{
    $uploadDir = __DIR__ . '/../assets/uploads/profiles';
    if ($storedPhoto) {
        $storedPath = $uploadDir . '/' . $storedPhoto;
        if (file_exists($storedPath)) {
            return BASE_URL . '/assets/uploads/profiles/' . $storedPhoto;
        }
    }

    $files = glob($uploadDir . '/user_' . $userId . '_*');
    if ($files && isset($files[0])) {
        return BASE_URL . '/assets/uploads/profiles/' . basename($files[0]);
    }

    return '';
}

/**
 * Render a Bootstrap breadcrumb based on the current route.
 */
function renderBreadcrumb(): string
{
    $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
    if ($path === '') {
        return '';
    }

    $items = [['label' => 'Home', 'url' => BASE_URL . '/index.php']];
    $segments = array_filter(explode('/', $path), 'strlen');
    $current = '';

    foreach ($segments as $segment) {
        $current .= '/' . $segment;
        $label = str_replace(['-', '_'], ' ', $segment);
        $label = ucwords($label);
        $items[] = ['label' => $label, 'url' => BASE_URL . $current];
    }

    $html = '<nav aria-label="breadcrumb" class="mb-3"><ol class="breadcrumb">';
    foreach ($items as $index => $item) {
        $active = $index === count($items) - 1 ? 'active' : '';
        $html .= '<li class="breadcrumb-item ' . $active . '">';
        if ($active !== '') {
            $html .= '<span>' . e($item['label']) . '</span>';
        } else {
            $html .= '<a href="' . e($item['url']) . '">' . e($item['label']) . '</a>';
        }
        $html .= '</li>';
    }
    $html .= '</ol></nav>';

    return $html;
}
