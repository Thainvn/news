<?php 
	session_start();
	require_once 'display_html.php';

	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	


	if(isset($_SESSION['admin'])){
		
		display_html_header('Read Products');	
		
		?>
			<div id='page-content'></div>
		<?php
		
		display_html_footer();

	}else{

		display_html_header('Error');

		display_html_footer();
		
	}
 ?>