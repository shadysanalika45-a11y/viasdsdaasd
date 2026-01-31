<?php

declare(strict_types=1);

$pdo = require __DIR__ . '/bootstrap.php';
require __DIR__ . '/helpers.php';

require_post_method();

$name = get_post_string('name');
$email = get_post_string('email');
$phone = get_post_string('phone');
$countryId = get_post_string('country_id');
$gender = get_post_string('gender');
$birthdate = get_post_string('birthdate');
$password = get_post_string('password');

if ($name === '' || $email === '' || $password === '') {
    redirect_with_status('../creator/register.php', 'missing_fields');
}

$statement = $pdo->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');
$statement->execute(['email' => $email]);
if ($statement->fetch()) {
    redirect_with_status('../creator/register.php', 'email_exists');
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$insert = $pdo->prepare(
    'INSERT INTO users (role, name, email, phone, country_id, gender, birthdate, password_hash, created_at) '
    . 'VALUES (:role, :name, :email, :phone, :country_id, :gender, :birthdate, :password_hash, :created_at)'
);
$insert->execute([
    'role' => 'creator',
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'country_id' => $countryId,
    'gender' => $gender,
    'birthdate' => $birthdate,
    'password_hash' => $passwordHash,
    'created_at' => (new DateTimeImmutable())->format(DateTimeInterface::ATOM),
]);

$_SESSION['user_id'] = (int) $pdo->lastInsertId();
$_SESSION['user_role'] = 'creator';

redirect_with_status('../index.php', 'registered');
