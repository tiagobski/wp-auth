<?php
ob_start();

// Definitions
$path_wp_load = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'wp-load.php';
$url_login_page = dirname(__DIR__, 1);
$url_front_page = '/dir/';

// Initiation

$user = null;
init();

// Functions

function init()
{
	global $path_wp_load;
	
	// Initiating PHP session
	if( ! session_id() )
		session_start();
	
	// Loading WordPress libraries
	define('WP_USE_THEMES', false);
	require_once( $path_wp_load );
}

function authenticate()
{
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$user = get_user_by('login', $username);
	
	// Compare form password with WordPress password
	if( ! wp_check_password($password, $user->data->user_pass, $user->ID) )
		return false;
	
	wp_set_current_user($user->ID, $username);
	
	// Set permanent cookie if 'Remember me' selected
	if ($_POST['remember'] == '1') {
		wp_set_auth_cookie($user->ID, true);
	} else {
		wp_set_auth_cookie($user->ID);
	}
 
	// Redirect user to previous page, if possible
	header('Location: ' . $homeUrl);

	/*if ( isset($_SESSION['return_to']) )
	{
		$url = $_SESSION['return_to'];
		unset($_SESSION['return_to']);
		header('Location: ' . $url);
	} else
	{
		header('Location: ' . $url_front_page);
	}*/
}
 
/*function login()
{
	if( !is_user_logged_in() )
	{
		// REMEMBER THE PAGE TO RETURN TO ONCE LOGGED IN
		$_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
		
		// REDIRECT TO LOGIN PAGE
		header('Location: ' . $url_login_page);
		
		// Stop page from possibly rendering
		//ob_end_clean();
		exit();
	}
}*/
?>
