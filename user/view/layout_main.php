<?php
	require_once "../../config/database.php";
	require_once "../controller/article_fns.php";
	session_start();
	$db = new Database();
	$db->getConnect();

	$p = isset($_GET['p']) ? $_GET['p']  : "" ;

	$idtheloai = isset($_GET['idtheloai']) ? $_GET['idtheloai']  : "" ;
	$idloaitin = isset($_GET['idloaitin']) ? $_GET['idloaitin']  : "" ;
	$id = isset($_GET['id']) ? $_GET['id']  : "" ;
	
	$page = isset($_GET['page']) ? $_GET['page'] : "1";
	
	$c_content = new C_Article($db->getConn());


	$title = "Cafebiz";
	// display header htmtl
	include_once "layout_header.php";
	//display navigation
	include_once "layout_navigation.php";
	?>
		<div class="content-total right">
			<div class="container">
				<div class="row">
	<?php
	switch ($p) {
		case 'theloai':
			include_once "layout_category.php";
			break;

		case 'loaitin':
			include_once "layout_subcategory.php";
			break;

		case 'tinchitiet':
			include_once "layout_detail.php";
			break;

		default:
			include_once "layout_home.php";
			break;
	}

	include_once "layout_side_right.php";
	?>
			</div>
		</div>
	</div>
	<?php
	// display footer html
	include_once "layout_footer.php";
	

?>