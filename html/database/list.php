<?php

  function getAllLists($dbh, $username) {
    $stmt = $dbh->prepare('SELECT * FROM todolists WHERE username = ?');
    $stmt->execute(array($_GET['username']));
    return $stmt->fetchAll();
  }

  function getListById($dbh, $username, $listID) {
    $stmt = $dbh->prepare('SELECT * FROM todolists WHERE username = ? AND listID = ?');
    $stmt->execute(array($_GET['username'],$_GET['listID']));
    return $stmt->fetchAll();
  }
 ?>
