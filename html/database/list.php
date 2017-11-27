<?php

  function getAllLists() {
    global $dbh;
    if (isset($_SESSION['username'])) {
        $stmt = $dbh->prepare('SELECT * FROM todolists WHERE username = ?');
        $stmt->execute(array($_SESSION['username']));
        return $stmt->fetchAll();
    }
  }

  function getListById($listID) {
    global $dbh;
    if (isset($_SESSION['username'])) {
        $stmt = $dbh->prepare('SELECT * FROM todolists WHERE username = ? AND listID = ?');
        $stmt->execute(array($_SESSION['username'], $_GET['listID']));
        return $stmt->fetchAll();
    }
  }
 ?>
