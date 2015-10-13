<?php $this->load->view("topmenu"); ?>
<div class="userpage">
	<div class="left_userpage">
		<?php 
		$this->load->view("qltk_leftmenu");
		?>
	</div>
	<div class="right_userpage">
		<div class="breakcrumb"><a>Quản lý tài khoản</a> » <a>Thay đổi ảnh đại diện</a></div>
		<div class="thaydoianhdaidien block">
			<div class="title">
				<li>Thay đổi ảnh đại diện</li>
				<li>Hình ảnh đại diện của bạn sẽ hiển thị trong vòng 24h</li>
			</div>
			<div class="box_content">
				<div class="images">
					<?php 
					$img = $this->db->query("select * from files where ID=".$this->user->ImageID)->row();
					$src = $img ? $img->Path : "public/site/images/userpage/user_icon.png" ;
					echo "<img src='".base_url()."$src' />";
					?>
				</div>
				<div class="info">
					<p>Dung lượng tối đa của ảnh 200 Kb</p>
					<p>Định dạng JPEG hoặc PNG</p>
					<p>Chọn ảnh có kích thước 120px x 120px để hiển thị ra đẹp nhất .</p>
					<p><input type="file" /></p>
					<p class="checkbox"><input type='checkbox' /> Xác nhận quyền sử dụng hình ảnh và không vi phạm <a href=''>điều khoản sử dụng</a> .</p>
					<div class="luuy">
						<a class="txt_title">Lưu ý</a>
						<li>Hãy chọn hình ảnh đúng với độ tuổi , giới tính như thông tin cá nhân của bạn </li>
						<li>Hãy chọn hình ảnh phù hợp với môi trường kinh doanh và không dùng ảnh chụp nhóm</li>
						<li>Hình ảnh vi phạm <a>điều khoản sử dụng</a> sẽ bị xóa mà không báo trước </li>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>