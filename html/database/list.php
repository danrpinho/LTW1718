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
        $stmt = $dbh->prepare('SELECT * FROM todolists WHERE listID = ? AND username = ?');
        $stmt->execute(array($listID, $_SESSION['username']));
        return $stmt->fetch();
    }
  }

  function getListItems($listID) {
    global $dbh;
    if (isset($_SESSION['username'])) {
        $stmt = $dbh->prepare('SELECT * FROM listitems WHERE listID = ?');
        $stmt->execute(array($listID));
        return $stmt->fetchAll();
    }
  }
 ?>
