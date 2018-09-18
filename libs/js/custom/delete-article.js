$(document).ready(function(){
 
    // will run if the delete button was clicked
    $(document).on('click', '.delete-article-button', function(){

        // get the article id 
        var article_id = $(this).attr('data-id');


        // bootbox for good looking 'confirm pop up'
        bootbox.confirm({
         
            message: "<h4>Are you sure?</h4>",
            buttons: {
                confirm: {
                    label: '<span class="glyphicon glyphicon-ok"></span> Yes',
                    className: 'btn-danger'
                },
                cancel: {
                    label: '<span class="glyphicon glyphicon-remove"></span> No',
                    className: 'btn-primary'
                }
            },
            callback: function (result) {
                if(result==true){
                 
                    // send delete request to api / remote server
                    $.ajax({
                        url: "../controller/api/article/deleteArticle.php",
                        type : "POST",
                        dataType : 'json',
                        data : JSON.stringify({ id: article_id }),
                        success : function(result) {
                 
                            // re-load list of articles
                            showarticlesFirstPage();
                        },
                        error: function(xhr, resp, text) {
                            console.log(xhr, resp, text);
                        }
                    });
                 
                }
            }
        });
         // chage page title
            changePageTitle("Delete article");
    });
});