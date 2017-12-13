<?php
    include_once('html/includes/init.php');
	include_once('html/database/user.php');

		$username = htmlentities($_POST['username'], ENT_QUOTES);

        $ret = isLoginCorrect($username, htmlentities($_POST['password'], ENT_QUOTES));

		if($ret === 0){
			setCurrentUser($username);
			header('Location: index.php');
		}
		else if($ret === 1)
			header('Location: index.php?msg=1');
		else if($ret === 2)
			header('Location: index.php?msg=2&username='.$username);


?>
