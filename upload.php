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
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/mycss1.css">
</head>
<body>
<header>
    <a href="#"><?= $_SESSION['user']['email']; ?></a>
    <br>
    <a href="connect/logout.php" class="logout"> Выход</a>
    <br>
    <a href="index.php" class="logout">на главную</a>
   
</header>
 <form  method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Введите название видео"><br>
        <input type="text" name="description" placeholder="Введите описание видео"><br>
        <input class="video" type="file" name="video"><br>
        <button type="submit" onclick="CreatePost()">Отправить</button>
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
