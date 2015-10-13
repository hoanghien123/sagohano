<?php echo $_doctype; ?>
<html>
    <head>
        <meta charset="utf-8">
        <?php echo $_title; ?>
		<base href="<?php echo base_url(); ?>" >
		<meta name="description" content="<?php echo $MetaDescription; ?>" />
		<meta name="keywords" content="<?php echo $MetaKeywords; ?>" />
		<link rel="stylesheet" type="text/css" href="public/site/css/style.css">
		<link rel='stylesheet' type='text/css' href='public/site/js/jquery.bxslider.css' media='screen' />
		 <?php echo $_styles; ?>
		<script src="public/site/js/jquery-1.7.2.min.js"></script>
		<script type='text/javascript' src='public/site/js/jquery.bxslider.min.js'></script>
		<?php echo $_scripts; ?>
		<meta name="robots" content="index,follow,all" />
		<meta name="revisit-after" content="1 days" />
		<meta name="language" content="Vietnamese" />
		<meta property="og:type" content="aricle" />
    </head>
    <body>
		<div class="menu_header">
			<div class="dk">Hãy <a href='<?php echo base_url().'dang-nhap' ?>'>Đăng ký</a> để góp phần xây dựng<br>nền doanh nghiệp <img src='public/site/images/vietnam.PNG' /> vững mạnh</div>
			<div class="containner">
				<div class="left_menu">
					<ul>
						<li><a href=''>Sagohano của tôi</a>
							<ul>
								<li><a href=''>Bảng báo giá</a></li>
								<li><a href=''>Thư yêu cầu báo giá</a></li>
								<li><a href=''>Sản phẩm ưa thích</a></li>
								<li><a href=''>Sản phẩm hợp nhu cầu</a></li>
								<li><a href=''>Hòm thư tin nhắn</a></li>
								<li class='title'><span>Mua hàng</span></li>
								<li><a href=''>Gửi yêu cầu báo giá</a></li>
								<li><a href=''>Quản lý đơn hàng</a></li>
								<li class='title'><span>Bán hàng</span></li>
								<li><a href=''>Đăng bán sản phẩm</a></li>
								<li><a href=''>Quản lý sản phẩm</a></li>
								<li><a href=''>Thư yêu cầu báo giá</a></li>
							</ul>
						</li>
						<li><a href=''>Bán hàng</a>
							<ul>
								<li><a href=''>Cấp độ thành viên</a></li>
								<li><a href=''>Hướng dẫn sử dụng</a></li>
								<li><a href=''>Đăng bán sản phẩm</a></li>
								<li><a href=''>Quản lý sản phẩm</a></li>
								<li><a href=''>Hòm thư tin nhắn</a></li>
								<li class='title a'><a href=''>Danh sách yêu cầu báo giá</a></li>
								<li><a href=''>Thư yêu cầu báo giá</a></li>
								<li class='title a'><a href=''>Thành viên cao cấp</a></li>
							</ul>
						</li>
						<li><a href=''>Mua hàng</a>
							<ul>
								<li><a href=''>Tìm sản phẩm & nhà cung cấp</a></li>
								<li><a href=''>Theo danh mục</a></li>
								<li><a href=''>Các sản phẩm bán sỉ</a></li>
								<li class='title a'><a href=''>Dịch vụ hỗ trợ giao thương</a></li>
								<li><a href=''>Kiểm duyệt công ty</a></li>
								<li><a href=''>Gửi yêu cầu báo giá</a></li>
								<li><a href=''>Chat trực tuyến</a></li>
								<li class='title a'><a href=''>Cộng đồng thương mại Sagohano</a></li>
								<li><a href=''>Hỏi đáp về Sagohano</a></li>
								<li><a href=''>Thông tin thương mại thường nhật</a></li>
							</ul>
						</li>
						<li><a href=''>Gửi yêu cầu báo giá</a>
							<ul class="guiyeucau">
								<li>
									<div class="left"><img src='public/site/images/name.jpg' /></div>
									<div class="right">
										<p class="p1">Minh Quân | Nhận được 10 báo giá</p>
										<p class="p2">10 giây trước</p>
									</div>
								</li>
								<li>
									<div class="left"><img src='public/site/images/name.jpg' /></div>
									<div class="right">
										<p class="p1">Minh Quân | Nhận được 10 báo giá</p>
										<p class="p2">10 giây trước</p>
									</div>
								</li>
								<li>
									<div class="left"><img src='public/site/images/name.jpg' /></div>
									<div class="right">
										<p class="p1">Minh Quân | Nhận được 10 báo giá</p>
										<p class="p2">10 giây trước</p>
									</div>
								</li>
								<li><b>Nhà cung cấp đã được kiểm duyệt. Nhanh chóng. </b></li>
								<li><a class="submit_a">Gửi yêu cầu báo giá ngay</a></li>
							</ul>
						</li>
						<li><a href=''>Trợ giúp</a>
							<ul>
								<li><a href=''>Trợ giúp cho người mua</a></li>
								<li><a href=''>Trợ giúp cho người bán</a></li>
								<li><a href=''>Các sản phẩm bán sỉ</a></li>
								<li class='title a'><a href=''>Hướng dẫn sử dụng</a></li>
								<li class='title a'><a href=''>Báo cáo vi phạm bản quyền</a></li>
								<li class='title a'><a href=''>Gửi đơn khiếu nại</a></li>
							</ul>
						</li>
						<li>
							<?php
							$sess = $this->session->userdata("user_email");
							if($sess!=''){
								echo "<a href='".base_url()."dang-xuat'>Đăng Xuất</a>";
							}else{
							?>
							<a>Đăng nhập</a>
							<ul class="dangnhap">
								<div class='box'>
									<form method="POST" action="<?php echo base_url().'login' ?>">
										<p>Tên tài khoản</p>
										<input type="text" name="Email" placeholder="Tên đăng nhập của bạn" />
										<p>Mật khẩu</p>
										<input type="password" name="Password" placeholder="Mật khẩu của bạn" required />
										<input type="submit" value="Đăng Nhập" required />
										<div class="bottom">
											Đăng nhập với : <a href=''><img src='public/site/images/fb_icon.PNG' /></a> | <a href='<?php echo base_url().'dang-nhap' ?>'>Đăng ký miễn phí</a>
										</div>
									</form>
								</div>
							</ul>
							<?php } ?>
						</li>
					</ul>
				</div>
				<div class="right_menu">
					<ul>
						<li><a href=''>3</a><i class="icon"></i>
							<div class="thongbao">
								<p class='title'>Thông báo <span>Đánh dấu đã đọc</span></p>
								<div class="list">
									<div class="left"><img src='public/site/images/name.JPG' /></div>
									<div class="center"><p>Mr.Wang vừa gửi yêu cầu báo giá sản phẩm</p><i>46 phút trước</i></div>
									<div class="right"><img src='public/site/images/products1.JPG' /></div>
								</div>
								<div class="list">
									<div class="left"><img src='images/name.JPG' /></div>
									<div class="center"><p>Mr.Wang vừa gửi yêu cầu báo giá sản phẩm</p><i>46 phút trước</i></div>
									<div class="right"><img src='public/site/images/products1.JPG' /></div>
								</div>
								<div class="list">
									<div class="left"><img src='images/name.JPG' /></div>
									<div class="center"><p>Mr.Wang vừa gửi yêu cầu báo giá sản phẩm</p><i>46 phút trước</i></div>
									<div class="right"><img src='public/site/images/products1.JPG' /></div>
								</div>
								<div class="list">
									<div class="left"><img src='images/name.JPG' /></div>
									<div class="center"><p>Mr.Wang vừa gửi yêu cầu báo giá sản phẩm</p><i>46 phút trước</i></div>
									<div class="right"><img src='public/site/images/products1.JPG' /></div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<?php echo $content ?>
		<div class="footer">
			<?php if(current_url()==base_url()){ ?>
			<div class="block_menu">
				<div class="containner">
					<div class="list">
						<p class="title">Chăm sóc khách hàng</p>
						<a href=''>Trợ giúp</a>
						<a href=''>Liên hệ</a>
						<a href=''>Gửi đơn khiếu nại</a>
						<a href=''>Chính sách & luật của Sagohano</a>
					</div>
					<div class="list">
						<p class="title">Sơ lược về chúng tôi</p>
						<a href=''>Giới thiệu về Sagohano.com</a>
						<a href=''>Bản đồ trang Sagohano.com</a>
					</div>
					<div class="list">
						<p class="title">Mua hàng trên Sagohano</p>
						<a href=''>Theo danh mục</a>
						<a href=''>Gửi yêu cầu báo giá</a>
						<a href=''>Các sản phẩm bán sỉ</a>
						<a href=''>Các sản phẩm bán chạy nhất</a>
					</div>
					<div class="list">
						<p class="title">Bán hàng trên Sagohano</p>
						<a href=''>Cấp độ thành viên</a>
						<a href=''>Hướng dẫn sử dụng</a>
						<a href=''>Danh sách yêu cầu báo giá</a>
						<a href=''>Thành viên cao cấp</a>
					</div>
					<div class="list">
						<p class="title">Dịch vụ hỗ trợ giao thương</p>
						<a href=''>Xác thực công ty/sản phẩm</a>
						<a href=''>Kiểm duyệt công ty</a>
						<a href=''>Thanh toán an toàn sPay</a>
						<a href=''>Bảo hiểm mua hàng</a>
					</div>
				</div>
			</div>
			<div class="containner" style="margin-top:20px">
				<div class="block1 block">Đường dây nóng 24/4 : <b>083.7.333.666</b></div>
				<div class="block2 block">Theo dõi chúng tôi trên : <a href=''><img src='public/site/images/fb_icon.PNG' /></a><a href=''><img src='public/site/images/youtube_icon.PNG' /></a></div>
				<div class="block3 block">
					<input type='text' placeholder="Nhập tên sản phẩm" /><input type="submit" value="Theo dõi" />
				</div>
			<?php }else{ ?>
			<div class="containner" style="margin-top:20px">
			<?php } ?>
				<div class="bottom_footer">
					<p><a href=''>Chương trình khuyến mãi</a><a href=''>Nhà sản xuất</a><a href=''>Nhà cung cấp</a><a href=''>Tìm theo vùng miền</a></p>
					<p>Luật đăng bán sản phẩm - Khiếu nại về bản quyền & sở hữu trí tuệ - Chính sách bảo mật - Điều khoản sử dụng</p>
					<p>&copy Sagohano.com 2015 - Bản quyền đã được bảo hộ </p>
				</div>
			</div>
		</div>
	</body>
</html>
