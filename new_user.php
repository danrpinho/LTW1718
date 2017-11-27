<?php
    include_once('html/includes/init.php');
    include_once('html/database/user.php');
    $date = date("Y-m-d");
    addUser($_POST['username'], $_POST['fullname'], $_POST['password'], $_POST['email'], $date);
    header('Location: http://gnomo.fe.up.pt/~up201404302/LTW1718/lists.php');

?>
