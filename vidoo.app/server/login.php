<?php

declare(strict_types=1);

$pdo = require __DIR__ . '/bootstrap.php';
require __DIR__ . '/helpers.php';

require_post_method();

$email = get_post_string('email');
$password = get_post_string('password');

if ($email === '' || $password === '') {
    redirect_with_status('../login.html', 'missing_fields');
}

$statement = $pdo->prepare('SELECT id, password_hash, role FROM users WHERE email = :email LIMIT 1');
$statement->execute(['email' => $email]);
$user = $statement->fetch();

if (!$user || !password_verify($password, $user['password_hash'])) {
    redirect_with_status('../login.html', 'invalid_credentials');
}

$_SESSION['user_id'] = (int) $user['id'];
$_SESSION['user_role'] = $user['role'];

redirect_with_status('../index.html', 'logged_in');
