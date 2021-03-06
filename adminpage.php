<?php
session_start();
if($_SESSION['user']['status']!='S' && $_SESSION['user']['nickname']!='admin')
        {            
            header('location: ../index.php');
        }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<header class="header">
            <a href="index.php" class="logo">
                <img src="images/logo.svg" alt="" class="logo__img">
            </a>
            <div class="header__search-inner">
                <input type="text" class="header__search">
                <button class="header__btn">Поиск</button>
            </div>
            <a href="mypage.php" class="header__registration">
                <img src="images/avatar.svg" alt="" class="header__registration">
            </a>
        </header>
        <main class="main">
            <div class="main__inner">
                <sidebar class="sidebar">
                    <ul class="sidebar__list">
                        <li class="sidebar__list-item"><a href="index.php" class="sidebar__list-link">Главная</a></li>
                        <li class="sidebar__list-item"><a href="upload.php" class="sidebar__list-link">Загрузить видео</a></li>
                    </ul>
                    <ul class="sidebar__list">
                        
                    <?php
                        if(isset($_SESSION['user']))
                        {
                        echo '<li class="sidebar__list-item"><a href="connect/logout.php" class="sidebar__list-link"> Выход</a></li>';
                            if($_SESSION['user']['status']!='S')
                            {
                                echo '<li class="sidebar__list-item"><a href="adminpage.php" class="sidebar__list-link"class="sidebar__list-link" > страница для администратора</a></li>';
                            }
                        }
                        else
                        {
                            echo ' <li class="sidebar__list-item"><a class="sidebar__list-link" href="registration.php"><p>Зарегистрироваться</p></a></li>
                            <li class="sidebar__list-item"><a class="sidebar__list-link" href="authorisation.php"><p>Войти</p></a></li>';
                        }
                            ?>
                    </ul>
                </sidebar>
<form method="post" class="form" enctype="multipart/form-data">
    <div class="video__adm">
        <?php   
        require_once 'connect/loadvideo.php';
            $videos = getVideo();
                     
            foreach ($videos as $video ):
        ?>            
            <div class="search__item">   
            <?php 
            ?>     
            <button class="button__video" type="submit" ><h2 class="search__text"><?= $video['title']?></h2></a>
            <p class="search__text2"><?= $video['description'] ?></p>
            <video controls="controls" src="<?= $video['video']?>" width="1280" height="720"></video><br>
            <button type="submit" class="button1" name="<?= $video['id']; ?>">Забанить видео</button>
            <button type="submit" class="button1" name="<?=  'a'.$video['id']; ?>">Выложить видео</button>
            <?php 
            $id=$video['id'];
            $id2='a'.$id;
            if( isset($_POST[ $id ]) )
            {
                $id=$video['id'];
                require_once 'connect/ban.php';
            }  
            if( isset($_POST[ $id2 ]) )
            {
                $id=$video['id'];
                require_once 'connect/ban2.php';
            }  
            ?>
            </div>
        <?php
            endforeach;
        ?>
    </div>
</form>
        <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
        </script>
</body>
</html>