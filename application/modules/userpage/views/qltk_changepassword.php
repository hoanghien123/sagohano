<?php $this->load->view("topmenu"); ?>
<div class="userpage">
	<div class="left_userpage">
		<?php 
		$this->load->view("qltk_leftmenu");
		?>
	</div>
	<div class="right_userpage">
		<div class="breakcrumb"><a>Quản lý tài khoản</a> » <a>Thay đổi mật khẩu</a></div>
		<div class="thaydoimatkhau block">
			<div class="title">
				<li>Thay đổi mật khẩu</li>
				<li>
					Để tăng tính bảo mật của mật khẩu , quý công ty vui lòng :<br>
					Thêm tối thiểu 1 số từ 0-9 và một chữ cái viết hoa trong mật khẩu .
				</li>
			</div>
			<div class="box_content">
				<div class="status_security">
					<div>Tính bảo mật</div>
					<li class="sta sta1">Thấp</li>
					<li class="sta sta2">Trung Bình</li>
					<li class="sta sta3">Cao</li>
				</div>
				<table>
					<tr>
						<td><span>*</span>Mật khẩu hiện tại:</td>
						<td><input type="password" /></td>
					</tr>
					<tr>
						<td><span>*</span>Mật khẩu mới:</td>
						<td><input type="password" /></td>
					</tr>
					<tr>
						<td><span>*</span>Nhập lại mật khẩu mới:</td>
						<td><input type="password" /></td>
					</tr>
					<tr>
						<td><span>*</span>Phương pháp xác nhận:</td>
						<td>
							<select>
								<option>Chọn 1 phương pháp</option>
								<option>Số CMND</option>
								<option>Email</option>
								<option>Câu hỏi bí mật</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><span>*</span>Số CMND</td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type='submit' value='Xác nhận' /></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>