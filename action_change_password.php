<?php
    include_once('html/includes/init.php');
    include_once('html/database/user.php');

        if (isPassCorrect(htmlentities($_POST['currentpassword'], ENT_QUOTES))) {
            $ret=updatePass(htmlentities($_POST['newpassword'], ENT_QUOTES), htmlentities($_POST['confirmpassword'], ENT_QUOTES));
			if($ret === 2){
				header('Location: change_pw.php?msg=2');
			}
			else if($ret === 3){
				header('Location: change_pw.php?msg=3');
			}
			else{
				 header('Location: show_user.php');
			}

        }
		else{
			header('Location: change_pw.php?msg=1');
		}


?>
