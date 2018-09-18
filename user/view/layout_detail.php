<?php
	if(!isset($_SESSION['user'])){
		
		 $c_content->C_updateView($id);

	}else{
		$_SESSION['user'] = 1;
	}
?>

<div class="col-md-8 col-8">
<?php
	$row = $c_content->C_getArticle($id);
	extract($row);

?>
	<h2>
		<?php echo $TieuDe; ?>
	</h2>
	<span>
		<?php echo $created_at; ?>
	</span>
	<span>
		
	</span>
	<h4 style="margin-bottom: 30px;">
		<?php echo $TomTat; ?>
	</h4>
	<img class="img-responsive" style="width:600px;height:375px;" src="../../libs/images/<?php echo $Hinh; ?>">
	<div style="margin-top: 30px">
		<div>
			<?php echo $NoiDung; ?>
		</div>
		<span>
			<?php echo $SoLuotXem; ?>
		</span>
	</div>
</div>