<?php
function getVideo()
    {
        $pdo = new PDO("mysql:host = localhost;dbname=lang", "root", "root");
        $statement = $pdo->prepare("SELECT * FROM videos where `status`='0'");
        $statement->execute();
        $videos = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $videos;
    }
function getVideo1()
    {
        $pdo = new PDO("mysql:host = localhost;dbname=lang", "root", "root");
        $statement = $pdo->prepare("SELECT * FROM videos where `status`='1' ");
        $statement->execute();
        $videos = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $videos;
    }
function getVideo2()
    {
        $nickname = $_SESSION['user']['nickname'];
        $pdo = new PDO("mysql:host = localhost;dbname=lang", "root", "root");
        $statement = $pdo->prepare("SELECT * FROM videos where `author` = '$nickname' ");
        $statement->execute();
        $videos = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $videos;
    }
    function getVideo3()
    {
        $id = $_GET['id'];
        $pdo = new PDO("mysql:host = localhost;dbname=lang", "root", "root");
        $statement = $pdo->prepare("SELECT * FROM videos where `id` = '$id' ");
        $statement->execute();
        $videos = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $videos;
    }