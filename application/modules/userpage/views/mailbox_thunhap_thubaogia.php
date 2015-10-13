<?php 
$this->load->view("css_js_encode");
?>
<div class="thunhap_thubaogia">
	<div class="control_tab">
		<div class="block_1">
			<a href="<?php echo base_url().'userpage/thunhap_hopthuchung' ?>">Hộp thư chung</a>
			<a class="current" href="<?php echo base_url().'userpage/thunhap_thubaogia' ?>">Báo giá</a>
			<a href="<?php echo base_url().'userpage/thunhap_thuyeucaubaogia' ?>">Yêu cầu báo giá</a>
		</div>
		<div class="block_2">
			<a class="selectdate">Chọn ngày</a>
		</div>
	</div>
	<div class="tools">
		<div class="block_1">
			<li><a class="chon"><input type='checkbox' />Chọn</a></li>
			<li><a class="xoa">Hủy</a></li>
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
		<div class="clear"></div>
		<div class="data">
			<div class="title">Ngày 26/05/2015</div>
			<div class="box">
				<?php for ($i=0; $i < 4; $i++) { ?>
				<div class="list">
					<div class="preview">
						<div class="images"></div>
						<div class="function"><input type='checkbox' /> <a class="plus"></a></div>
					</div>
					<div class="info">
						<h3>Màng PVC phép giấy ...</h3>
						<p>Công ty CP TM DP Bắc Á</p>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="title">Ngày 27/05/2015</div>
			<div class="box">
				<?php for ($i=0; $i < 4; $i++) { ?>
				<div class="list">
					<div class="preview">
						<div class="images"></div>
						<div class="function"><input type='checkbox' /> <a class="plus"></a></div>
					</div>
					<div class="info">
						<h3>Màng PVC phép giấy ...</h3>
						<p>Công ty CP TM DP Bắc Á</p>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>