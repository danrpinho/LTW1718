<?php
  include_once('html/database/connection.php');
  include_once('html/database/list.php');
  include_once('html/includes/session.php');
  $itemid = $_POST['itemid'];
  $listid = $_POST['listid'];
  $solved = $_POST['solved'];
  $username = $_SESSION['username'];
  
  checkitem($itemid, $listid, $solved, $username);
  echo json_encode(1);

?>
