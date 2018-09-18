<?php 
	session_start();
	require_once 'display_html.php';


	// If user is not logged ,display form login else display welcome page
	// if(isset($_SESSION['valid_user'])){
		
	// 	header("Location:index.php");
	// }else{

		display_html_header('Login');
		display_login_form();
		display_html_footer();
	
 ?>