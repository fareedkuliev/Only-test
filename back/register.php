<?php
session_start();

$connection = mysqli_connect('127.0.0.1', 'root', '', 'only_test');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$dataCheck = mysqli_fetch_assoc(mysqli_query($connection,
    "SELECT * FROM `users` WHERE `name`='$name' OR `email`='$email' OR `phone`='$phone' LIMIT 1"));

if ($password !== $confirm_password) {
    $_SESSION['message'] = 'Passwords are different';
    header('Location: /index.php');
} elseif (isset($dataCheck['id'])){
    $_SESSION['message'] = 'User with this data has already registered';
    header('Location: /index.php');
}
else {
    $hashPassword = md5($password);
    mysqli_query($connection, "INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email', '$phone', '$hashPassword')");
    $_SESSION['message'] = 'You have successfully registered';
    unset($_SESSION['message']);
    header('Location: /auth.php');
}

