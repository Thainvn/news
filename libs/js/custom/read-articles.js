$(document).ready(function(){
 
    // show list of article on first load
    showarticlesFirstPage();
 
    // when a 'read articles' button was clicked
    $(document).on('click', '.read-article-button', function(){
        showarticlesFirstPage();
    });
 
    // when a 'page' button was clicked
    $(document).on('click', '.pagination li', function(){
        // get json url
        var json_url=$(this).find('a').attr('data-page');
 
        // show list of articles
        showarticles(json_url);
    });
 
 
});
 
    function showarticlesFirstPage(){
        var json_url="http://localhost/web_developer/phplesson/news/news/admin/controller/api/article/read_paging.php";
        showarticles(json_url);
    }
 
    // function to show list of articles
    function showarticles(json_url){
     
        // get list of articles from the API
        $.getJSON(json_url, function(data){
     
            // html for listing articles
            readarticlesTemplate(data, "");
     
            // chage page title
            changePageTitle("Read articles");
     
        });
    }