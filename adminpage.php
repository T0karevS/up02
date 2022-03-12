<?php
session_start();
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
    <div class="video__adm">
        <?php   
        if($_SESSION['user']['status']!=1)
        {
            var_dump();
            header('location: index.php');
        }
        function getVideo()
        {
          $pdo = new PDO("mysql:host = localhost;dbname=lang", "root", "root");
          $statement = $pdo->prepare("SELECT * FROM videos");
          $statement->execute();
          $videos = $statement->fetchAll(PDO::FETCH_ASSOC);
          return $videos;
        }
            $videos = getVideo();
            foreach (array_reverse($videos) as $video ):
        ?>
            <div class="search__item">
            <h2 class="search__text"><?= $video['title']?></h2>
            <p class="search__text2"><?= $video['description'] ?></p>
            <video controls="controls" src="<?= $video['video']?>" width="720" height="360">
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