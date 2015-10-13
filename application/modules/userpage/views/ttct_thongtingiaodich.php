<style type="text/css">
	.thongtincongty .right_thongtincongty .content-content .title-box span.thongtincoban_tit{  background: #f7f7f7;border-bottom: 1px solid #CCC;}
	.thongtincongty .right_thongtincongty .content-content .title-box span.thongtingiaodich_tit{  background: #FFF;border-bottom: none;}

	.thongtincongty .right_thongtincongty .content-content .content-box .thongtincoban_box .table_content .row .left_row{display: block;width: 395px;min-height: 10px;float: left;text-align: right;}
	.thongtincongty .right_thongtincongty .content-content .content-box .thongtincoban_box .table_content .row .right_row{display: block;width: 430px;float: left;padding: 0px 0px 0px 23px;}
	.thongtincongty .right_thongtincongty .content-content .content-box .thongtincoban_box .table_content .row .right_row input.luu{margin: 0px 0px 0px 48px;}
</style>
<?php 
	//Tổng doanh thu hàng năm
	$dataTongdoanhthuhangnam = $this->db->query("select * from gianhang_tongdoanhthuhangnam where ID = $data_thongtingiaodich->TongdoanhthuhangnamID")->row();
	$dataTongdoanhthuhangnam2 = $this->db->query("select * from gianhang_tongdoanhthuhangnam")->result();
	if(count($dataTongdoanhthuhangnam)>0){
		$Tongdoanhthuhangnam = "<select name='Tongdoanhthuhangnam' class='Tongdoanhthuhangnam'><option value='$dataTongdoanhthuhangnam->ID'>$dataTongdoanhthuhangnam->Title</option>";
	}
	else{
		$Tongdoanhthuhangnam = "<select name='Tongdoanhthuhangnam' class='Tongdoanhthuhangnam'><option>Chọn 1</option>";
	}
	

	foreach($dataTongdoanhthuhangnam2 as $row){
		$Tongdoanhthuhangnam .= "<option value='$row->ID'>$row->Title</option>";
	}
	$Tongdoanhthuhangnam .= "</select>";

	//Thị trường chính
	$Thitruongchinh = $this->db->query("select * from tinhthanh where ParentID = 0 AND ID in (1,751)")->result();
	$Thitruongchinh2 = $this->db->query("select * from tinhthanh where ParentID = 0")->result();
	$ThitruongchinhStr2 = "";
	foreach ($Thitruongchinh2 as $row) {
		$ThitruongchinhStr2 .= "<option value='$row->ID'>$row->Title</option>"; 
	}

	$ThitruongchinhStr = "";
	if(count($Thitruongchinh) > 0){
		foreach($Thitruongchinh as $row){
			$ThitruongchinhStr .= "<select class='tinh_thanhpho' name='tinh_thanhpho'>
										<option value='$row->ID'>$row->Title</option>
										$ThitruongchinhStr2
									</select>";

		}
	}
	else{
		$ThitruongchinhStr .= "<select class='tinh_thanhpho' name='tinh_thanhpho'>
										<option>Chọn 1</option>
										$ThitruongchinhStr2
									</select>";
	}



	//Nhân sự phòng kinh doanh thương mại
	$dataNhansuphongkinhdoanh = $this->db->query("select * from gianhang_nhansuphongkinhdoanh where ID = $data_thongtingiaodich->NhansuphongkinhdoanhID")->row();
	$dataNhansuphongkinhdoanh2 = $this->db->query("select * from gianhang_nhansuphongkinhdoanh")->result();
	if(count($dataNhansuphongkinhdoanh)>0){
		$Nhansuphongkinhdoanh = "<select name='Nhansuphongkinhdoanh' class='kinhdoanh_thuongmai'><option value='$dataNhansuphongkinhdoanh->ID'>$dataNhansuphongkinhdoanh->Title</option>";
	}
	else{
		$Nhansuphongkinhdoanh = "<select name='Nhansuphongkinhdoanh' class='kinhdoanh_thuongmai'><option>Chọn 1</option>";
	}
	

	foreach($dataNhansuphongkinhdoanh2 as $row){
		$Nhansuphongkinhdoanh .= "<option value='$row->ID'>$row->Title</option>";
	}
	$Nhansuphongkinhdoanh .= "</select>";


	//Thời gian sản xuất/ cung cấp hàng trung bình
	$dataThoigiansanxuatcungcaptrungbinh = $this->db->query("select * from gianhang_thoigiansanxuatcungcaptrungbinh where ID = $data_thongtingiaodich->ThoigiansanxuattrungbinhID")->row();
	$dataThoigiansanxuatcungcaptrungbinh2 = $this->db->query("select * from gianhang_thoigiansanxuatcungcaptrungbinh")->result();
	if(count($dataThoigiansanxuatcungcaptrungbinh)>0){
		$Thoigiansanxuatcungcaptrungbinh = "<select name='Thoigiansanxuatcungcaptrungbinh' class='sanxuat_cungcap_trungbinh'><option value='$dataThoigiansanxuatcungcaptrungbinh->ID'>$dataThoigiansanxuatcungcaptrungbinh->Title</option>";
	}
	else{
		$Thoigiansanxuatcungcaptrungbinh = "<select name='Thoigiansanxuatcungcaptrungbinh' class='sanxuat_cungcap_trungbinh'><option>Chọn 1</option>";
	}
	

	foreach($dataThoigiansanxuatcungcaptrungbinh2 as $row){
		$Thoigiansanxuatcungcaptrungbinh .= "<option value='$row->ID'>$row->Title</option>";
	}
	$Thoigiansanxuatcungcaptrungbinh .= "</select>";


	//Phương thức thanh toán ưu tiên
	$dataPhuongthucthanhtoanuutien = $this->db->query("select * from gianhang_phuongthucthanhtoanuutien where ID = $data_thongtingiaodich->PhuongthucthanhtoanuutienID")->row();
	$dataPhuongthucthanhtoanuutien2 = $this->db->query("select * from gianhang_phuongthucthanhtoanuutien")->result();
	if(count($dataPhuongthucthanhtoanuutien)>0){
		$Phuongthucthanhtoanuutien = "<select name='phuongthuc_thanhtoan_uutien' class='phuongthuc_thanhtoan_uutien'><option value='$dataPhuongthucthanhtoanuutien->ID'>$dataPhuongthucthanhtoanuutien->Title</option>";
	}
	else{
		$Phuongthucthanhtoanuutien = "<select name='phuongthuc_thanhtoan_uutien' class='phuongthuc_thanhtoan_uutien'><option>Chọn 1</option>";
	}
	

	foreach($dataPhuongthucthanhtoanuutien2 as $row){
		$Phuongthucthanhtoanuutien .= "<option value='$row->ID'>$row->Title</option>";
	}
	$Phuongthucthanhtoanuutien .= "</select>";
	
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
			<form action="<?php echo base_url() ?>userpage/update_thongtingiaodich/<?php echo $data_thongtingiaodich->ID;?>" method="post" id='thongtincoban'>
			<div class='content-box'>
				<div class='thongtincoban_box'>
					<div class='table_content'>
						<div class='row'>
							<div class='left_row'>
								<span>Tổng doanh thu hàng năm:</span>
							</div>
							<div class='right_row'>
								<?php echo $Tongdoanhthuhangnam;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Thị trường chính:</span>
							</div>
							<div class='right_row'>
								<?php echo $ThitruongchinhStr;?>
								<div class='them_tinh_thanhpho'>+</div>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Nhân sự phòng kinh doanh/thương mại:</span>
							</div>
							<div class='right_row'>
								<?php echo $Nhansuphongkinhdoanh;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Thời gian sản xuất/cung cấp hàng trung bình:</span>
							</div>
							<div class='right_row'>
								<?php echo $Thoigiansanxuatcungcaptrungbinh;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Phương thức thanh toán ưu tiên:</span>
							</div>
							<div class='right_row'>
								<?php echo $Phuongthucthanhtoanuutien;?>
							</div>
						</div>
						
						<div class='row'>
							<div class='left_row'>
							</div>
							<div class='right_row'>
								<a class='themthongtin_giatrisanxuat'>
									+ Thêm thông tin khách hàng tiêu biểu
								</a>
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
			</form>
		</div>

	</div>
</div>