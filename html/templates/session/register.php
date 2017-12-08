<?php 
 include_once('utils.php');
 $username="";
 $fullname="";
 $email="";
 if(isset($_GET['username'])){
	 $username=$_GET['username'];
 }
 if(isset($_GET['fullname'])){
	 $fullname=$_GET['fullname'];
 }
 if(isset($_GET['email'])){
	 $email=$_GET['email'];
 }
  if(isset($_GET['msg'])){
	 //phpAlert('The passwords do not match');
	 $msg=$_GET['msg'];
	 if($msg === '2'){
		 
		 phpAlert('The passwords do not match');
	 }
	 else if($msg === '1'){
		 phpAlert('Your username already exists');
	 }
  }
?>
<section class="session">
  <article id="register">
    <h3>Register a new account</h3>
    <form class="registerform" action="new_user.php" method="post">
      <label>Username:
        <input type="text" name="username" value="<?=$username?>" required>
      </label>
      <br>
      <label>Name:
        <input type="text" name="fullname" value="<?=$fullname?>">
      </label>
      <br>
      <label>Password:
        <input type="password" name="password" value="" required>
      </label>
      <br>
      <label>Confirm Password:
        <input type="password" name="confirmpassword" value="" required>
      </label>
      <br>
      <label>Email:
        <input type="email" name="email" value="<?=$email?>" required>
      </label>
      <br>
      <input class="register" type="submit" value="Register">
    </form>
  </article>
</section>



