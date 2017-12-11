<?php
  include_once('html/includes/init.php');
  include_once('html/database/connection.php');
  include_once('html/database/list.php');

  $lists = getAllLists();
  $expiringItems = getExpiringItems();
  $expiredItems = getExpiredItems();

  include_once('html/templates/common/header.php');
  include_once('html/templates/aside/sidebar.php');
  include_once('html/templates/lists/lists.php');
  include_once('html/templates/common/footer.php');
?>
