<div class="menu">
	<div class="container">
		<div class="menu-total">
			<div class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mymenu" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="mymenu">
						<ul class="nav navbar-nav menu-header">
							<li class="nav-li1"><a href="layout_main.php" class="hvr-overline-from-left">home</a></li>
							<?php 
								$stmt = $c_content->C_getCategory();
								while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
									extract($row);
									$categoryid = $c_id;
									
									?>
										<li class="dropdown">
											<a class="dropbtn" href="layout_main.php?p=theloai&idtheloai=<?php echo $c_id; ?>" class="hvr-overline-from-left"><?php echo $Ten; ?>	
											</a>

											<div class="dropdown-content">
												<?php 
													
													$stmtsub = $c_content->C_getSubCategory($categoryid);
													while($rowsub = $stmtsub->fetch(PDO::FETCH_ASSOC)){
														extract($rowsub);
														?>
															<a href="layout_main.php?p=loaitin&idloaitin=<?php echo $sc_id; ?>">
																<?php echo $Ten; ?>
																
															</a>
														<?php
													}
												?>
												
								  			
											</div>
										</li>
									<?php
									
								}
							?>
							
						</ul>
						<div class="contact">
							<p>HOTLINE</p>
							<p class="contact-p"><a href="tel:0906999999">0906 999 999</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>