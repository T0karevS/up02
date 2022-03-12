<?php
session_start();
function Upload($video)
{
    $path = 'uploads/' . uniqid() . "." . pathinfo($video['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['video']['tmp_name'], $path);
    return $path;
}
function addVid($title, $filename, $description)
{
    $pdo = new PDO("mysql:host = localhost;dbname=lang", "root", "root");
    $sql = "INSERT INTO `videos`( `title`, `description`,  `video`) VALUES ( :title, :description, :video)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['video' => $filename, 'description' => $_POST['description'], 'title' => $_POST['title']]);
    $_SESSION['message1'] = 'видео загружено успешно!';
}
