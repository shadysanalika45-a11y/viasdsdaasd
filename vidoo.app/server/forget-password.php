<?php

declare(strict_types=1);

$pdo = require __DIR__ . '/bootstrap.php';
require __DIR__ . '/helpers.php';

require_post_method();

$email = get_post_string('email');

if ($email === '') {
    redirect_with_status('../forget-password.html', 'missing_email');
}

$token = generate_token();

$insert = $pdo->prepare(
    'INSERT INTO password_resets (email, token, created_at) VALUES (:email, :token, :created_at)'
);
$insert->execute([
    'email' => $email,
    'token' => $token,
    'created_at' => (new DateTimeImmutable())->format(DateTimeInterface::ATOM),
]);

redirect_with_status('../login.html', 'reset_requested');
