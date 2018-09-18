$(document).ready(function(){
 
    // when a 'search articles' button was clicked
    $(document).on('submit', '#search-article-form', function(){
 
        // get search keywords
        var keywords = $(this).find(":input[name='keywords']").val();
 
        // get data from the api based on search keywords
        $.getJSON("http://localhost/web_developer/phplesson/news/news/admin/controller/api/article/searchArticle.php?s=" + keywords, function(data){
 
            // template in articles.js
            readarticlesTemplate(data, keywords);
 
            // chage page title
            changePageTitle("Search articles: " + keywords);
 
        });
 
        // prevent whole page reload
        return false;
    });
 
});