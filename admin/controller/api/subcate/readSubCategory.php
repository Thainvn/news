<?php 
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	require_once '../../../../config/database.php';
	require_once '../../../../user/model/SubCategory.php';

	$db = new Database();
	$db->getConnect();

	$subcate = new SubCategory($db->getConn());
	
	$stmt = $subcate->get_SubCategory();

	$num = $stmt->rowCount();

	if($num>0){
		$subcate_arr = array();
		$subcate_arr["records"] = array();

		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			
			$subcate_item = array(
				"id" =>$sc_id,
				"name" =>$Ten

			);
			array_push($subcate_arr["records"],$subcate_item);
		}
		echo json_encode($subcate_arr);
	}else{
		echo json_encode(array("message"=>"No articles found."));
	}
 ?>