$(document).ready(function(){
 
    // handle 'read one' button click
    $(document).on('click', '.read-one-article-button', function(){
        // get product id
        var id = $(this).attr('data-id');
        // read product record based on given ID
        $.getJSON("http://localhost/web_developer/phplesson/news/news/admin/controller/api/article/readArticle.php?id=" + id, function(data){
            // start html
            var read_one_article_html="";
             
            // when clicked, it will show the product's list
            read_one_article_html+="<div id='read-products' class='btn btn-primary pull-right m-b-15px read-article-button'>";
                read_one_article_html+="<span class='glyphicon glyphicon-list'></span> Read Products";
            read_one_article_html+="</div>";

            // product data will be shown in this table
            read_one_article_html+="<table class='table table-bordered table-hover'>";
             
                // product name
                read_one_article_html+="<tr>";
                    read_one_article_html+="<td class='w-30-pct'>Id</td>";
                    read_one_article_html+="<td class='w-70-pct'>" + data.id + "</td>";
                read_one_article_html+="</tr>";
             
                // product price
                read_one_article_html+="<tr>";
                    read_one_article_html+="<td>Title</td>";
                    read_one_article_html+="<td>" + data.title + "</td>";
                read_one_article_html+="</tr>";
             
                // product description
                read_one_article_html+="<tr>";
                    read_one_article_html+="<td>Description</td>";
                    read_one_article_html+="<td>" + data.description + "</td>";
                read_one_article_html+="</tr>";

             	// product content
             	read_one_article_html+="<tr>";
             	    read_one_article_html+="<td>Content</td>";
             	    read_one_article_html+="<td>" + data.content + "</td>";
             	read_one_article_html+="</tr>";

                // product category name
                read_one_article_html+="<tr>";
                    read_one_article_html+="<td>Category</td>";
                    read_one_article_html+="<td>" + data.sub_category_name + "</td>";
                read_one_article_html+="</tr>";

                read_one_article_html+="<tr>";
                    read_one_article_html+="<td>Image</td>";
                    read_one_article_html+="<td><img src=\"../../libs/images/"+ data.Image + "\" width='25%'></td>";
                read_one_article_html+="</tr>";

            read_one_article_html+="</table>";
            // inject html to 'page-content' of our app
			$("#page-content").html(read_one_article_html);
        });
         // chage page title
            changePageTitle("Read article");
    });
 
});