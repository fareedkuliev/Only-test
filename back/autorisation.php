<?php
session_start();

$connection = mysqli_connect('127.0.0.1', 'root', '', 'only_test');

$emailOrPhone = $_POST['emailOrPhone'];
$password = $_POST['password'];
$hashPassword = md5($password);

$user = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `users` WHERE `email`='$emailOrPhone' OR `phone`='$emailOrPhone' LIMIT 1"));

$isEmailOrPhoneMatch = ($user['email'] === $emailOrPhone) || ($user['phone'] === $emailOrPhone);

if($isEmailOrPhoneMatch && $hashPassword === $user['password']){
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "email" => $user['email'],
        "phone" => $user['phone']
    ];
    header('Location: /welcome.php');
} else {
    $_SESSION['message'] = "Your auth has failed";
    header('Location: /index.php');
}

