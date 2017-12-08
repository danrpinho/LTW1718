<?php
    include_once('html/includes/init.php');
    include_once('html/database/user.php');

        $ret = isLoginCorrect($_POST['username'], $_POST['password']); 
            
		if($ret === 0){
			setCurrentUser($_POST['username']);
			header('Location: index.php');
		}
		else if($ret === 1)
			header('Location: index.php?msg=1');
		else if($ret === 2)
			header('Location: index.php?msg=2&username='.$_POST['username']);
        

?>
