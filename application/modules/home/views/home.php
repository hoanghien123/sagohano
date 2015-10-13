<div class="logo_search">
		<div class="containner">
			<div class="logo"><a href=''><img src='public/site/images/logo.PNG' /></a></div>
			<div class="search">
				<form action="" method="POST">
					<div class="select">
						<select name='type_search'>
							<option value='1'>Sản phẩm</option>
							<option value='2'>Nhà cung cấp</option>
							<option value='3'>Người mua</option>
						</select>
					</div>
					<div class="input">
						<input type='text' name="keywords_search" placeholder="Bạn đang cần tìm sản phẩm gì  ?" />
					</div>
					<div class="submit">
						<input type='submit' value="Tìm" />
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="containner">
			<div class="top_content">
				<div class="categories_menu">
					<p class="title">Danh mục sản phẩm</p>
					<ul>
						<li class="li0"><a href=''>Quần áo , May mặc , Phụ kiện thời trang</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class="li1"><a href=''>Giày dép , Túi xách , Phụ kiện</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class="li2"><a href=''>Thực phẩm & Nông nghiệp</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class="li3"><a href=''>Bao bì , In ấn , Văn phòng phẩm</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class="li4"><a href=''>Điện tử tiêu dùng , Thiết bị văn phòng & dịch vụ</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class="li5"><a href=''>Trang thiết bị , Link kiện điện tử & viễn thông</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class="li6"><a href=''>Mỹ phẩm & Y tế</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class="li7"><a href=''>Đồ chơi , Quà tặng , Thiết bị thể thao</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class="li8"><a href=''>Nhà ở , Xây dựng , Đèn trang trí</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class="li9"><a href=''>Nhựa , cao su , kim loại & hóa chất</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class="li10"><a href=''>Máy móc , linh kiện , dụng cụ cơ khí</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class="li11"><a href=''>Phương tiện giao thông , Linh kiện , phụ tùng xe cộ</a>
							<ul></ul>
							<span class="muiten"></span>
						</li>
						<li class='view_more'><a href=''>Tất cả danh mục ...</a></li>
					</ul>

				</div>

				<div class="banner_right">
					<div class="banner_slide">
						<img src='public/site/images/banner_2.PNG' />
					</div>
					<div class="banner_bottom">
						<a href=''>Gửi yêu cầu báo giá ngay <span></span></a>
					</div>
				</div>
			</div>

			<div class="block1">
				<ul>
					<li><p>Kiểm duyệt công ty</p><span style="color:#27c">Trở thành nhà cung cấp hạng 1</span></li>
					<li><p>Gửi yêu cầu báo giá</p></li>
					<li><p>Chát trực tuyến</p><span style="color:#ff3300">Nhà cung cấp đã được kiểm duyệt</span></li>
					<li><p>Trung tâm sản xuất</p><span style="color:#666">Các ngành theo vùng miền</span></li>
				</ul>
			</div>

			<div class="block2">
				<div class="left_block">
					<h2>Hàng Bán Sỉ</h2>
					<h3>Số lượng đơn hàng tối thiểu thấp</h3>
					<p>Thanh toán an toàn ngay để nhận được hàng sớm nhất</p>
					<a href=''>Xem chi tiết</a>
				</div>
				<div class="right_block">
					<ul class="bxslider1">
						<?php 
						for ($i=0; $i < 12; $i++) { 
						?>
						<li>
							<a href='#'><div class="images"></div></a>
							<h3><a href=''>Đồng hồ thông minh Ecktech</a></h3>
							<p><b>Giá :</b> <i>600,000 VNĐ</i> /cái</p>
							<p><b>Tối thiểu :</b> 10 cái</p>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>

			<div class="block3">
				<div class="left_block">
					<h2>Thành viên cao cấp</h2>
					<p>Các nhà cung cấp đã được Sagohano.com kiểm duyệt và lựa chọn kỹ càng</p>
					<a href=''>Xem chi tiết</a>
				</div>
				<div class="right_block">
					<ul class="bxslider1">
						<?php 
						for ($i=0; $i < 12; $i++) { 
						?>
						<li>
							<h3><a href=''><b>100+</b> Nhà cung cấp màng co màng nhựa</a></h3>
							<p>TPHCM</p>
							<a href='#'><div class="images"></div></a>
						</li>
						<?php } ?>
					</ul>
				</div>
				<div class="bottom_block"><a>Nhà cung cấp theo vùng miền : </a><a href=''>TP.Hồ Chí Minh</a><a href=''>Hà Nội</a><a href=''>Đà Nẵng</a><a href=''>Cà mau</a><a href=''>Huế</a><a href=''>Vũng Tàu</a><a href=''>Nha Trang</a><a href=''>Vùng miền khác...</a></div>
			</div>

			<div class="block4">
				<h2>Các sản phẩm được yêu cầu báo giá nhiều nhất</h2>
				<ul class="bxslider1">
						<?php 
						for ($i=0; $i < 12; $i++) { 
						?>
						<li>
							<a href='#'><div class="images"></div></a>
							<h3><a href=''>Bàn phím không dây</a></h3>
						</li>
						<?php } ?>
					</ul>
			</div>
		</div>
	</div>

<script>
    $(document).ready(function(){
	    $('.bxslider1').bxSlider({
	        minSlides: 4,
	        maxSlides: 4,
	        slideWidth: 280,
	        slideMargin: 10,
	        auto: true
	    });
    });
</script>