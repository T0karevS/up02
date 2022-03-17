<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/vieopage.css">
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
    <?php
     require_once 'connect/loadvideo.php';
     $videos = getVideo3();
    foreach (array_reverse($videos) as $video ):
    ?>
    <div class="videopage__inner">
    <div class="search__item">
            <a href="videopage.php"><h2 class="search__text"><?= $video['title']?></h2></a>
            <p class="search__text2"><?= $video['description'] ?></p>
            <video controls="controls" src="<?= $video['video']?>" width="1280" height="720"></video>
    </div>

        <?php
            endforeach;
        ?>
        <form  id="form_data" method="post" enctype="multipart/form-data">
            <textarea class="videopage__textarea" name="content" required placeholder="Ваш комментарий"></textarea><br>
            <button type="submit" class="knopka">Отправить</button>
        </form>   

        <?php
        $author = $_SESSION['nickname'];
        $content = $_POST['content'];
        
        function addPosts($author, $content, $idvid)
        {
            $pdo = new PDO("mysql:host = localhost;dbname=lang", "root", "root");
            $sql = "INSERT INTO `comment` (`author`, `content`, `idvid`) VALUE (:author, :content, :idvid)";
            $statement = $pdo->prepare($sql);
            $statement->execute(['author' => $_SESSION['user']['nickname'], 'content' => $_POST['content'], 'idvid' => $_GET['id']]);
        
        }
        addPosts($_SESSION['nickname'],$_POST['content'], $_GET['id']);
        function getPost()
        {
            $idvid = $_GET['id'];
            $pdo = new PDO("mysql:host = localhost;dbname=lang", "root", "root");
            $statement = $pdo->prepare("SELECT * FROM comment where `idvid` = $idvid ");
            $statement->execute();
            $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $posts;
        }
            $posts = getPost();
            foreach (array_reverse($posts) as $post ):
        ?>
        <div class="comment">
        <p class ="comment__text"><?= $post['author'] ?></p>
        <p class ="comment__text-1"><?= $post['content'] ?></p>
        </div>
<?php
endforeach;
?>
    </div>

<script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
        </script>
</body>
</html>