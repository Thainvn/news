$(document).ready(function(){
	// execute login in system
	$("#loginform").click(function(event){
		event.preventDefault();

		var username = $("#username").val();
		var password = $("#password").val();
		var error = true;

		 var data = $('#login-form').serialize(); 

		if(username == ""){
			$("#usernameErr").text("Username is required");
			error = false;
		}

		if(password == ""){
			$("#passErr").text("Password is required");
			error = false;
		}

		if(error ){
			$.ajax({
                url: '../controller/login.php',
                type: "POST",
				data :data,
				success:function(data){

					if(data == "admin"){
						
						window.location.href = "index.php";
						
					}else if(data == "user"){

						window.location.href = "../../user/view/layout_main.php";
						
					}
					else{
						
						var obj = JSON.parse(data);	
						
						if(obj.errora != undefined){

							$("#error").text(obj.errora);
							$("#error").css("display","block");
						}											
						 

						 $("#usernameErr").text(obj.usernameErr);
						 $("#passErr").text(obj.passErr);

					}

				}
			});
		}
	});



	// create new account
	$("#registerform").click(function(e){
		e.preventDefault();

		
		var username = $("#username").val();
		var email = $("#email").val();
		var password = $("#password").val();

		var error = true;
		var data = $('#register-form').serialize(); 

		if(username == ""){
			$("#usernameErr").text("Username is required");
			error = false;
		}

		
		if(email == ""){
			$("#emailErr").text("Email is required");
			error = false;
		}

		if(password == ""){
			$("#passErr").text("Password is required");
			error = false;
		}


		if(error){
			$.ajax({
				url :"../controller/register.php",
				type: "POST",
				data :data,
				success : function(data){
					
					if(data == "true"){
						
						window.location.href = "../../user/view/layout_main.php";
						
					}
					else{
						
						var obj = JSON.parse(data);	

						$("#emailErr").text(obj.emailErr);					
						$("#usernameErr").text(obj.usernameErr);
						$("#passErr").text(obj.passErr);
					}
				}

			});
		}
	});


	
});
	// change page title
	function changePageTitle(page_title){
	 
	    // change page title
	    $('#page-title').text(page_title);
	 
	    // change title tag
	    document.title=page_title;
	}
 