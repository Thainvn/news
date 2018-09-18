<?php
        // required headers
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
         
        // include database and object files
        include_once '../../../../config/core.php';
        include_once '../shared/Utilities.php';
        include_once '../../../../config/database.php';
        include_once '../../../../user/model/article.php';
         
        // utilities
        $utilities = new Utilities();
         
        // instantiate database and articles object
        $db = new Database();
        $db ->getConnect();
         
        // initialize object
        $articles = new Article($db->getConn());
         
        // query articless
        $stmt = $articles->get_Article($from_record_num, $records_per_page);
        $num = $stmt->rowCount();
         
        // check if more than 0 record foundcountArticles
        if($num>0){
         
            // articless array
            $articless_arr=array();
            $articless_arr["records"]=array();
            $articless_arr["paging"]=array();
         
            // retrieve our table contents
            // fetch() is faster than fetchAll()
            // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                // extract row
                // this will make $row['name'] to
                // just $name only
                extract($row);
         
                $articles_item=array(
                    "id" => $id,
                    "title" => $TieuDe,
                    "description" => html_entity_decode($TomTat),
                    "content" => $NoiDung,
                    "sub_category_id" => $idLoaiTin,
                    "sub_category_name" => $Ten,
                    "image" => $Hinh
                );
         
                array_push($articless_arr["records"], $articles_item);
            }
         
         
            // include paging
            $total_rows=$articles->countArticles();
            $page_url="{$home_url}read_paging.php?";
            $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
            $articless_arr["paging"] = $paging;
         
            echo json_encode($articless_arr);
        }
         
        else{
            echo json_encode(

                array("message" => "No articless found.")

            );
        }
?>