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
            $stmt = $dbh->prepare('SELECT * FROM todolists WHERE listID = ?');
            $stmt->execute(array($listID));
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

    function getExpiringItems() {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $due = date("Y-m-d", strtotime("+7 day"));
            $today = date("Y-m-d");
            $stmt = $dbh->prepare('SELECT * FROM listitems WHERE assignee = ? AND date(datedue) < ? AND date(datedue) > ?');
            $stmt->execute(array($_SESSION['username'],$due,$today));
            return $stmt->fetchAll();
        }
    }

    function getExpiredItems() {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $date = date("Y-m-d");
            $stmt = $dbh->prepare('SELECT * FROM listitems WHERE assignee = ? AND date(datedue) < ?');
            $stmt->execute(array($_SESSION['username'],$date));
            return $stmt->fetchAll();
        }
    }

    function addList($title, $description, $date) {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $stmt = $dbh->prepare('INSERT INTO todolists (listID, username, title, descr, creation) VALUES(?, ?, ?, ?, ?)');
            $stmt->execute(array(NULL, $_SESSION['username'],$title, $description, $date));
        }
    }


    function addItem($id, $listID, $description, $solved, $assigneed, $datedue) {
        global $dbh;

          $stmt = $dbh->prepare('INSERT INTO listitems (id, listID, descr, solved, assignee, datedue) VALUES(?, ?, ?, ?, ?, ?)');
          $stmt->execute(array($id, $listID, $description, $solved, $assigneed, $datedue));
    }


    function getItemsAfterId($listID, $itemid) {
      global $dbh;

        $stmt = $dbh->prepare('SELECT * FROM listitems WHERE id > ? AND listID = ?');
        $stmt->execute(array($itemid, $listID));
        return $stmt->fetchAll();
    }

	function removeList($listID){
		global $dbh;

		$stmt = $dbh->prepare('DELETE FROM todolists WHERE listID = ?');
		$stmt->execute(array($listID));
	}

    function checkItem($itemid, $listID, $solved, $username) {
      global $dbh;
      $stmt = $dbh->prepare('UPDATE listitems SET solved = ? WHERE id = ? AND listID = ? AND assignee = ?');
      $stmt->execute(array($solved, $itemid, $listID, $username));

    }


    function getListsAssociated() {
      global $dbh;

        $stmt = $dbh->prepare('SELECT * FROM todolists WHERE listid = (SELECT listid FROM listitems WHERE assignee = ?) AND username != ?');
        $stmt->execute(array($_SESSION['username'], $_SESSION['username']));
        return $stmt->fetchAll();
    }
?>
