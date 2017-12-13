<?php
  //session_set_cookie_params(0, '/', 'fe.up.pt', true, true);
  session_start();
  if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = generate_random_token();
  }
  function setCurrentUser($username) {
    $_SESSION['username'] = $username;
  }

  function generate_random_token() {
		return bin2hex(openssl_random_pseudo_bytes(32));
	}
?>
