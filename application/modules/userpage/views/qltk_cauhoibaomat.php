<?php $this->load->view("topmenu"); ?>
<div class="userpage">
	<div class="left_userpage">
		<?php 
		$this->load->view("qltk_leftmenu");
		?>
	</div>
	<div class="right_userpage">
		<div class="breakcrumb"><a>Quản lý tài khoản</a> » <a>Thiết lập câu hỏi bí mật</a></div>
		<div class="cauhoibimat block">
			<div class="title">
				<li>Thiết lập câu hỏi bí mật</li>
				<li>Nếu bạn quên câu hỏi bí mật , <a href="">nhấp vào đây</a> để nhận email phục hồi .</li>
			</div>
			<div class="box_content">
				<table>
					<tr>
						<td><span>*</span>Chọn câu hỏi:</td>
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
						<td><span>*</span>Trả lời</td>
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