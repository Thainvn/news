<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
 
		// include database and object file
		require_once '../../../../config/database.php';
		require_once '../../../../user/model/article.php';
	 
		$db = new Database();
		$db->getConnect();

		$article = new Article($db->getConn());
		// get posted data
		$data = json_decode(file_get_contents("php://input"));

		 
		// set product id to be deleted
		$article->setId($data->id); 
		 
		// delete the product
		
		if($article->deleteArticle()){
		    echo '{';
		        echo '"message": "success"';
		    echo '}';
		}
		 
		// if unable to delete the product
		else{
		    echo '{';
		        echo '"message": "fail"';
		    echo '}';
		}
?>