<?php 
		require_once '../controller/logout.php';
		require_once 'display_html.php';	

		
		display_html_header('Logout');
		if(!empty($old_username)){

						if($result_dest ){
							echo '<div class="alert alert-info">Logged out.</div>';
				    		

						}else{

							echo "<div class='alert alert-danger'>Could not log you out</div>";

						}
					}else{

						 echo '<div class="alert alert-danger">You were not logged in, and so have not been logged out.</div>';
				  		
						 
					}

		display_html_footer();
		
 ?>