<?php
require("connect_db.php");

 if(isset($_GET['page'])) {
     $page = $_GET['page'];
 } else {
     $page = 1;
 }

$newsOnPage = 5;
$start = ($page - 1) * $newsOnPage;

 $queryPage = "SELECT * FROM news ORDER BY idate DESC LIMIT $start, $newsOnPage";
 $resultPage = mysqli_query($link, $queryPage) or die(mysqli_error($link));
 $data = mysqli_fetch_all($resultPage, MYSQLI_ASSOC);

 $queryPagination = "SELECT * FROM news ORDER BY idate";
 $resultPagination = mysqli_query($link, $queryPagination) or die(mysqli_error($link));
 $count = mysqli_num_rows($resultPagination);
 $pagesNumber = ceil($count / $newsOnPage);
?> 

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>news main</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <main class="news">
            <h1 class="news__title">Новости</h1>
            <section class="news__list">

                <?php 
                foreach ($data as $arrayRow) { ?>
              
                <div class='news__item'>
                    <span class='item__date'><?= date('d.m.Y', $arrayRow["idate"]) ?></span>
                    <a class='item__title' href='view.php?id=<?= $arrayRow["id"]?>'><?=$arrayRow["title"];?></a>
                    <p class='item__preview'><?=$arrayRow["announce"]?></p>
                </div>
                <?php };
                ?>

            </section>

            <section class="pages">
                <h2>Страницы</h2>
                <div class="pages__pagination">
                    <?php
                    for($i = 1; $i <= $pagesNumber; $i++) {
                        if($page == $i) {
                            echo "<a class=\"pagination__link active\" href=\"?page=$i\">$i</a>";
                        } else {
                            echo "<a class=\"pagination__link\" href=\"?page=$i\">$i</a>";
                        }    
                    }
                    ?>
                </div>
            </section>
        </main>
    </body>
</html>