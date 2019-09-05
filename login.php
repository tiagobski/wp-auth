<?php
// Prevent the page from being cached
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

// Require auth functions
require_once('wp-authenticate.php');

// Logout the current user
if($_GET['logout'] == 'true')
	wp_logout();

// If the form has been submitted, attempt authentication
if (count($_POST) > 0)
	authenticate();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
</head>

<body>
<?php
// If user see's this, login was unsuccessful.
if (count($_POST) > 0) : ?>
	echo "<p>Invalid user name or password.</p>";
<?php endif; ?>

<?php
// If user is logging out, show him action success message.
if ( $_GET['logout'] == 'true' ): ?>
<strong>Logged out!</strong> Your session was terminated successfully.
<?php endif; ?>

<form action="<?= basename(__FILE__) ?>" method="POST">
	<input type="text" autocomplete="off" placeholder="Username" name="username"/>
	<input type="password" autocomplete="off" placeholder="Password" name="password"/>
	<label><input type="checkbox" name="remember" value="1" />Remember me</label>
	<button type="submit" value="Submit">Submit</button>
</form>
</body>
</html>