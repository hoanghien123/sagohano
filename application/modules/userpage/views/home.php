<?php $this->load->view("topmenu"); ?>
<div class="userpage">
	<div class="left_userpage">
		<?php 
		$this->load->view("qltk_leftmenu");
		?>
	</div>
	<div class="right_userpage">
		<div class="box_qltk_home">
			<div class="block_1">
				<h3>Tăng cơ hội nhận được thư yêu cầu báo giá từ khách hàng</h3>
				<div class="progress">
					<a>2%</a>
					<i></i>
					<div class="bar"><span></span></div>
				</div>
				<p>Bạn đã đăng bán <span><b>1</b>/20</span> sản phẩm</p>
				<a class="button">Đăng bán sản phẩm ngay !</a>
				<p>"Tăng thêm sự lựa chọn và lợi ích cho khách hàng chính là tăng thêm giá trị và sự thịnh vượng của công ty bạn!"</p>
			</div>

			<div class="block_2">
				<div class="image">
					<img src='public/site/images/banner-nangcap-thanhvien.jpg' />
				</div>
				<div class="info">
					<h3>Nâng cấp thành viên</h3>
					<p>Nhận được thư yêu cầu báo giá từ khách hàng</p>
					<p>Được ưu tiên hiển thị sản phẩm</p>
					<p>Truy cập thông tin khách hàng nhanh chóng</p>
					<p>Hiển thị đến 500 sản phẩm</p>
					<a href=''>Tìm hiểu thêm ...</a>
				</div>
			</div>

			<div class="block_3">
				<h3>Hãy giúp chúng tôi cải thiện !</h3>
				<p>Bạn có hài lòng với giao diện hiện tại của trang này ?</p>
				<div>
					<form action="" method="POST">
						<div class="select">
							<p><input type='radio' name="point" value="1" /> Hài lòng </p>
							<p><input type='radio' name="point" value="2" /> Bình thường </p>
							<p><input type='radio' name="point" value="2" /> Không hài lòng</p>
						</div>
						<div class="textarea">
							<textarea name="Note" placeholder="Hãy để lại lời nhắn và góp ý của bạn đến chúng tôi ."></textarea>
						</div>
						<div><input type="submit" value="Gửi" /></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
