<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <title>Авторизация и регистрация</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/registration.css">
</head>
<body>
    <section class="registration">
        <div class="registration__item-1">
            <form action="connect/signup.php" class="registration__form" method="post" enctype="multipart/form-data">
                <div class="registration__inner">
                    <h5 class="registration__title">Регистрация</h5>
                    <input type="text" name="nickname" class="registration__control" placeholder="Ваш ник">
                </div>
                <div class="registration__item">
                    <input type="email" name="email" class="registration__control" placeholder="Введите свой Email">
                </div>
                <div class="registration__item">
                    <input type="password" name="password" class="registration__control"
                        placeholder="Введите свой пароль">
                </div>
                <div class="registration__item">
                    <input type="password" name="password_c" class="registration__control"
                        placeholder="Подтвердите пароль">
                    <button class="registration__btn">Зарегистрироваться</button>
                    <a href="authorisation.php" class="registration__text">Есть аккаунт?</a>
                    <a class="registration__text" href="index.php">На главную</a>
                    <?php
                if($_SESSION['message']){
                    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                }
                unset($_SESSION['message']);
                ?>
            </form>
        </div>
    </section>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>