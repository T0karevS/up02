<?php
$pdo = new PDO("mysql:host = localhost;dbname=lang", "root", "root");
$sql = "DELETE from `videos` WHERE `id`= '$id' ";
$statement = $pdo->prepare($sql);
$statement->execute();
