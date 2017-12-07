<?php
include_once('html/includes/init.php');
include_once('html/database/list.php');
removeList($_GET['id']);
header('Location: index.php');
?>