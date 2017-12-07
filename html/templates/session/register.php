<section class="session">
  <article id="register">
    <h3>Register a new account</h3>
    <p class="requiredfields">All fields are required.</p>
    <form action="new_user.php" method="post">
      <label>Username<br>
        <input type="text" name="username" placeholder="username" value="" required>
      </label>
      <br>
      <label>Name<br>
        <input type="text" name="fullname" placeholder="John Doe" value="" required>
      </label>
      <br>
      <label>Password<br>
        <input type="password" name="password" placeholder="&#8226&#8226&#8226&#8226&#8226&#8226&#8226&#8226" value="" required>
      </label>
      <br>
      <label>Confirm Password<br>
        <input type="password" name="confirmpassword" placeholder="&#8226&#8226&#8226&#8226&#8226&#8226&#8226&#8226" value="" required>
      </label>
      <br>
      <label>Email<br>
        <input type="email" name="email" placeholder="email@example.com" value="" required>
      </label>
      <br>
      <input type="submit" value="Register">
    </form>
  </article>
</section>
