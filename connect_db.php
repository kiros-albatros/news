<?php 
$host = 'localhost';
 $user = 'root';
 $password = 'root';
 $db_name = 'news_db';

 $link = mysqli_connect($host, $user, $password, $db_name) or die(mysli_error($link));
 mysqli_query($link, "SET NAMES 'utf-8'");
 ?>