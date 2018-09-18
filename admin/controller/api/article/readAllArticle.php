<?php 
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	require_once '../../../../config/database.php';
	require_once '../../../../user/model/article.php';

	$db = new Database();
	$db->getConnect();

	$articles = new Article($db->getConn());
	$total_rows =  $articles->countArticles();
	
	// $records_per_page = 6;
	// $from_record_num = ($records_per_page * $page) - $records_per_page;

	// $stmt = $articles->get_Articles($from_record_num,$records_per_page);
	$stmt = $articles->get_Articles();

	$num = $stmt->rowCount();
	if($num>0){
		$news_arr = array();
		$news_arr["records"] = array();

		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$new_item = array(
				"id" =>$id,
				"title" =>html_entity_decode($TieuDe),
				"description" =>html_entity_decode($TomTat),
				"content"=>$NoiDung,
				"sub_category_id" =>$idLoaiTin,
				"sub_category_name" =>$Ten,
				"image" => $Hinh

			);
			array_push($news_arr["records"],$new_item);
		}
		echo json_encode($news_arr);
	}else{
		echo json_encode(array("message"=>"No articles found."));
	}
 ?>