<section class="content">
    <article id="show_user">
        <header>
            <h3 class="title">Account details</h3>
            <h3 class="back"><a href="user_settings.php">Back</a></h3>
        </header>
        <ul>
            <li>
                <h4>Username: </h4>
                <p><?=$user['username']?></p>
            </li>
            <li>
                <h4>Name: </h4>
                <p><?=$user['fullname']?></p>
            </li>
            <li>
                <h4>E-mail address: </h4>
                <p><?=$user['email']?></p>
            </li>
            <li>
                <h4>Join date: </h4>
                <p><?=$user['joined']?></p>
            </li>
        </ul>
    </article>
</section>