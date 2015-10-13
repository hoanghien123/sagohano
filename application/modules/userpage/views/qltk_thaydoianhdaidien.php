
<?php $this->load->view("topmenu"); ?>
<div class="userpage">
	<div class="left_userpage">
		<?php 
		$this->load->view("qltk_leftmenu");
		?>
	</div>
	<div class="right_userpage">
		<div class='thietlapriengtu'>
			<div class='top'>
				<span class='title2'>Thay đổi ảnh đại diện</span>
				<span class='des2'>Hình ảnh đại diện của bạn sẽ được hiển thị trong vòng 24h</span>
			</div>
			<div class='content'>
				<div class='thaydoianhdaidien'>
					<div class='left_anhdaidien'><img src="public/site/images/userpage/user_icon.png"></div>
					<div class='right_anhdaidien'>
						<div class='info'>
							<span>Dung lượng tối đa của ảnh 200kB</span>
							<span>Định dạng JPEG hoặc PNG</span>
							<span>Chọn ảnh đại diện có kích thước 120x120 pixels để hiển thị được đẹp nhất</span>
						</div>
						<div class='chonanh'>
							<input type='button' class='chonanh_btn' value='Chọn ảnh đại diện' /><br/>
							<input type='checkbox' name='xacnhan' class='xacnhan'><span>Xác nhận quyền sử dụng hình ảnh và không vi phạm <b>Điều khoản sử dụng.</b></span>
						</div>
						<div class='luuy'>
							<span class='title'>Lưu ý</span>
							<div class='content_luuy'>
								<span>Hãy chọn hình ảnh cùng với độ tuổi giới tính như thông tin cá nhân của bạn</span><br/><br/>
								<span>Hãy chọn hình ảnh phù hợp với môi trường kinh doanh & không dùng ảnh chụp nhóm</span><br/><br/>
								<span>Hình ảnh vi phạm <b>Điều khoản sử dụng</b> sẽ bị xóa mà không báo trước.</span>
							</div>
						</div>
					</div>
				</div>

			</div><!-- end content -->


		</div>
	</div>
</div>