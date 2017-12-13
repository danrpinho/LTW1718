<?php
  include_once('html/database/connection.php');
  include_once('html/database/list.php');
  include_once('html/includes/init.php');
  if ($_SESSION['csrf'] !== $_POST['csrf']) {
    header('Location: index.php');
    die();
  } else {
    $itemid = $_POST['itemid'];
    $listid = $_POST['listid'];
    $description = htmlentities($_POST['description'], ENT_QUOTES);
    $solved = 0;
    $assigneed = htmlentities($_POST['assigneed'], ENT_QUOTES);
    $datedue = $_POST['datedue'];
    $newitemid = $itemid + 1;
    $ret = addItem($newitemid, $listid, $description, $solved, $assigneed, $datedue);
    $lists = getItemsAfterId($listid, $itemid);
    echo json_encode(array($ret, $lists));
  }
?>
