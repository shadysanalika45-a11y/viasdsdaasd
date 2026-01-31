<?php

declare(strict_types=1);

function get_post_string(string $key): string
{
    $value = $_POST[$key] ?? '';
    if (is_array($value)) {
        return '';
    }

    return trim((string) $value);
}

function require_post_method(): void
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo 'Method Not Allowed';
        exit;
    }
}

function redirect_to(string $location): void
{
    header('Location: ' . $location);
    exit;
}

function redirect_with_status(string $location, string $status): void
{
    $separator = str_contains($location, '?') ? '&' : '?';
    redirect_to($location . $separator . 'status=' . urlencode($status));
}

function generate_token(int $length = 32): string
{
    return bin2hex(random_bytes($length));
}
