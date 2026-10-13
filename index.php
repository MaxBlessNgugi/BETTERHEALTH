<?php
require_once(__DIR__ . '/includes/db_fns.php');
date_default_timezone_set('Africa/Nairobi');
if(isset($_SESSION['valid_user'])){
$old_user = $_SESSION['valid_user'];
$resulta = mysqli_query($db, "DELETE from logintable where username='".$_SESSION['valid_user']."'");
$resultb = mysqli_query($db, "insert into log values('','".$_SESSION['valid_user']." logs out of system-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$_SESSION['valid_user']."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
// store  to test if they *were* logged in
unset($_SESSION['valid_user']);
$result_dest = session_destroy();
		if (!empty($old_user)) {
				  if ($result_dest)  {
					// if they were logged in and are now logged out
					echo"<script>window.location.href = \"index.php\";</script>";exit;
						} else {// they were logged in but could not be logged out
				  		echo"<script>window.location.href = \"index.php\";</script>";exit;
				  		}
		} else {// if they weren't logged in but came to this page somehow
					echo"<script>window.location.href = \"index.php\";</script>";exit;
		}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<link rel="stylesheet" href="css/components.css" />
<link rel="stylesheet" href="css/feedback.css" />
<title>Better Health User Authentication</title>
<meta name="keywords" content="Better Health Hospital Management Information System" />
<meta name="description" content="Better-Health Hospital Management Information System" />
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>
<script type='text/javascript' src='js/jquery.js'></script>
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#username').focus();
});
$(function () {
    var form = document.getElementById('loginform');
    if (!form) return;
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        var msg = document.getElementById('message');
        msg.setAttribute('aria-busy', 'true');
        msg.innerHTML = '<span id="img-spinner" class="bh-spinner" role="status" aria-label="Signing in, please wait"></span>';
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: { username: form.username.value, passwd: form.passwd.value },
            success: function (data) {
                msg.setAttribute('aria-busy', 'false');
                if (data == 0) {
                    msg.innerHTML = '';
                    window.location.href = 'loading.php';
                } else {
                    msg.innerHTML = data;
                }
            },
            error: function () {
                msg.setAttribute('aria-busy', 'false');
                msg.innerHTML = 'Sign-in failed. Please try again.';
            }
        });
    });

    /* Show / hide password (presentation only — no auth change) */
    var toggle = document.getElementById('bh-pw-toggle');
    var passwd = document.getElementById('passwd');
    if (toggle && passwd) {
        toggle.addEventListener('click', function () {
            var showing = passwd.type === 'text';
            passwd.type = showing ? 'password' : 'text';
            toggle.setAttribute('aria-pressed', showing ? 'false' : 'true');
            toggle.setAttribute('aria-label', showing ? 'Show password' : 'Hide password');
        });
    }
});
</script>
</head>
<body class="bh-login-body">
<a class="bh-skip" href="#main">Skip to main content</a>

<main class="bh-login" id="main">
  <aside class="bh-login__brand" aria-label="Better Health HMIS">
    <img class="bh-login__brand-logo" src="images/wlogo.png" alt="Better Health Hospital Management Information System" />
    <div class="bh-login__brand-body">
      <h1 class="bh-login__brand-title">Better Health<br />Hospital Management Information System</h1>
      <p class="bh-login__brand-tag">Secure access for authorised staff only.</p>
    </div>
    <p class="bh-login__brand-foot">&copy; <a href="#" onclick="window.open('http://www.betterhealth.co.ke'); return false;">APPCO SYSTEMS LTD</a></p>
  </aside>

  <section class="bh-login__panel" aria-label="Sign in">
    <div class="bh-login__card">
      <h2 class="bh-login__heading">Sign in</h2>
      <p class="bh-login__sub">Enter your username and password to continue.</p>

      <form id="loginform" action="login.php" method="post" autocomplete="on" novalidate>
        <p class="bh-field">
          <label class="bh-label" for="username">Username <span class="bh-required" aria-hidden="true">*</span></label>
          <input class="bh-input" id="username" name="username" required type="text" autocomplete="username" autocapitalize="characters" spellcheck="false" />
        </p>
        <p class="bh-field">
          <label class="bh-label" for="passwd">Password <span class="bh-required" aria-hidden="true">*</span></label>
          <span class="bh-pw-wrap">
            <input class="bh-input" id="passwd" name="passwd" required type="password" autocomplete="current-password" />
            <button type="button" class="bh-pw-toggle" id="bh-pw-toggle" aria-label="Show password" aria-pressed="false">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>
              </svg>
            </button>
          </span>
        </p>
        <p class="bh-field">
          <button type="submit" class="bh-btn bh-btn--primary bh-btn--lg bh-btn--block" id="create">Login</button>
        </p>
        <div id="message" class="bh-login__message" role="status" aria-live="polite"></div>
      </form>
    </div>
  </section>
</main>

</body>
</html>
