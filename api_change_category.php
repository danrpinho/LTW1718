<?php
  include_once('html/database/connection.php');
  include_once('html/database/list.php');
  include_once('html/includes/init.php');

  $category = htmlentities($_POST['category'], ENT_QUOTES);
  if($category == "Items"){
    $lists = getListsAssociated();
    echo json_encode($lists);
  }
  else if($category == "All") {
    $ret = getAllLists();
    $lists = getListsAssociated();
    echo json_encode(array_merge ($ret, $lists));
  }
  else {
    $ret = getListsByCategory($category);
    echo json_encode($ret);
  }
?>
