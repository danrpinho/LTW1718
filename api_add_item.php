<?php
  include_once('html/database/connection.php');
  include_once('html/database/list.php');
  include_once('html/includes/init.php');

  $itemid = htmlentities($_POST['itemid'], ENT_QUOTES);
  $listid = htmlentities($_POST['listid'], ENT_QUOTES);
  $description = htmlentities($_POST['description'], ENT_QUOTES);
  $solved = 0;
  $assigneed = htmlentities($_POST['assigneed'], ENT_QUOTES);
  $datedue = htmlentities($_POST['datedue'], ENT_QUOTES);
  $newitemid = $itemid + 1;


  $ret = addItem($newitemid, $listid, $description, $solved, $assigneed, $datedue);

  $lists = getItemsAfterId($listid, $itemid);
  echo json_encode(array($ret, $lists));
?>
