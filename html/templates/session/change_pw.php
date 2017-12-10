<?php
 include_once('utils.php');
  if(isset($_GET['msg'])){
	 //phpAlert('The passwords do not match');
	 $msg=$_GET['msg'];
	 if($msg === '2'){

		 phpAlert('The new passwords do not match');
	 }
	 else if($msg === '3'){
		 phpAlert('The new password must have at least 8 characters');
	 }
	 else if($msg === '1'){
		 phpAlert('The old password you introduced is wrong');
	 }
  }
?>
<section class="content">
    <article id="change_password">
        <header>
            <h3 class="title">Change password</h3>
            <h3 class="back"><a href="user_settings.php">Back</a></h3>
        </header>
        <form action="action_change_password.php" method="post">
            <label>Current password<br>
                <input type="password" name="currentpassword" value="">
            </label>
            <br>
            <label>New password<br>
                <input type="password" name="newpassword" value="">
            </label>
            <br>
            <label>Confirm new password<br>
                <input type="password" name="confirmpassword" value="">
            </label>
            <br>
            <input class="submit" type="submit" value="Submit">
        </form>
    </article>
</section>
