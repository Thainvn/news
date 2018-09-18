$(document).ready(function(){
 
    // show html form when 'create article' button was clicked
    $(document).on('click', '.create-article-button', function(){
       // load list of categories
       $.getJSON("http://localhost/web_developer/phplesson/news/news/admin/controller/api/subcate/readSubCategory.php", function(data){
        	// build categories option html
        	// loop through returned list of data
        	var categories_options_html="";

        	categories_options_html+="<select name='sub_category_id' class='form-control'>";

        	$.each(data.records, function(key, val){
        	    categories_options_html+="<option value='" + val.id + "'>" + val.name + "</option>";
        	});
        	categories_options_html+="</select>";

        	// we have our html form here where article information will be entered
        	// we used the 'required' html5 property to prevent empty fields
        	var create_article_html="";
        	 
        	// 'read articles' button to show list of articles
        	create_article_html+="<div id='read-articles' class='btn btn-primary pull-right m-b-15px read-article-button'>";
        	    create_article_html+="<span class='glyphicon glyphicon-list'></span> Read articles";
        	create_article_html+="</div>";


        	// 'create article' html form
        	create_article_html+="<form id='create-article-form' action='#' method='post' border='0' enctype='multipart/form-data'>";
        	    create_article_html+="<table class='table table-hover table-responsive table-bordered'>";
        	 
        	        // title field
        	        create_article_html+="<tr>";
        	            create_article_html+="<td>Title</td>";
        	            create_article_html+="<td><input type='text' name='title' class='form-control' required /></td>";
        	        create_article_html+="</tr>";
        	 
        	        
        	        // description field
        	        create_article_html+="<tr>";
        	            create_article_html+="<td>Description</td>";
        	            create_article_html+="<td><textarea name='description' rows ='5' class='form-control' required></textarea></td>";
        	        create_article_html+="</tr>"; 

        	         // content field
        	        create_article_html+="<tr>";
        	            create_article_html+="<td>Content</td>";
        	            create_article_html+="<td><textarea id='content' name='content' rows ='12' class='form-control' required></textarea></td>";
        	        create_article_html+="</tr>";
        	 

        	 		// title field
        	 		create_article_html+="<tr>";
        	 		    create_article_html+="<td>Url Img</td>";
        	 		    create_article_html+="<td><input type='file' name='url_img' class='form-control' required /></td>";
        	 		create_article_html+="</tr>";
        	 		

        	        // categories 'select' field
        	        create_article_html+="<tr>";
        	            create_article_html+="<td>Category</td>";
        	            create_article_html+="<td>" + categories_options_html + "</td>";
        	        create_article_html+="</tr>";
        	 
        	        // button to submit form
        	        create_article_html+="<tr>";
        	            create_article_html+="<td></td>";
        	            create_article_html+="<td>";
        	                create_article_html+="<button type='submit' id='create_article' class='btn btn-primary'>";
        	                    create_article_html+="<span class='glyphicon glyphicon-plus'></span> Create article";
        	                create_article_html+="</button>";
        	            create_article_html+="</td>";
        	        create_article_html+="</tr>";
        	 
        	    create_article_html+="</table>";
        	create_article_html+="</form>";
        	// inject html to 'page-content' of our app
			$("#page-content").html(create_article_html);
			$("#content").ckeditor();
       });
        // chage page title
            changePageTitle("Create article");
    });
 


    // will run if create product form was submitted
		$(document).on('click', '#create_article', function(event){
			event.preventDefault();

            // get form data
            var form = $("#create-article-form")[0];
            var formData = new FormData(form);

		
		    // submit form data to api
		  $.ajax({

                url: '../controller/api/article/createArticle.php',
                type: "POST",
				data :formData,
                cache:false,
                contentType: false,
                processData: false,

				success:function(data){
                    
			     alert(data.message);
                    // re-load list of articles
                    showarticlesFirstPage();
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
			});
		  

		});

});