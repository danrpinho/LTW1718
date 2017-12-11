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

    function addList($title, $description, $date, $category) {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $stmt = $dbh->prepare('INSERT INTO todolists (listID, username, title, descrList, creation, category) VALUES(?, ?, ?, ?, ?, ?)');
            $stmt->execute(array(NULL, $_SESSION['username'],$title, $description, $date, $category));
        }
    }


    function addItem($id, $listID, $description, $solved, $assigneed, $datedue) {
        global $dbh;
        if (isset($_SESSION['username'])) {
      		$stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
      		$stmt->execute(array($assigneed));
      		if($stmt->fetch()){
      			$stmt = $dbh->prepare('INSERT INTO listitems (id, listID, descrItem, solved, assignee, datedue) VALUES(?, ?, ?, ?, ?, ?)');
      			$stmt->execute(array($id, $listID, $description, $solved, $assigneed, $datedue));
      			return 0;
      		}
      		else{
      			return 1;
      		}
        }
    }

    function getItemsAfterId($listID, $itemid) {
      global $dbh;
      if (isset($_SESSION['username'])) {
        $stmt = $dbh->prepare('SELECT * FROM listitems WHERE id > ? AND listID = ?');
        $stmt->execute(array($itemid, $listID));
        return $stmt->fetchAll();
      }
    }

	function removeList($listID){
		global $dbh;
    if (isset($_SESSION['username'])) {

  		$stmt1 = $dbh->prepare('DELETE FROM todolists WHERE listID = ?');
      $stmt1->execute(array($listID));

      $stmt2 = $dbh->prepare('DELETE FROM listitems WHERE listID = ?');
      $stmt2->execute(array($listID));
    }
	}

    function checkItem($itemid, $listID, $solved, $username) {
      global $dbh;
      if (isset($_SESSION['username'])) {

	  /*$stmt = $dbh->prepare('SELECT * FROM todolists WHERE listID = ?');
	  $stmt = $dbh->execute(array($listID));
	  $listOwner = $stmt->fetchAll()['username'];

	  $stmt = $dbh->prepare('SELECT * FROM listitems WHERE id = ? AND listID = ?');
	  $stmt = $dbh->execute(array($itemid, $listID));
	  $assignee = $stmt->fetchAll()['assignee'];

	  if(($username === $assignee) || ($username === listOwner)){ */
		$stmt = $dbh->prepare('UPDATE listitems SET solved = ? WHERE id = ? AND listID = ?');
		$stmt->execute(array($solved, $itemid, $listID));
		/*return 0;
	  }
	  else{
		  return 1;
	  }*/
      }
    }


    function getListsAssociated() {
      global $dbh;
      if (isset($_SESSION['username'])) {
        $stmt = $dbh->prepare('SELECT * FROM todolists JOIN listitems USING (listID) WHERE assignee = ? AND username != ?');
        $stmt->execute(array($_SESSION['username'], $_SESSION['username']));
        return $stmt->fetchAll();
      }
    }

    function getListsByCategory($category) {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $stmt = $dbh->prepare('SELECT * FROM todolists WHERE username = ? AND category = ?');
            $stmt->execute(array($_SESSION['username'], $category));
            return $stmt->fetchAll();
        }
    }

    function getAllCategories() {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $stmt = $dbh->prepare('SELECT DISTINCT category FROM todolists WHERE username = ?');
            $stmt->execute(array($_SESSION['username']));
            return $stmt->fetchAll();
        }
    }
	
	function validListID($listID, $username){
		global $dbh;
		$stmt = $dbh->prepare('SELECT * FROM todolists WHERE listID = ? AND (username = ? OR EXISTS (SELECT * FROM listitems WHERE listID = ? AND assignee = ?))');
		$stmt->execute(array($listID, $username, $listID, $username));
		
		if($stmt->fetch()){
			return 1;
		}
		else{
			return 0;
		}
	}
?>
