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
                <input type="password" name="confirm" value="">
            </label>
            <br>
            <input type="submit" value="Submit">
        </form>
    </article>
</section>
