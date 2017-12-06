<?php
  include_once('html/database/connection.php');
  include_once('html/database/list.php');

  $itemid = $_POST['itemid'];
  $listid = $_POST['listid'];
  $description = $_POST['description'];
  $solved = 0;
  $assigneed = $_POST['assigneed'];
  $datedue = $_POST['datedue'];
  echo $datedue;
  addItem($itemid, $listid, $description, $solved, $assigneed, $datedue);

  $lists = getItemsAfterId($id, $itemid);
  print_r($lists);
  echo json_encode($lists);
?>
