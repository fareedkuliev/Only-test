<?php
session_start();

$connection = mysqli_connect('127.0.0.1', 'root', '', 'only_test');

$id = $_SESSION['user']['id'];

if($_POST['name']){
    $name = $_POST['name'];
} else {
    $name = $_SESSION['user']['name'];
}

if($_POST['email']){
    $email = $_POST['email'];
} else {
    $email = $_SESSION['user']['email'];
}

if($_POST['phone']){
    $phone = $_POST['phone'];
} else {
    $phone = $_SESSION['user']['phone'];
}

if($_POST['password']){
    $password = md5($_POST['password']);
} else {
    $passwordFromDB = mysqli_fetch_assoc(mysqli_query($connection, "SELECT `password` FROM `users` WHERE `id`='$id'"));
    $password = $passwordFromDB['password'];
}

$checkData = mysqli_query($connection, "SELECT *  FROM users WHERE name='$name' OR email='$email' OR phone='$phone'");

$foundUsers = [];

while ($row = mysqli_fetch_row($checkData)) {
  $foundUsers[] = $row;
}

if(count($foundUsers) === 1 && $id == $foundUsers[0][0]){
   mysqli_query($connection, "UPDATE `users` SET `name`='$name', `email`='$email', `phone`='$phone', `password`='$password' WHERE `id`='$id'");
    $_SESSION['user'] = [
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'phone' => $phone
    ];
    $_SESSION['message'] = 'Data has updated';
    header('Location: /welcome.php');
} else {
    $_SESSION['message'] = 'User with this data already exists, please change the data';
    header('Location: /welcome.php');
}

if(!$_POST['name'] && !$_POST['email'] && !$_POST['phone'] && !$_POST['password']){
    $_SESSION['message'] = 'Empty data';
    header("Location: /welcome.php");
}







