<?php
    include_once('html/includes/init.php');
    include_once('html/database/list.php');
    if ($_SESSION['csrf'] !== $_POST['csrf']) {
        header('Location: index.php');
        die();
    }else{
        $date = date("Y-m-d");
        $title = htmlentities($_POST['title'],ENT_QUOTES);
        $description = htmlentities($_POST['description'],ENT_QUOTES);
        $category = htmlentities($_POST['category'],ENT_QUOTES);
        addList($title, $description, $date, $category);
        header('Location: index.php');
    }
?>
