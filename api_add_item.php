<?php
  include_once('html/database/connection.php');
  include_once('html/database/list.php');

  $itemid = $_POST['itemid'];
  $listid = $_POST['listid'];
  $description = $_POST['description'];
  $solved = 0;
  $assigneed = $_POST['assigneed'];
  $datedue = $_POST['datedue'];
  $newitemid = $itemid + 1;


  addItem($newitemid, $listid, $description, $solved, $assigneed, $datedue);

  $lists = getItemsAfterId($listid, $itemid);
  echo json_encode($lists);
?>
