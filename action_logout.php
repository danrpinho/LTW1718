<?php
  include_once('html/includes/init.php');
  session_destroy();
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
