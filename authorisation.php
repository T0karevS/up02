<?php
session_start();
if ($_SESSION['user'])
{
    header('location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
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
            <form action="connect/login.php" class="registration__form" method="post">
                <div class="registration__inner">
                    <h5 class="registration__title">Войти</h5>
                    <input class="registration__control" type="email" name="email" placeholder="Введите свой Email">
                </div>
                <div class="registration__item">
                    <input class="registration__control" type="password" name="password"
                        placeholder="Введите свой пароль">
                </div>
                <div class="registration__item-1">
                    <label class="registration__label-check" for="checkbox">Я согласен с обработкой персональных
                        данных</label>
                    <input class="registration__checkbox" id="checkbox" type="checkbox">
                </div>
                <button class="registration__btn">Войти</button>
                <a href="registration.php" class="registration__text">Нет аккаунта?</a>
                <a class="registration__text" href="index.php">На главную</a>
                <?php
        if($_SESSION['message1']){
            echo '<p class="msg">' . $_SESSION['message1'] . '</p>';
        }
        unset($_SESSION['message1']);
        ?>
            </form>
        </div>
    </section>
</body>

</html>