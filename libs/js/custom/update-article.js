$(document).ready(function(){
 
    // show html form when 'update article' button was clicked
    $(document).on('click', '.update-article-button', function(){


        // get article id
        var id = $(this).attr('data-id');


        // read one record based on given article id
        $.getJSON("../controller/api/article/readArticle.php?id=" + id, function(data){
         
            // values will be used to fill out our form
            var title = data.title;
            var description = data.description;
            var content = data.content;
            var img_url = data.Image;
            var sub_category_name = data.sub_category_name;
            var sub_category_id = data.sub_category_id;
             
            // load list of categories
            $.getJSON("../controller/api/subcate/readSubCategory.php", function(data){
             
                // build 'categories option' html
                // loop through returned list of data
                var categories_options_html="";
                categories_options_html+="<select name='sub_category_id' class='form-control'>";
             
                $.each(data.records, function(key, val){
                     
                    // pre-select option is category id is the same
                    if(val.id==sub_category_id){
                        categories_options_html+="<option value='" + val.id + "' selected>" + val.name + "</option>";
                    }
             
                    else{
                        categories_options_html+="<option value='" + val.id + "'>" + val.name + "</option>";
                    }
                });
                categories_options_html+="</select>";
                 


                // store 'update article' html to this variable
                var update_article_html="";
                 
                // 'read articles' button to show list of articles
                update_article_html+="<div id='read-articles' class='btn btn-primary pull-right m-b-15px read-article-button'>";
                    update_article_html+="<span class='glyphicon glyphicon-list'></span> Read articles";
                update_article_html+="</div>";



                // build 'update article' html form
                // we used the 'required' html5 property to prevent empty fields
                update_article_html+="<form id='update-article-form' action='#' method='post' border='0' enctype='multipart/form-data'>";
                    update_article_html+="<table class='table table-hover table-responsive table-bordered'>";
                 
                        // name field
                        update_article_html+="<tr>";
                            update_article_html+="<td>Title</td>";
                            update_article_html+="<td><input value=\"" + title + "\" type='text' name='title' class='form-control' required /></td>";
                        update_article_html+="</tr>";
                 
                       // description field
                       update_article_html+="<tr>";
                           update_article_html+="<td>Description</td>";
                           update_article_html+="<td><textarea name='description' class='form-control' required>" + description + "</textarea></td>";
                       update_article_html+="</tr>";
                 
                        // description field
                        update_article_html+="<tr>";
                            update_article_html+="<td>Content</td>";
                            update_article_html+="<td><textarea id='content' name='content' class='form-control' required>" + content + "</textarea></td>";
                        update_article_html+="</tr>";
                 		

                        update_article_html+="<tr>";
                            update_article_html+="<td>Image</td>";
                            update_article_html+="<td><img src=\"../../libs/images/"+ img_url + "\" width='25%'> <input value=\"" + img_url + "\" type='file' name='img_url' class='form-control' required /></td>";
                        update_article_html+="</tr>";

                        // categories 'select' field
                        update_article_html+="<tr>";
                            update_article_html+="<td>Category</td>";
                            update_article_html+="<td>" + categories_options_html + "</td>";
                        update_article_html+="</tr>";
                 
                        update_article_html+="<tr>";
                 
                            // hidden 'article id' to identify which record to update
                            update_article_html+="<td><input value=\"" + id + "\" name='id' type='hidden' /></td>";
                 
                            // button to submit form
                            update_article_html+="<td>";
                                update_article_html+="<button type='submit' id='update_article' class='btn btn-info'>";
                                    update_article_html+="<span class='glyphicon glyphicon-edit'></span> Update article";
                                update_article_html+="</button>";
                            update_article_html+="</td>";
                 
                        update_article_html+="</tr>";
                 
                    update_article_html+="</table>";
                update_article_html+="</form>";
                // inject to 'page-content' of our app
                $("#page-content").html(update_article_html);
                 $("#content").ckeditor();
            });
        });
            // chage page title
            changePageTitle("Update articles");
    });
      

    // will run if 'create article' form was submitted
    $(document).on('click', '#update_article', function(event){
         event.preventDefault();

        // get form data
        var form_data=$("#update-article-form").serialize();
       
        // submit form data to api
        $.ajax({
            url: "../controller/api/article/updateArticle.php",
            type : "POST",      
            data : form_data,
            success : function(data) {

                // article was created, go back to articles list
               
                showarticlesFirstPage();

            },

            error: function(data) {
               alert("Fail");
            }

        });
         
        return false;
    });
});