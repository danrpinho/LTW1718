<?php
  include_once('html/database/connection.php');
  include_once('html/database/list.php');
  include_once('html/includes/session.php');

    $itemid = htmlentities($_POST['itemid'], ENT_QUOTES);
    $listid = htmlentities($_POST['listid'], ENT_QUOTES);
    $solved = htmlentities($_POST['solved'], ENT_QUOTES);
    $username = $_SESSION['username'];

    checkitem($itemid, $listid, $solved, $username);
    echo json_encode(1);

?>
