<?php
    include_once('html/includes/init.php');
    include_once('html/database/list.php');
    $date = date("Y-m-d");
    addList(htmlentities($_POST['title'],ENT_QUOTES), htmlentities($_POST['description'],ENT_QUOTES), $date, htmlentities($_POST['category'],ENT_QUOTES));
    header('Location: index.php');

?>
