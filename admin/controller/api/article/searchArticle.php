<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
    require_once '../../../../config/database.php';
    require_once '../../../../user/model/article.php';

    $db = new Database();
    $db->getConnect();

    $article = new Article($db->getConn());
 
    // get keywords
    $keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
    // query products
    $stmt = $article->search($keywords);
    $num = $stmt->rowCount();
 
        // check if more than 0 record found
        if($num>0){
         
            // products array
            $articles_arr=array();
            $articles_arr["records"]=array();
         
            // retrieve our table contents
            // fetch() is faster than fetchAll()
            // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                // extract row
                // this will make $row['name'] to
                // just $name only
                extract($row);
         
                $article_item=array(
                    "id" => $id,
                    "title" => $TieuDe,
                    "description" => html_entity_decode($TomTat),
                    "content" => html_entity_decode($NoiDung),
                    "sub_category_id" => $idLoaiTin,
                    "sub_category_name" => $Ten,
                    "image" => $Hinh
                );
         
                array_push($articles_arr["records"], $article_item);
            }
         
            echo json_encode($articles_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No articles found.")
            );
        }
?>