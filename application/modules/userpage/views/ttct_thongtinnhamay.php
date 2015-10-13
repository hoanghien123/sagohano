<style type="text/css">
	.thongtincongty .right_thongtincongty .content-content .title-box span.thongtincoban_tit{  background: #f7f7f7;border-bottom: 1px solid #CCC;}
	.thongtincongty .right_thongtincongty .content-content .title-box span.thongtinnhamay_tit{  background: #FFF;border-bottom: none;}
</style>

<?php
	//Diện tích nhà máy
	$dataDientichnhamay = $this->db->query("select * from gianhang_dientichnhamay where ID = $data_thongtinnhamay->DientichnhamayID")->row();
	$dataDientichnhamay2 = $this->db->query("select * from gianhang_dientichnhamay")->result();
	if(count($dataDientichnhamay)>0){
		$dientichnhamay = "<select name='dientichnhamay' class='dientichnhamay'><option value='$dataDientichnhamay->ID'>$dataDientichnhamay->Title</option>";
	}
	else{
		$dientichnhamay = "<select name='dientichnhamay' class='dientichnhamay'><option>Chọn 1</option>";
	}
	

	foreach($dataDientichnhamay2 as $row){
		$dientichnhamay .= "<option value='$row->ID'>$row->Title</option>";
	}
	$dientichnhamay .= "</select>";

	//Cách cung cấp
	$cachcungcap = "";
	$dataCachcungcap = $this->db->query("select * from gianhang_cachcungcap where ID = $data_thongtinnhamay->CachcungcapID")->row();
	$dataCachcungcap2 = $this->db->query("select * from gianhang_cachcungcap")->result();
	foreach($dataCachcungcap2 as $row){
		if(count($dataCachcungcap)>0){
			if($dataCachcungcap->ID == $row->ID){
				$cachcungcap .= "<input type='radio' name='cachcungcap' class='cachcungcap' value='$row->ID' checked='true' /><span class='cachcungcap2'>$row->Title</span>";
			}
			else{
				$cachcungcap .= "<input type='radio' name='cachcungcap' class='cachcungcap' value='$row->ID' /><span class='cachcungcap2'>$row->Title</span>";
			}
		}
		else{
			$cachcungcap .= "<input type='radio' name='cachcungcap' class='cachcungcap' value='$row->ID' /><span class='cachcungcap2'>$row->Title</span>";
		}
	}

	//Nhân sự đảm bảo chất lượng
	$dataNhansudambaochatluong = $this->db->query("select * from gianhang_nhansudambaochatluong where ID = $data_thongtinnhamay->NhansudambaochatluongID")->row();
	$dataNhansudambaochatluong2 = $this->db->query("select * from gianhang_nhansudambaochatluong")->result();
	if(count($dataNhansudambaochatluong)>0){
		$nhansudambaochatluong = "<select name='nhansu_dambaochatluong' class='nhansu_dambaochatluong'><option value='$dataNhansudambaochatluong->ID'>$dataNhansudambaochatluong->Title</option>";
	}
	else{
		$nhansudambaochatluong = "<select name='nhansu_dambaochatluong' class='nhansu_dambaochatluong'><option>Chọn 1</option>";
	}
	

	foreach($dataNhansudambaochatluong2 as $row){
		$nhansudambaochatluong .= "<option value='$row->ID'>$row->Title</option>";
	}
	$nhansudambaochatluong .= "</select>";

	//Nhân sự nghiên cứu và phát triển
	$dataNhansunghiencuuvaphattrien = $this->db->query("select * from gianhang_nhansunghiencuuvaphattrien where ID = $data_thongtinnhamay->NhansunghiencuuvaphattrienID")->row();
	$dataNhansunghiencuuvaphattrien2 = $this->db->query("select * from gianhang_nhansunghiencuuvaphattrien")->result();
	if(count($dataNhansunghiencuuvaphattrien)>0){
		$nhansunghiencuuvaphattrien = "<select name='nhansu_nghiencuu' class='nhansu_nghiencuu'><option value='$dataNhansunghiencuuvaphattrien->ID'>$dataNhansunghiencuuvaphattrien->Title</option>";
	}
	else{
		$nhansunghiencuuvaphattrien = "<select name='nhansu_nghiencuu' class='nhansu_nghiencuu'><option>Chọn 1</option>";
	}
	

	foreach($dataNhansudambaochatluong2 as $row){
		$nhansunghiencuuvaphattrien .= "<option value='$row->ID'>$row->Title</option>";
	}
	$nhansunghiencuuvaphattrien .= "</select>";

	//Số lượng dây chuyền sản xuất
	$dataSoluongdaychuyensanxuat = $this->db->query("select * from gianhang_soluongdaychuyensanxuat where ID = $data_thongtinnhamay->SoluongdaychuyenID")->row();
	$dataSoluongdaychuyensanxuat2 = $this->db->query("select * from gianhang_soluongdaychuyensanxuat")->result();
	if(count($dataSoluongdaychuyensanxuat)>0){
		$soluongdaychuyensanxuat = "<select name='soluong_daychuyensanxuat' class='soluong_daychuyensanxuat'><option value='$dataSoluongdaychuyensanxuat->ID'>$dataSoluongdaychuyensanxuat->Title</option>";
	}
	else{
		$soluongdaychuyensanxuat = "<select name='soluong_daychuyensanxuat' class='soluong_daychuyensanxuat'><option>Chọn 1</option>";
	}
	

	foreach($dataSoluongdaychuyensanxuat2 as $row){
		$soluongdaychuyensanxuat .= "<option value='$row->ID'>$row->Title</option>";
	}
	$soluongdaychuyensanxuat .= "</select>";

	//Tổng giá trị sản xuất
	$dataTonggiatrisanxuathangnam = $this->db->query("select * from gianhang_tonggiatrisanxuathangnam where ID = $data_thongtinnhamay->TonggiatrisanxuatID")->row();
	$dataTonggiatrisanxuathangnam2 = $this->db->query("select * from gianhang_tonggiatrisanxuathangnam")->result();
	if(count($dataTonggiatrisanxuathangnam)>0){
		$tonggiatrisanxuathangnam = "<select name='tong_giatrisanxuat_hangnam' class='tong_giatrisanxuat_hangnam'><option value='$dataTonggiatrisanxuathangnam->ID'>$dataTonggiatrisanxuathangnam->Title</option>";
	}
	else{
		$tonggiatrisanxuathangnam = "<select name='tong_giatrisanxuat_hangnam' class='tong_giatrisanxuat_hangnam'><option>Chọn 1</option>";
	}
	

	foreach($dataTonggiatrisanxuathangnam2 as $row){
		$tonggiatrisanxuathangnam .= "<option value='$row->ID'>$row->Title</option>";
	}
	$tonggiatrisanxuathangnam .= "</select>";
	
	
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
			<form action="<?php echo base_url() ?>userpage/update_thongtinnhamay/<?php echo $data_thongtinnhamay->ID;?>" method="post">
			<div class='content-box'>
				<div class='thongtincoban_box'>
					<div class='table_content'>
						<div class='row'>
							<div class='left_row'>
								<span>Nhà máy đặt tại:</span>
							</div>
							<div class='right_row'>
								<input type='text' name='nhamaydattai' class='nhamaydattai' value='<?php echo $data_thongtinnhamay->Diachinhamay;?>' /> 
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Diện tích nhà máy:</span>
							</div>
							<div class='right_row'>
								<?php echo $dientichnhamay;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Cách cung cấp:</span>
							</div>
							<div class='right_row'>
								<?php echo $cachcungcap;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Kinh nghiệm</span>
							</div>
							<div class='right_row'>
								<input type='text' name='kinhnghiem' class='kinhngiem' value='<?php echo $data_thongtinnhamay->Kinhnghiem;?>'/>
								<span>Năm</span>
							</div>
						</div>


						<div class='row'>
							<div class='left_row'>
								<span class='nhansu_dambaochatluong'>Nhân sự đảm bảo chất lượng:</span>
							</div>
							<div class='right_row'>
								<?php echo $nhansudambaochatluong;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Nhân sự đảm nghiên cứu & phát triển sản phẩm:</span>
							</div>
							<div class='right_row'>
								<?php echo $nhansunghiencuuvaphattrien;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span class='soluong_daychuyensanxuat'>Số lượng dây chuyền sản xuất:</span>
							</div>
							<div class='right_row'>
								<?php echo $soluongdaychuyensanxuat;?>
							</div>
						</div>


						<div class='row'>
							<div class='left_row'>
								<span>Tổng giá trị sản xuất hàng năm:</span>
							</div>
							<div class='right_row'>
								<?php echo $tonggiatrisanxuathangnam;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
							</div>
							<div class='right_row'>
								<a class='themthongtin_giatrisanxuat'>
									+ Thêm thông tin giá trị sản xuất các mặt hàng hằng năm
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