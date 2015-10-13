<?php 
$this->load->view("css_js_encode");
?>
<div class="thuxemlai_thuyeucaubaogia">
	<div class="control_tab">
		<div class="block_1">
			<a href="<?php echo base_url().'userpage/thuxemlai_hopthuchung' ?>">Hộp thư chung</a>
			<a href="<?php echo base_url().'userpage/thuxemlai_thubaogia' ?>">Thư báo giá</a>
			<a class="current" href="<?php echo base_url().'userpage/thuxemlai_thuyeucaubaogia' ?>">Thư yêu cầu báo giá</a>
		</div>
		<div class="block_2">
			<a class="selectdate">Chọn ngày</a>
		</div>
	</div>
	<div class="tools">
		<div class="block_1">
			<li><a class="chon"><input type='checkbox' />Chọn</a></li>
			<li><a class="danhdauspam">Đánh dấu spam</a></li>
			<li><a class="xoa">Xóa</a></li>
			<li><a class="more">...</a>
				<ul>
					<li><a class="sub">Tô màu</a>
						<ul>
							<li><a style="background:#F00"></a></li>
							<li><a style="background:#FF0"></a></li>
							<li><a style="background:#27c"></a></li>
							<li><a style="background:#090"></a></li>
						</ul>
					</li>
					<li><a href="">Đánh dấu đã đọc</a></li>
					<li><a href="">Đánh dấu chưa đọc</a></li>
					<li><a href="">Thêm vào danh bạ</a></li>
				</ul>
			</li>
		</div>
		<div class="block_2">
			<li></li>
			<li>Vùng miền</li>
			<li>Thời gian</li>
		</div>
		<div class="clear"></div>
		<table>
			<tr>
				<th colspan='5'><input type='checkbox' /><a class="capnhat"></a> <span class="status_on"></span></th>
			</tr>
			<tr>
				<td>Báo giá hóa chất Chloramphenocol GMP ...</td>
				<td><img src='public/site/images/img_nhacungcap.PNG'/><p>Phương Mai</p><a class="plus"></a></td>
				<td>400 hộp</td>
				<td>TP.Hồ Chí Minh</td>
				<td>09:00 AM 26/06/2015</td>
			</tr>
			<tr>
				<td colspan='5'>
					<a href='' class="guibaogia">Gửi báo giá</a>
					<p class="status_last">Tình trạng : <b>Chưa phản hồi</b></p>
				</td>
			</tr>
			<tr>
				<th colspan='5'><input type='checkbox' /><a class="capnhat"></a><span class="status_off"></span></th>
			</tr>
			<tr>
				<td>Báo giá hóa chất Chloramphenocol GMP ...</td>
				<td><img src='public/site/images/img_nhacungcap.PNG'/><p>Phương Mai</p> <a class="plus"></a></td>
				<td>400 hộp</td>
				<td>TP.Hồ Chí Minh</td>
				<td>09:00 AM 26/06/2015</td>
			</tr>
			<tr>
				<td colspan='5'>
					<a href='' class="dabaogia">Đã báo giá</a>
					<a href='' class="capnhatbaogia">Cập nhật báo giá</a>
					<p class="status_last">Tình trạng : <b>Đã báo giá</b></p>
				</td>
			</tr>
			<tr>
				<th colspan='5'><input type='checkbox' /><a class="capnhat"></a><span class="status_on"></span></th>
			</tr>
			<tr>
				<td>Báo giá hóa chất Chloramphenocol GMP ...</td>
				<td><img src='public/site/images/img_nhacungcap.PNG'/><p>Phương Mai</p><a class="plus"></a></td>
				<td>400 hộp</td>
				<td>TP.Hồ Chí Minh</td>
				<td>09:00 AM 26/06/2015</td>
			</tr>
			<tr>
				<td colspan='5'>
					<a href='' class="guibaogia">Gửi báo giá</a>
					<p class="status_last">Tình trạng : <b>Chưa phản hồi</b></p>
				</td>
			</tr>
			<tr>
				<th colspan='5'><input type='checkbox' /><a class="capnhat"></a><span class="status_off"></span></th>
			</tr>
			<tr>
				<td>Báo giá hóa chất Chloramphenocol GMP ...</td>
				<td><img src='public/site/images/img_nhacungcap.PNG'/><p>Phương Mai</p><a class="plus"></a></td>
				<td>400 hộp</td>
				<td>TP.Hồ Chí Minh</td>
				<td>09:00 AM 26/06/2015</td>
			</tr>
			<tr>
				<td colspan='5'>
					<a href='' class="guibaogia">Gửi báo giá</a>
					<p class="status_last">Tình trạng : <b>đã báo giá</b></p>
				</td>
			</tr>
		</table>
	</div>
</div>