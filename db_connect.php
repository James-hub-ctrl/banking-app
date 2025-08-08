<?php
$host = 'localhost';
$dbname = 'db_bank';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOexception $e) {
    die('error could not connect to database.' . $e->getmessage());
}

?>
