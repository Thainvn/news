
				<div class="col-md-4 col-bar">
					<div class="sid">
	<!--sid1-quảng cáo-->
						<div class="sid1">
							<a href="#"><img class="img-responsive" src="../../libs/images/bar-1.jpg" alt="anh"></a>
						</div>
	<!--sid2 nội dung-->							
						<div class="sid2">
							<div class="sid2-title">
								<h3>Đọc nhiều nhất</h3>
							</div>
							<div class="sid2-content tin-right">
								<?php
									$stmt = $c_content->C_hot_Article();
									
									while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
										extract($row);
										?>
											<div class="tin-11">
												<div class="right-img">
													<a href="layout_main.php?p=tinchitiet&id=<?php echo $id; ?>">
														<img class="img-responsive" src="../../libs/images/<?php echo $Hinh; ?>" alt="anh">
													</a>
												</div>
												<div class="right-content">
													<h4><a href="layout_main.php?p=tinchitiet&id=<?php echo $id; ?>"><?php echo $TieuDe; ?></a></h4>
												</div>
											</div>

										<?php
									}
								?>
								
								
								
								

							</div>
						</div>
	<!--sid3 theo dõi mạng xã hộ-->							
						<div class="sid3">
							<div class="sid2-title">
								<h3>theo dõi chúng tôi</h3>
							</div>
							<div class="sid3-Page">
								<ul class="nav nav-pills sid3-icon">
									<li  class="page-1"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li  class="page-2"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
									<li  class="page-3"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li  class="page-4"><a href="#"><i class="fa fa-camera-retro" aria-hidden="true"></i></a></li>
									<li  class="page-5"><a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
	<!--sid4  bộ sưu tập -->							
						<div class="sid2">
							<div class="sid2-title">
								<h3>Nổi Bật</h3>
							</div>
							<div class="sid2-content tin-right">
								<?php
									$stmt = $c_content->C_impressArticle();
									
									while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
										extract($row);
										?>
											<div class="tin-11">
												<div class="right-img">
													<a href="layout_main.php?p=tinchitiet&id=<?php echo $id; ?>">
														<img class="img-responsive" src="../../libs/images/<?php echo $Hinh; ?>" alt="anh">
													</a>
												</div>
												<div class="right-content">
													<h4><a href="layout_main.php?p=tinchitiet&id=<?php echo $id; ?>"><?php echo $TieuDe; ?></a></h4>
												</div>
											</div>

										<?php
									}
								?>
								
								
								
								

							</div>
						</div>
	<!--sid5  quảng cáo-->									
						<div class="sid5">
							<div class="sid4-title">
								<a href="#"><img class="img-responsive" src="../../libs/images/bar4-5.jpg" alt="anh"></a>
							</div>
						</div>
					</div>
				</div>
			