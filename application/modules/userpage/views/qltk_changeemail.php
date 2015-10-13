<?php $this->load->view("topmenu"); ?>
<div class="userpage">
	<div class="left_userpage">
		<?php 
		$this->load->view("qltk_leftmenu");
		?>
	</div>
	<div class="right_userpage">
		<div class="breakcrumb"><a>Quản lý tài khoản</a> » <a>Thay đổi email</a></div>
		<div class="thaydoiemail block">
			<div class="title">
				<li><span>@</span>Thay đổi email</li>
				<li>
					Email của bạn sẽ được dùng cho :<br>
					1 . Tên đăng nhập <br>
					2 . Nhận tin nhắn từ sagohano
				</li>
			</div>
			<div class="box_content">
				<table>
					<tr>
						<td>Email hiện tại:</td>
						<td><?php echo $this->user->Email ?></td>
					</tr>
					<tr>
						<td><span>*</span>Địa chỉ Email mới:</td>
						<td><input type="email" /></td>
					</tr>
					<tr>
						<td><span>*</span>Nhập lại địa chỉ Email mới:</td>
						<td><input type="email" /></td>
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