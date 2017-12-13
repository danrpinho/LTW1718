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
        <span class="form">
        <form action="action_change_password.php" method="post">
            <input type="password" name="currentpassword" placeholder="Current password" value="">
            <input type="password" name="newpassword" placeholder="New password" value="">
            <input type="password" name="confirmpassword" placeholder="Confirm new password" value="">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            <input class="submit" type="submit" value="Submit">
        </form>
        </span>
    </article>
</section>
