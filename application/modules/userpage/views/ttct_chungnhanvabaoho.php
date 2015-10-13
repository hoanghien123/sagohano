
<style>
	.thongtincongty .right_thongtincongty .content-content .title-box span.thongtincoban_tit{  background: #f7f7f7;border-bottom: 1px solid #CCC;}
	.thongtincongty .right_thongtincongty .content-content .title-box span.chungnhanvabaoho_tit{  background: #FFF;border-bottom: none;}
	.thongtincoban_box .title_box2 a span.chungnhan{line-height: 38px;font-weight: bold;color: #cc6600}
</style>
<?php
	/* MỨC ĐỘ HOÀN TẤT THÔNG TIN */
	$data_hoantat = 0;
	$data_hoantat_ttnm = $this->db->query("select * from gianhang_thongtinnhamay where ShopID=$ShopID")->row();
	if(count($data_hoantat_ttnm)>0){$data_hoantat+=20;}
	$data_hoantat_ttcb = $this->db->query("select * from gianhang_thongtincoban where ShopID=$ShopID")->row();
	if(count($data_hoantat_ttcb)>0){$data_hoantat+=20;}
	$data_hoantat_ttgd = $this->db->query("select * from gianhang_thongtingiaodich where ShopID=$ShopID")->row();
	if(count($data_hoantat_ttgd)>0){$data_hoantat+=20;}
	$data_hoantat_gtct = $this->db->query("select * from gianhang_gioithieucongty where ShopID=$ShopID")->row();
	if(count($data_hoantat_gtct)>0){$data_hoantat+=20;}
	
	$data_hoantat_cn_bctn = $this->db->query("select * from gianhang_chungnhan_chungnhanvabaocaothunghiem where ShopID=$ShopID")->row();
	if(count($data_hoantat_cn_bctn)>0){$data_hoantat+=5;}
	$data_hoantat_cn_gt = $this->db->query("select * from gianhang_chungnhan_giaithuong where ShopID=$ShopID")->row();
	if(count($data_hoantat_cn_gt)>0){$data_hoantat+=5;}
	$data_hoantat_cn_th = $this->db->query("select * from gianhang_chungnhan_thuonghieu where ShopID=$ShopID")->row();
	if(count($data_hoantat_cn_th)>0){$data_hoantat+=5;}
	$data_hoantat_cn_bsc = $this->db->query("select * from gianhang_chungnhan_bangsangche where ShopID=$ShopID")->row();
	if(count($data_hoantat_cn_bsc)>0){$data_hoantat+=5;}
?>
<?php $this->load->view("topmenu2"); ?>
<div class="thongtincongty">
	<div class="left_thongtincongty">
		<?php 
		$this->load->view("ttct_leftmenu");
		?>
	</div>
	<div class="right_thongtincongty">

		<div class='top-content'>
			<div class='title'>
				<span>Quản lý Thông tin công ty</span>
			</div>
			<div class='mucdohoanthanh'>
				<span>Mức độ hoàn tất thông tin:</span>
				<div class="progress">
					<i></i>
					<?php
						echo "<div class='bar'><span style='width:$data_hoantat%'>$data_hoantat%</span></div>";
					?>
				</div>
			</div>
			<div class='description'>
				<span>Thông tin đầy đủ và chính xác có thể giúp đối tác hiểu rõ hơn về khả năng cung cấp và nhu cầu mua hàng của công ty bạn.</span>
			</div>
		</div>

		<div class='content-content'>
			<div class='title-box'>
				<a href='userpage/thongtincoban'><span class='thongtincoban_tit'>Thông tin cơ bản</span></a>
				<a href='userpage/thongtinnhamay'><span class='thongtinnhamay_tit'>Thông tin nhà máy</span></a>
				<a href='userpage/thongtingiaodich'><span class='thongtingiaodich_tit'>Thông tin giao dịch</span></a>
				<a href='userpage/gioithieucongty'><span class='gioithieucongty_tit'>Giới thiệu công ty</span></a>
				<a href='userpage/chungnhanvabaoho'><span class='chungnhanvabaoho_tit'>Chứng nhận và bảo hộ</span></a>
			</div>
			<div class='content-box'>
				<div class='thongtincoban_box'>
					<!-- Box 2 -->
					<div class='title_box2'>
						<a href='<?php echo base_url()?>userpage/chungnhanvabaoho'><span class='chungnhan'>Chứng nhận và báo cáo thử nghiệm</span></a>
						<a href='<?php echo base_url()?>userpage/giaithuong'><span class='giaithuong'>Giải thưởng</span></a>
						<a href='<?php echo base_url()?>userpage/bangsangche'><span class='bangsangche'>Bằng sách chế</span></a>
						<a href='<?php echo base_url()?>userpage/thuonghieu'><span class='thuonghieu'>Thương hiệu</span></a>
					</div>

					<div class='content_box2'>
						<div class='danhsachchungnhan'>
							<div class='title'><b>Danh sách chứng nhận:</b> <?php echo count($data_baocaothunghiem);?></div>
							<table class='chungnhan'>
								<tr>
									<th>Số CN/CC</th>
									<th>Tên</th>
									<th>Được cấp bởi</th>
									<th>Loại chứng nhận/chứng chỉ</th>
								</tr>
								<?php
									foreach ($data_baocaothunghiem as $row) {
										$data_tenchungnhan = $this->db->query("select * from gianhang_tenchungchichungnhan where ID=$row->TenchungnhanID")->row();
										$tenchungnhan = count($data_tenchungnhan) > 0 ? $data_tenchungnhan->Title : "";
										$data_loaichungnhan = $this->db->query("select * from gianhang_loaichungnhan where ID=$row->LoaichungnhanID")->row();
										$loaichungnhan = count($data_loaichungnhan) > 0 ? $data_loaichungnhan->Title : "";
										echo "
										<tr>
										<td>$row->Sochungnhan</td>
										<td>$tenchungnhan</td>
										<td>$row->Donvicapchungnhan</td>
										<td>$loaichungnhan</td>
										</tr>";
									}
								?>
							</table>
						</div>

						<form action="<?php echo base_url() ?>userpage/add_chungnhanvabaoho/<?php echo $this->shop->ID;?>" method="post" id='thongtincoban' enctype="multipart/form-data">
						<div class='themchungnhan_chungchi'>
							<div class='title'>Thêm chứng nhận/ chứng chỉ</div>

							<div class='content'>
								<div class='row'>
									<div class='left_row'><span>Loại chứng nhận:</span></div>
									<div class='right_row'>
										<select class='loaichungnhan' name='loaichungnhan'>
											<option>Chọn 1</option>
											<?php 
											$dataChungnhan = $this->db->query("select * from gianhang_loaichungnhan")->result();
											foreach ($dataChungnhan as $row) {
												echo "<option value='$row->ID'>$row->Title</option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class='row'>
									<div class='left_row'><span>Số chứng nhận/ chứng chỉ:</span></div>
									<div class='right_row'>
										<input type='text' name='sochungnhan' class='sochungnhan'>
									</div>
								</div>

								<div class='row'>
									<div class='left_row'><span>Tên chứng nhận/ chứng chỉ:</span></div>
									<div class='right_row'>
										<select class='tenchungnhan' name='tenchungnhan'>
										<?php 
										$dataTenchungnhan = $this->db->query("select * from gianhang_tenchungchichungnhan")->result();
										foreach ($dataTenchungnhan as $row) {
											echo "<option value='$row->ID'>$row->Title</option>";
										}
										?>
										</select>
									</div>
								</div>

								<div class='row'>
									<div class='left_row'><span>Được cấp bởi:</span></div>
									<div class='right_row'>
										<input type='text' name='duoccapboi' class='duoccapboi'>
									</div>
								</div>

								<div class='row'>
									<div class='left_row'><span>Ngày cấp:</span></div>
									<div class='right_row'>
										<select name='ngaycap' class='ngay'>
											<option>Ngày</option>
											<?php 
											for ($i=0; $i <32 ; $i++) { 
												echo "<option value='$i'>$i</option>";
											}
											?>
										</select>
										<select name='thangcap' class='thang'>
											<option>Tháng</option>
											<?php 
											for ($i=0; $i <13 ; $i++) { 
												echo "<option value='$i'>$i</option>";
											}
											?>
										</select>
										<select name='namcap' class='nam'>
											<option>Năm</option>
											<?php 
											for ($i=2015; $i >1900 ; $i--) { 
												echo "<option value='$i'>$i</option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class='row'>
									<div class='left_row'><span>Ngày hết hạn:</span></div>
									<div class='right_row'>
										<select name='ngayhethan' class='ngay'>
											<option>Ngày</option>
											<?php 
											for ($i=0; $i <32 ; $i++) { 
												echo "<option value='$i'>$i</option>";
											}
											?>
										</select>
										<select name='thanghethan' class='thang'>
											<option>Tháng</option>
											<?php 
											for ($i=0; $i <13 ; $i++) { 
												echo "<option value='$i'>$i</option>";
											}
											?>
										</select>
										<select name='namhethan' class='nam'>
											<option>Năm</option>
											<?php 
											for ($i=2015; $i >1900 ; $i--) { 
												echo "<option value='$i'>$i</option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class='row'>
									<div class='left_row'><span>Hình ảnh:</span></div>
									<div class='right_row'>
										<div class='tailen'>
											<div class='row_tailen'>
												<?php 
													$image1 = $data_baocaothunghiem2->Image1 == "" ? base_url()."public/site/images/userpage/images_up.png" : "$data_baocaothunghiem->Image1";
													$image2 = $data_baocaothunghiem2->Image2 == "" ? base_url()."public/site/images/userpage/images_up.png" : "$data_baocaothunghiem->Image2";
													$image3 = $data_baocaothunghiem2->Image3 == "" ? base_url()."public/site/images/userpage/images_up.png" : "$data_baocaothunghiem->Image3";
													echo "<div class='bl'>";
													echo "<input type='file' class='tai_trienlam' name='hinhtrienlam_img1' onchange='readURL_trienlam1(this);'/>";
													echo "<span class='xoatatca'>Xóa</span>";
													echo "<img src='$image1' alt='' class='hinhtrienlam' name='hinhtrienlam_img1' id='hinhtrienlam_img1'>";
													echo "</div>";
													echo "<div class='bl'>";
													echo "<input type='file' class='tai_trienlam' name='hinhtrienlam_img2' onchange='readURL_trienlam2(this);'/>";
													echo "<span class='xoatatca'>Xóa</span>";
													echo "<img src='$image2' alt='' class='hinhtrienlam' name='hinhtrienlam_img2' id='hinhtrienlam_img2'>";
													echo "</div>";
													echo "<div class='bl'>";
													echo "<input type='file' class='tai_trienlam' name='hinhtrienlam_img3' onchange='readURL_trienlam3(this);'/>";
													echo "<span class='xoatatca'>Xóa</span>";
													echo "<img src='$image3' alt='' class='hinhtrienlam' name='hinhtrienlam_img3' id='hinhtrienlam_img3'>";
													echo "</div>";
												?>
											</div>
										</div>
									</div>
								</div>

								<div class='row'>
									<div class='left_row'>
										<span>Tóm tắt:</span>
									</div>
									<div class='right_row'>
									</div>
								</div>

								<div class='row'>
									<textarea class='tomtat' name='tomtat'>

									</textarea>
									<span class='tomtat1'>
										Còn lại <b>1000 từ</b>
									</span>
									<span class='tomtat2'>
										Hãy điền thông tin quan trọng như tên sản phẩm và thông tin quan trọng liên quan đến chứng nhận sản phẩm này.<br/>
										Ví dụ: Chứng nhận này kiểm chứng dây chuyền sản xuất sản phẩm thùng carton...
									</span>
								</div>

								<div class='row'>
									<div class='left_row'>
									</div>
									<div class='right_row'>
										<input type='submit' class='luu' value='Thêm'/>
									</div>
								</div>
							</div><!-- end content-->
						</div>
						</form>
					</div>
					<!-- end box 2 -->

				</div>
				<div class='thongtinnhamay_tit'>
				</div>
				<div class='thongtingiaodich_tit'>
				</div>
				<div class='thongtingiaodich_tit'>
				</div>
				<div class='chungnhanvabaoho_tit'>
				</div>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
function readURL1_1(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#blah1_1').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

function readURL_trienlam1(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#hinhtrienlam_img1').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}
function readURL_trienlam2(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#hinhtrienlam_img2').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}
function readURL_trienlam3(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#hinhtrienlam_img3').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}
</script>


