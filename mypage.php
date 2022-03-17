<?php
    session_start();
if (!$_SESSION['user'])
{
    header('location: registration.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mypage.css">

    <title>Document</title>
</head>
<body>
<div class="wrapper">
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
                <section class="page">
                    <div class="page__item">
                        <h2 class="name-1"> <?= $_SESSION['user']['nickname'] ?></h2>
                        <a href="upload.php" class="page__load">Загрузить видео</a>
                    </div>
                    <div class="page__item-inner">
                        <h1 class="page__item-inner-title">Мои Видео</h1>
                        <?php
        require_once 'connect/loadvideo.php';
        $videos = getVideo2();
        foreach (array_reverse($videos) as $video ):
        ?>
        <form method="GET" action="videopage.php">
                <div class="search__item">
                <input type="hidden" name="id" value="<?=$video['id']?>">
                <button class="button__video" type="submit" ><h2 class="search__text"><?= $video['title']?></h2></a>
                <p class="search__text2" ><?= $video['author'] ?></p>
                <p class="search__text2" ><?= $video['description'] ?></p>
                <video controls="controls" src="<?= $video['video']?>" width="1024" height="576">
             </div>
           </form>
        <?php
        endforeach;
        ?>
                    </div>
                </section> 
    
        
</body>
</html>