
			<div class="col-md-8 col-8">
			<?php
				$row = $c_content->C_getOneCategory($idtheloai);
				extract($row);
			?>
				<h2><?php echo $Ten; ?></h2>

				<div class="tin-1">

					<div class="tin-left">
						<div class="tin-con">
						<?php

							$row = $c_content->C_get_New_Article_Cate($idtheloai);
							extract($row);
							?>
								<div class="tin-img" id="img">
									<a href="layout_main.php?p=tinchitiet&id=<?php echo $id; ?>">
										<img class="img-responsive" src="../../libs/images/<?php echo $Hinh; ?>" alt="anh">
									</a>
								</div>
								<div class="tin-content">
									
										<a href="layout_main.php?p=tinchitiet&id=<?php echo $id; ?>"><h2><?php echo $TieuDe; ?></h2></a>
									
									<p><?php echo $TomTat; ?></p>
								</div>
							<?php
						?>
							
						</div>
					</div>

					<div class="tin-right">
					<?php
						$stmt = $c_content->C_get_five_New_Article_Cate($idtheloai);
						
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
							extract($row);
							?>
								<div class="tin-11">
									<div class="right-img">
										<a href="layout_main.php?p=tinchitiet&id=<?php echo $id; ?>">
											<img class="img-responsive" src="../../libs/images/<?php echo $Hinh;?>" alt="anh">
										</a>
									</div>
									<div class="right-content">
										
											<a href="layout_main.php?p=tinchitiet&id=<?php echo $id; ?>"><h4><?php echo $TieuDe; ?></h4></a>
										
									</div>
								</div>
							<?php 
						}
					?>
						
						
					</div>
				</div>

					<?php 

						$records_per_page = 6;
						
						$total_rows =  $c_content->C_count_Article_Cate($idtheloai);
					
						$from_record_num = ($records_per_page * $page) ;

						
						$stmt = $c_content->C_getArticle_Cate($idtheloai, $from_record_num, $records_per_page);
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
							extract($row);
							?>
								<div class="tin-2 tin-3">
									<div class="tin-2-total">
									
										<div class="tin-2-left">

											<a href="layout_main.php?p=tinchitiet&id=<?php echo $id; ?>">
												<img class="imga img-responsive" src="../../libs/images/<?php echo $Hinh;?>" alt="anh">
											</a>

										</div>

										<div class="tin-2-right">
											
												<a href="layout_main.php?p=tinchitiet&id=<?php echo $id; ?>"><h4><?php echo $TieuDe; ?></h4></a>
												
											

											<p class="tin-2-p"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $created_at; ?></p>

											<p class="tin-2-p1"><?php echo $TomTat; ?></p >
										</div>
									</div>
								</div>
							<?php
						}
					 ?>

				<?php
					$page_url = "layout_main.php?p=theloai&idtheloai=$idtheloai&";
					include_once "paging.php";
				
				?>
			</div>
		