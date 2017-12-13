<?php
    include_once('html/includes/init.php');
	include_once('html/database/user.php');
	/*if ($_SESSION['csrf'] !== $_POST['csrf']) {
        header('Location: index.php');
		die();
	} else {*/
		$username = $_POST['username'];

        $ret = isLoginCorrect($username, $_POST['password']);

		if($ret === 0){
			echo "<script> alert(\"worked!\");</script>";
			setCurrentUser($username);
			header('Location: index.php');
		}
		else if($ret === 1)
			header('Location: index.php?msg=1');
		else if($ret === 2)
			header('Location: index.php?msg=2&username='.$username);

	//}
?>
