<?php 
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	require_once '../../../../config/database.php';
	require_once '../../../../user/model/category.php';

	$db = new Database();
	$db->getConnect();

	$cate = new Category($db->getConn());
	
	$stmt = $cate->getCategory();

	$num = $stmt->rowCount();

	if($num>0){
		$cate_arr = array();
		$cate_arr["records"] = array();

		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			
			$cate_item = array(
				"id" =>$c_id,
				"name" =>$Ten

			);
			array_push($cate_arr["records"],$cate_item);
		}
		echo json_encode($cate_arr);
	}else{
		echo json_encode(array("message"=>"No articles found."));
	}
 ?>