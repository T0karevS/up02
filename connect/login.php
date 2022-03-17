<?php
session_start();
require_once 'connect.php';
$email = $_POST['email'];
$password =md5($_POST['password']);
$check_user = mysqli_query($connect, "SELECT * FROM `users` where `email` = '$email' and `password` = '$password'");
if(mysqli_num_rows($check_user)==0)
{
    $_SESSION['message1'] = 'Неверный логин или пароль!';
    header('Location: ../authorisation.php');
}
else
{
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION['user'] = [
        "id"=>$user['id'],
        "nickname"=>$user['nickname'],
        "password"=>$user['password'],
        "email"=>$user['email'],
        "status"=>$user['status']
    ];
    header('location: ../index.php');
    var_dump($user);
}
?>