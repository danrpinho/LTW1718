<?php
    include_once('html/includes/init.php');
    include_once('html/database/connection.php');
    include_once('html/templates/common/header.php');
	include_once('html/database/user.php');

    if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
        include_once('html/database/list.php');
		if(validListID($_GET['id'], $_SESSION['username'])){ 
			$list = getListById($_GET['id']);
			$items = getListItems($_GET['id']);
			$expiringItems = getExpiringItems();
			$expiredItems = getExpiredItems();
			include_once('html/templates/aside/sidebar.php');
			include_once('html/templates/lists/list.php');
		}
		else{
			header('Location: index.php?msg=3');
		}
    } else {
        header('Location: index.php');
    }

    include_once('html/templates/common/footer.php');
?>
