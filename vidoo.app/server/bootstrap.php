<?php

declare(strict_types=1);

session_start();

$databasePath = __DIR__ . '/../data/vidoo.sqlite';
$databaseDir = dirname($databasePath);

if (!is_dir($databaseDir)) {
    mkdir($databaseDir, 0755, true);
}

$pdo = new PDO('sqlite:' . $databasePath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$pdo->exec(
    'CREATE TABLE IF NOT EXISTS users ('
    . 'id INTEGER PRIMARY KEY AUTOINCREMENT,'
    . 'role TEXT NOT NULL,'
    . 'name TEXT NOT NULL,'
    . 'email TEXT NOT NULL UNIQUE,'
    . 'phone TEXT,'
    . 'country_id TEXT,'
    . 'gender TEXT,'
    . 'birthdate TEXT,'
    . 'password_hash TEXT NOT NULL,'
    . 'created_at TEXT NOT NULL'
    . ')'
);

$pdo->exec(
    'CREATE TABLE IF NOT EXISTS support_requests ('
    . 'id INTEGER PRIMARY KEY AUTOINCREMENT,'
    . 'name TEXT,'
    . 'url TEXT,'
    . 'email TEXT NOT NULL,'
    . 'phone TEXT,'
    . 'message TEXT,'
    . 'created_at TEXT NOT NULL'
    . ')'
);

$pdo->exec(
    'CREATE TABLE IF NOT EXISTS password_resets ('
    . 'id INTEGER PRIMARY KEY AUTOINCREMENT,'
    . 'email TEXT NOT NULL,'
    . 'token TEXT NOT NULL,'
    . 'created_at TEXT NOT NULL'
    . ')'
);

return $pdo;
