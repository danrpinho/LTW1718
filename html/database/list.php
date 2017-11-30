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

  function getExpiringLists() {
      global $dbh;
      if (isset($_SESSION['username'])) {
          $date = date("Y-m-d", strtotime("+7 day"));
          $stmt = $dbh->prepare('SELECT * FROM todolists WHERE date(dataDue) < ?');
          $stmt->execute(array($date));
          return $stmt->fetchAll();
      }
  }
  
    function addList($title, $description, $date, $datadue) {
      global $dbh;
      if (isset($_SESSION['username'])) {
          $stmt = $dbh->prepare('INSERT INTO todolists (listID, username, title, descr, creation, datadue) VALUES(?, ?, ?, ?, ?, ?)');
          $stmt->execute(array(NULL, $_SESSION['username'],$title, $description, $date, $datadue));
      }
  }
 ?>
