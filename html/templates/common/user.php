<div id="user">
  <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
    <form action="action_logout.php" method="post">
      <a class="username" href="user_settings.php"><?=$_SESSION['username']?></a>
      <input type="submit" value="Logout">
    </form>

  <?php } ?>
</div>
