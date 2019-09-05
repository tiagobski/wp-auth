<?php
// Prevent the page from being cached
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

// Init
require_once('wp-authenticate.php');
$_SESSION['return_to'] = $_SERVER['REQUEST_URI'];	// Remember the page to return to if user is required to login.
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Welcome</title>
</head>

<body>

<?php
if ( !is_user_logged_in() )
{
	// User is not logged in. Redirect to login page.
	
	header('Location: login.php');
} else
{
	// User appears to be logged in.
	
	// Retrieve logged in user information (https://codex.wordpress.org/Function_Reference/wp_get_current_user)
	$user = wp_get_current_user();
	
	// Safe usage
	if ( ! $user->exists() )
		return;
}
?>

<h1>You are logged in.</h1>
<?php 
echo 'Username: ' . $current_user->user_login . '<br />';
echo 'User email: ' . $current_user->user_email . '<br />';
echo 'User first name: ' . $current_user->user_firstname . '<br />';
echo 'User last name: ' . $current_user->user_lastname . '<br />';
echo 'User display name: ' . $current_user->display_name . '<br />';
echo 'User ID: ' . $current_user->ID . '<br />';
?>
<p><a href="login.php?logout=true">Click here to log out.</a></p>
</body>

</html>
