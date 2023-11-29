<?php

$host = 'localhost';
$dbName = 'dbmatchs';
$userName = 'root';
$userPass = '0n1r0k0u-v1';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $userName, $userPass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (\PDOException $th) {
    $th->getMessage();
}
