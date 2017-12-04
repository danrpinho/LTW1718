<section class="session">
  <article id="register">
    <h3>Register a new account</h3>
    <form action="new_user.php" method="post">
      <label>Username:
        <input type="text" name="username" value="" required>
      </label>
      <br>
      <label>Name:
        <input type="text" name="fullname" value="">
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
        <input type="email" name="email" value="" required>
      </label>
      <br>
      <input type="submit" value="Register">
    </form>
  </article>
</section>
