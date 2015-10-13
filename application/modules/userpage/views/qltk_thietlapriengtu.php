<?php $this->load->view("topmenu"); ?>
<div class="userpage">
	<div class="left_userpage">
		<?php 
		$this->load->view("qltk_leftmenu");
		?>
	</div>
	<div class="right_userpage">
		<div class="breakcrumb"><a>Quản lý tài khoản</a> » <a>Thiết lập riêng tư</a></div>
		<div class="thietlapriengtu block">
			<div class="title">
				<li>Thiết lập riêng tư</li>
				<li>Ai có thể xem thông tin công ty của bạn ?</li>
				<li><input type="submit" value="Lưu" /></li>
			</div>
			<table>
			<tr>
				<th></th>
				<th>Tất cả mọi người</th>
				<th>Công ty đã kết bạn</th>
				<th>Công ty đã kết bạn & NCC đã được kiểm duyệt</th>
			</tr>
			<?php 
			$quyenriengtu = $this->db->query("select * from gianhang_thietlapriengtu")->result();
			if(count($quyenriengtu)>0){
				foreach ($quyenriengtu as $row) {
					echo "<tr>";
					echo "<td><div class='dauhoi'><span></span><div class='des'>$row->Description</div></div><p>$row->Title</p></td>";
					echo "<td style='text-align:center'><input type='checkbox' /></td>";
					echo "<td style='text-align:center'><input type='checkbox' /></td>";
					echo "<td style='text-align:center'><input type='checkbox' /></td>";
					echo "</tr>";
				}
			}
			?>
			</table>
			<div class="warning">* Tất cả các thông tin liên hệ , tóm tắt hoạt động trên Shagohano , Ngành nghề quan tâm & từ khóa tìm kiếm nhiều nhất sẽ không hiển thị với các công ty nằm trong <i>danh sách đen của bạn</i> .</div>

			<a href='' class="blacklist_btn">Quản lý danh sách đen</a>
		</div>
	</div>
</div>