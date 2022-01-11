<?php
 require("connect_db.php");
 $dataId = $_GET['id'];
 $query = "SELECT * FROM news WHERE id=$dataId";
 $result = mysqli_query($link, $query) or die(mysqli_error($link));
 $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?> 

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>news item</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <main class="news">
            <h1 class="news__title"><?=$data[0]["title"]?></h1>
            <div class="news__info"><?=$data[0]["content"]?></div>
            <a class="back-link" href="index.php">Все новости >></a>
        </main>
    </body>
</html>