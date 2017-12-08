<section class="session">
    <article id="login">
        <h3>Login</h3>
        <form class="loginform" action="action_login.php" method="post">
            <input class="username" type="text" placeholder="username" name="username" value="<?=$username?>" required>
            <input class="password" type="password" placeholder="password" name="password" required>
            <input class="login" type="submit" name="signin" value="Sign In">
            <input class="register" type="button" name="signup" value="Sign Up">
        </form>
    </article>
</section>
