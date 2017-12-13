<?php
include_once('html/includes/init.php');
include_once('html/database/list.php');
removeList(htmlentities($_GET['id'], ENT_QUOTES));
header('Location: index.php');
?>