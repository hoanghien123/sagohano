<style>
	.thongtincongty .right_thongtincongty .content-content .title-box span.thongtincoban_tit{  background: #f7f7f7;border-bottom: 1px solid #CCC;}
	.thongtincongty .right_thongtincongty .content-content .title-box span.chungnhanvabaoho_tit{  background: #FFF;border-bottom: none;}
	.thongtincoban_box .title_box2 a span.chungnhan{line-height: 38px;font-weight: normal;color: #444}
	.thongtincoban_box .title_box2 a span.giaithuong{line-height: 38px;font-weight: bold;color: #cc6600}
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
							<div class='title'><b>Danh sách giải thưởng:</b> <?php echo count($data_giaithuong);?></div>
							<table class='chungnhan'>
								<tr>
									<th>Tên</th>
									<th>Được cấp bởi</th>
									<th>Ngày cấp</th>
								</tr>
								<?php
									foreach ($data_giaithuong as $row) {
										echo "
										<tr>
										<td>$row->Tengiaithuong</td>
										<td>$row->Donvicapgiaithuong</td>
										<td>$row->Ngaycap</td>
										</tr>";
									}
								?>
							</table>
						</div>
						<form action="<?php echo base_url() ?>userpage/add_giaithuong/<?php echo $this->shop->ID;?>" method="post" id='thongtincoban' enctype="multipart/form-data">
						<div class='themchungnhan_chungchi'>
							<div class='title'>Thêm giải thưởng:</div>

							<div class='content'>

								<div class='row'>
									<div class='left_row'><span>Tên giải thưởng:</span></div>
									<div class='right_row'>
										<input type='text' name='sochungnhan' class='sochungnhan'>
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
									<div class='left_row'><span>Hình ảnh:</span></div>
									<div class='right_row'>
										<div class='tailen'>
											<div class='row_tailen'>
												<input type='button' name='tailen_img' class='tailen_img' value='Tải lên'>
												<a href='#' class='xoatatca'>Xóa tất cả</a>
											</div>
											<div class='row_tailen'>
												<span class='toida'>Tối đa 200KB. Định dạng JPEG và PNG</span>
											</div>
											<div class='row_tailen'>
												<img src="<?php echo base_url()?>/public/site/images/userpage/images_up.png" alt="" class="hinhtrienlam" name="hinhtrienlam">
												<img src="<?php echo base_url()?>/public/site/images/userpage/images_up.png" alt="" class="hinhtrienlam" name="hinhtrienlam">
												<img src="<?php echo base_url()?>/public/site/images/userpage/images_up.png" alt="" class="hinhtrienlam" name="hinhtrienlam">
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
								</div>

								<div class='row'>
									<div class='left_row'>
									</div>
									<div class='right_row'>
										<input type='submit' class='luu' value='Lưu'/>
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