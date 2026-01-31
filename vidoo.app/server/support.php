<?php

declare(strict_types=1);

$pdo = require __DIR__ . '/bootstrap.php';
require __DIR__ . '/helpers.php';

require_post_method();

$name = get_post_string('name');
$url = get_post_string('url');
$email = get_post_string('email');
$phone = get_post_string('phone');
$message = get_post_string('message');

if ($email === '') {
    redirect_with_status('../contact-us.html', 'missing_email');
}

$insert = $pdo->prepare(
    'INSERT INTO support_requests (name, url, email, phone, message, created_at) '
    . 'VALUES (:name, :url, :email, :phone, :message, :created_at)'
);
$insert->execute([
    'name' => $name,
    'url' => $url,
    'email' => $email,
    'phone' => $phone,
    'message' => $message,
    'created_at' => (new DateTimeImmutable())->format(DateTimeInterface::ATOM),
]);

$referer = $_SERVER['HTTP_REFERER'] ?? '';
if ($referer !== '') {
    redirect_with_status($referer, 'sent');
}

redirect_with_status('../contact-us.html', 'sent');
