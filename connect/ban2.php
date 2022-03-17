<?php
$pdo = new PDO("mysql:host = localhost;dbname=lang", "root", "root");
$sql = "UPDATE `videos` SET `status`='1' WHERE `id`= '$id' ";
$statement = $pdo->prepare($sql);
$statement->execute();
