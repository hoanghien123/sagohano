<?php 
	//Logo
	$logo_url = "";
	if($data_gioithieucongty->Logo == 0){
		$logo_url = base_url()."public/site/images/logo_bg.png";
	}
	else{
		$dataImage = $this->db->query("select Path from files where ID=$data_gioithieucongty->Logo")->row();
		if(count($dataImage)>0){
			$logo_url = "$dataImage->Path";
		}
		
	}

	//Tỉnh thành
	$dataTinhthanh = $this->db->query("select * from tinhthanh where ID = $data_hoichotrienlam->TinhthanhID")->row();
	$dataTinhthanh2 = $this->db->query("select * from tinhthanh where ParentID = 0")->result();
	if(count($dataTinhthanh)>0){
		$vungmien = "<select name='tinh_thanh' class='tinh_thanh'><option value='$dataTinhthanh->ID'>$dataTinhthanh->Title</option>";
	}
	else{
		$vungmien = "<select name='tinh_thanh' class='tinh_thanh'><option>Chọn 1</option>";
	}
	

	foreach($dataTinhthanh2 as $row){
		$vungmien .= "<option value='$row->ID'>$row->Title</option>";
	}
	$vungmien .= "</select>";
	
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

<style type="text/css">
	.thongtincongty .right_thongtincongty .content-content .title-box span.thongtincoban_tit{  background: #f7f7f7;border-bottom: 1px solid #CCC;}
	.thongtincongty .right_thongtincongty .content-content .title-box span.gioithieucongty_tit{  background: #FFF;border-bottom: none;}
</style>
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
				<span>Logo công ty</span>
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
		<form action="<?php echo base_url() ?>userpage/update_gioithieucongty/<?php echo $data_gioithieucongty->ShopID;?>" method="post" id='thongtincoban' enctype="multipart/form-data">
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
					<div class='table_content'>
						<div class='row'>
							<div class='left_row'>
								<span>Logo công ty:</span>
							</div>
							<div class='right_row'>
								<div class='logo_congty'>
									<div class='logo_img'>
										<img src='<?php echo $logo_url;?>' alt='logo' name='logo_congty' id='blah1_1' />
									</div>
									<div class='tailen'>
										<input type='file' class='tai_logo' name='Image_upload' onchange="readURL1_1(this);"/>
										<span class='xoa_logo'>Xóa logo</span>
										<span class='gioihan'>Tối đa 200KB. Định dạng JPEG và PNG</span>
									</div>
								</div>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Giới thiệu chi tiết về công ty:</span>
							</div>
							<div class='right_row'>
								<textarea class='themanh' name='themanh'>
									<?php echo $data_gioithieucongty->Gioithieuchitiet;?>
								</textarea>
								<span class='themanh_conlai'>Còn lại: <b>5000 từ</b></span>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Công ty bạn đã hoặc định tham gia <br/> triễn làm nào chưa:</span>
							</div>
							<div class='right_row'>
								<div class='radio_trienlam'>
									<input type='radio' name='trienlam' value='1' <?php if($data_gioithieucongty->Trangthaithamgiatrienlam == 1){echo "checked";}?>/><span>Có</span>
									<input type='radio' name='trienlam' value='0' <?php if($data_gioithieucongty->Trangthaithamgiatrienlam == 0){echo "checked";}?>/><span>Chưa</span>
								</div>
								<div class='chitiet_trienlam'>
									<div class='row_trienlam'>
										<div class='left_rowtrienlam'><span>Tên hội chợ/ triễn lãm:</span></div>
										<div class='right_rowtrienlam'><input type='text' name='tenhoicho' class='tenhoicho' value='<?php echo $data_hoichotrienlam->Tenhoichotrienlam;?>'/></div>
									</div>
									<div class='row_trienlam'>
										<div class='left_rowtrienlam'><span>Thời điểm:</span></div>
										<div class='right_rowtrienlam'>
											<select name='thang' class='thang'>
												<?php
													if($data_hoichotrienlam->Thoidiem_thang == 0){
														echo "<option>Tháng</option>";
													}
													else{
														echo "<option value='$data_hoichotrienlam->Thoidiem_thang'>Tháng $data_hoichotrienlam->Thoidiem_thang</option>";
													}
												?>
												<option value='1'>Tháng 1</option>
												<option value='2'>Tháng 2</option>
												<option value='3'>Tháng 3</option>
												<option value='4'>Tháng 4</option>
												<option value='5'>Tháng 5</option>
												<option value='6'>Tháng 6</option>
												<option value='7'>Tháng 7</option>
												<option value='8'>Tháng 8</option>
												<option value='9'>Tháng 9</option>
												<option value='10'>Tháng 10</option>
												<option value='11'>Tháng 11</option>
												<option value='12'>Tháng 12</option>
											</select>
											<select name='nam' class='nam'>
												<?php
													if($data_hoichotrienlam->Thoidiem_nam == 0){
														echo "<option>Năm</option>";
													}
													else{
														echo "<option value='$data_hoichotrienlam->Thoidiem_nam'>$data_hoichotrienlam->Thoidiem_nam</option>";
													}

													for($i=2015;$i>1900;$i--){
														echo "<option value='$i'>$i</option>";
													}
												?>
											</select>
										</div>
									</div>
									<div class='row_trienlam'>
										<div class='left_rowtrienlam'><span>Vùng/miền:</span></div>
										<div class='right_rowtrienlam'>
											<?php echo $vungmien;?>
										</div>
									</div>
									<div class='row_trienlam'>
										<div class='left_rowtrienlam'><span>Giới thiệu tóm tắt:</span></div>
										<div class='left_rowtrienlam'>
											<textarea class='tomtat_trienlam' name='tomtat_trienlam'>
												<?php echo $data_hoichotrienlam->Gioithieutomtat;?>
											</textarea>
										</div>
									</div>
									<div class='row_trienlam'>
										<div class='left_rowtrienlam'><span>Hình ảnh:</span></div>
										<div class='right_rowtrienlam'>
										</div>
									</div>
									<div class='row_trienlam'>
										<?php 
											$image1 = $data_hoichotrienlam->Image1 == "" ? base_url()."public/site/images/userpage/images_up.png" : "$data_hoichotrienlam->Image1";
											$image2 = $data_hoichotrienlam->Image2 == "" ? base_url()."public/site/images/userpage/images_up.png" : "$data_hoichotrienlam->Image2";
											$image3 = $data_hoichotrienlam->Image3 == "" ? base_url()."public/site/images/userpage/images_up.png" : "$data_hoichotrienlam->Image3";
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
							</div>
							<div class='right_row'>
								<input type='submit' class='luu' value='Lưu'/>
							</div>
						</div>
					</div>
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
		</form>
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
