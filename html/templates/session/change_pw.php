<section class="content">
    <article id="change_password">
        <header>
            <h3 class="title">Change password</h3>
            <h3 class="back"><a href="user_settings.php">Back</a></h3>
        </header>
        <form action="change_password.php" method="post">
            <label>Current password:
                <input type="password" name="currentpassword" value="">
            </label>

            <label>New password:
                <input type="password" name="newpassword" value="">
            </label>

            <label>Confirm new password:
                <input type="password" name="confirm" value="">
            </label>

            <input type="submit" value="Submit">
        </form>
    </article>
</section>