<?php
    session_start();
if (!$_SESSION['user'])
{
    header('location: authorisation.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Загрузка</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/upload.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Russo+One&display=swap" rel="stylesheet">
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
            <section class="upload">
                <div class="upload__inner">
                    <form  method="post" enctype="multipart/form-data">
                        <input type="text"  class="upload__name" name="title" placeholder="название видео" required><br>
                        <input type="text" class="upload__description" name="description" placeholder="описание видео" required><br>

                            <input class="input input__file" type="file" name="video" required>
                        <button class="upload__submit" type="submit" onclick="CreatePost()">Отправить</button>
                        <?php
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        require_once 'connect/video.php';        
                        $filename = Upload($_FILES['video']);
                        addVid($_POST['title'], $filename, $_POST['description']);
                        if($_SESSION['message']){
                            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                        }
                        unset($_SESSION['message']);
                        ?>
                    </form>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>
