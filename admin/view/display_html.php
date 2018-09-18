<?php 
	function display_html_header($title){
		// display header of page
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title><?php echo $title; ?></title>
			<link rel="stylesheet" href="../../libs/css/lib/bootstrap.min.css">
			<link rel="stylesheet" href="../../libs/css/custom/style.css">
			
		</head>
		<body>
			
			<?php
				display_html_navbar($title);
			?>
			<div class="container">
				<div class="page-header">
					<h1 id="page-title">
						<?php echo $title; ?>
					</h1>
				</div>
				
			
		<?php

		
	}

	function display_html_footer(){
		// display footer of page
		?>
				</div>
				<script src="../../libs/js/lib/jquery-3.3.1.min.js"></script>

				 <script type="text/javascript" src="../../libs/ckeditor/ckeditor.js"></script>
				 <script type="text/javascript" src="../../libs/ckeditor/adapters/jquery.js"></script>
				<script src="../../libs/js/lib/bootstrap.min.js"></script>

				<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

				<script src="../../libs/js/custom/app.js"></script>
				<script type="text/javascript" src="../../libs/js/custom/read-articles.js"></script>
				<script type="text/javascript" src="../../libs/js/custom/create-article.js"></script>
				<script type="text/javascript" src="../../libs/js/custom/read-one-article.js"></script>
				<script type="text/javascript" src="../../libs/js/custom/update-article.js"></script>
				<script type="text/javascript" src="../../libs/js/custom/delete-article.js"></script>
				<script type="text/javascript" src="../../libs/js/custom/articles.js"></script>
				<script type="text/javascript" src="../../libs/js/custom/search-article.js"></script>
			</body>
		</html>
		<?php
	}


	function display_html_navbar($title){
		// display navbar of page
		?>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
				    <div class="navbar-header">
				      <a class="navbar-brand" href="#">ThaiFood</a>
				    </div>
				    <ul class="nav navbar-nav">
				      <li><a href="index.php">Home</a></li>
				      <li class="dropdown">
					      	<a class="dropdown-toggle" data-toggle="dropdown" href="">
					      		Articles<span class="caret"></span>
					      	</a>
							<ul class="dropdown-menu">
					          	<li><a href="#">Page 1-1</a></li>
					          	<li><a href="#">Page 1-2</a></li>
					          	<li><a href="#">Page 1-3</a></li>
					        </ul>
				      </li>

				      <li><a href="">Category</a></li>

				  
				    </ul>
				    <ul class="nav navbar-nav navbar-right">
				    	<?php
							if(isset($_SESSION['valid_user'])){
								// echo ' <li><a href="layout_logout.php" ><span class="glyphicon glyphicon-user"></span> Logout</a></li>';
								?>
								<ul class="nav navbar-nav navbar-right">
								    <li <?php echo $title=="Edit Profile" ? "class='active'" : ""; ?>>
								        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								            &nbsp;&nbsp;<?php echo $_SESSION['valid_user']; ?>
								            &nbsp;&nbsp;<span class="caret"></span>
								        </a>
								        <ul class="dropdown-menu" role="menu">
								            <li><a href="layout_logout.php">Logout</a></li>
								        </ul>
								    </li>
								</ul>
								<?php
							}else{
								echo ' <li><a href="layout_register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
								echo '<li><a href="layout_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
							}
				     	
				      ?>
				    </ul>
				</div>
			</nav>
		<?php

	}

	function display_login_form(){
		// display login form 
		?>
			<div class='col-sm-6 col-md-4 col-md-offset-4'>
					 <div class="alert alert-danger" id="error" style="display: none;">
					 </div> 
					   <div class='account-wall'>
					        <div class='tab-content'>
					            <div class='tab-pane active' >
					                <img class='profile-img' src='../../libs/images/login_icon.png'>

					               
					               <form class='form-signin' id="login-form" action='' method='post'>

					               		<span class="error" id="usernameErr"></span>
					                    <input type='text' name='username' id="username" class='form-control' placeholder='Username' autofocus />
					                    
										<span class="error" id="passErr"></span>
					                   <input type='password' name='password' id="password" class='form-control' placeholder='Password' />
					                   

					                   <input type='submit' id="loginform" name="submit" class='btn btn-lg btn-primary btn-block' value='Log In' />

					                </form>

					            </div>
					        </div>
					        <p class="text-center">New here?<a href="layout_register.php"> Create an account</a></p>
					    </div>
					 
					</div>
		<?php
	}

	 function display_register_form(){
	 	// display register form
	 	?>
	 		<form action='' id="register-form" method='post' >
	 					 
	 					    <table class='table table-responsive'>
	 					 
	 					       
	 					      
	 					 	
		 					 	<tr>
		 					 	    <td>Username</td>
		 					 	    <td><input type='text' name='username' id="username" class='form-control'/>
		 					 	    	<span class="error" id="usernameErr"></span>
		 					 	    </td>
		 					 	  
		 					 	</tr>	 					 		 					        
	 					 
	 					        <tr>
	 					            <td>Email</td>
	 					            <td><input type='text' name='email' id="email" class='form-control'/>
	 					            	<span class="error" id="emailErr"></span>
	 					            </td>
	 					          
	 					        </tr>
	 					 		
	 					        <tr>
	 					            <td>Password</td>
	 					            <td><input type='password' name='password' id="password" class='form-control'>
	 					            	<span class="error" id="passErr"></span>
	 					            </td>
	 					           
	 					        </tr>
	 					 
	 					        <tr>
	 					            <td></td>
	 					            <td>
	 					                <button type="submit" id ="registerform" class="btn btn-primary">
	 					                    <span class="glyphicon glyphicon-plus"></span> Register
	 					                </button>
	 					            </td>
	 					        </tr>
	 					 
	 					    </table>
	 					</form>
	 	<?php
	 }


	 function create_html_Article(){
	 	?>
	 	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
		    <table class='table table-hover table-responsive table-bordered'>
		 
		        <tr>
		            <td>TieuDe</td>
		            <td><textarea class="form-control" rows = "5" name="title"></textarea></td>
		        </tr>
		 
		        <tr>
		            <td>TomTat</td>
		            <td><textarea class="form-control" rows = "7" name="description"></textarea></td>
		        </tr>
		 
		        <tr>
		            <td>Content</td>
		            <td><textarea id="post_content" name='content' class='form-control' rows="10"></textarea></td>
		        </tr>
		 		<tr>
		            <td>Img Url</td>
		            <td><textarea  name='img_url' class='form-control' ></textarea></td>
		        </tr>
		        <tr>
		            <td>Loai Tin</td>
		            <td>
		            <!-- categories from database will be here -->
		            </td>
		        </tr>
		 
		        <tr>
		            <td></td>
		            <td>
		                <button id="submit" type="submit" class="btn btn-primary">Create</button>
		            </td>
		        </tr>
		 
		    </table>
		</form>
	 	<?php
	 }
	 
 ?>