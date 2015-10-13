<?php 
	$this->load->view("topmenu2"); 
	
	//Tỉnh thành
	$dataTinhthanh = $this->db->query("select * from tinhthanh where ID = $data_thongtincoban->TinhthanhID")->row();
	$dataTinhthanh2 = $this->db->query("select * from tinhthanh where ParentID = 0")->result();
	if(count($dataTinhthanh)>0){
		$vungmien = "<select name='vungmien' class='vungmien'><option value='$dataTinhthanh->ID'>$dataTinhthanh->Title</option>";
	}
	else{
		$vungmien = "<select name='vungmien' class='vungmien'><option>Chọn 1</option>";
	}
	

	foreach($dataTinhthanh2 as $row){
		$vungmien .= "<option value='$row->ID'>$row->Title</option>";
	}
	$vungmien .= "</select>";
	
	//Ngành nghề kinh doanh
	$SiteCategories = $this->db->query("select * from site_categories where ID = $data_thongtincoban->SiteCategoriesID")->row();
	$SiteCategories2 = $this->db->query("select * from site_categories where Published=1")->result();
	if(count($SiteCategories)>0){
		$nganhnghe = "<select name='nganhnghe' class='nganhnghe'><option value='$SiteCategories->ID'>$SiteCategories->Title</option>";
	}
	else{
		$nganhnghe = "<select name='nganhnghe' class='nganhnghe'><option>Chọn 1</option>";
	}	
		
	foreach($SiteCategories2 as $row){
		$nganhnghe .= "<option value='$row->ID'>$row->Title</option>";
	}
	$nganhnghe .= "</select>";
	
	//loại hình kinh doanh
	$Gianhang_loaihinhkinhdoanh = $this->db->query("select * from gianhang_loaihinhkinhdoanh where ID = $data_thongtincoban->LoaihinhkinhdoanhID")->row();
	$Gianhang_loaihinhkinhdoanh2 = $this->db->query("select * from gianhang_loaihinhkinhdoanh where Published=1")->result();
	if(count($Gianhang_loaihinhkinhdoanh)>0){
		$loaihinhkinhdoanh = "<select name='loaihinhkinhdoanh' class='loaihinhkinhdoanh'><option value='$Gianhang_loaihinhkinhdoanh->ID'>$Gianhang_loaihinhkinhdoanh->Title</option>";
	}
	else{
		$loaihinhkinhdoanh = "<select name='loaihinhkinhdoanh' class='loaihinhkinhdoanh'><option>Chọn 1</option>";
	}	
		
	foreach($Gianhang_loaihinhkinhdoanh2 as $row){
		$loaihinhkinhdoanh .= "<option value='$row->ID'>$row->Title</option>";
	}
	$loaihinhkinhdoanh .= "</select>";
	
	//Sản phẩm chính
	$sanphamchinh = explode("/",$data_thongtincoban->Sanphamchinh);
	$sanphamchinhStr = "";
	for($i=0;$i<count($sanphamchinh);$i++){
		$sanphamchinhStr .= "<input type='text' name='sanphamchinh$i' class='sanphamchinh' value='$sanphamchinh[$i]'/>";
	}
	
	//Tổng nhân lực
	$Gianhang_tongnhanluc = $this->db->query("select * from gianhang_tongnhanluc where ID = $data_thongtincoban->TongnhanlucID")->row();
	$Gianhang_tongnhanluc2 = $this->db->query("select * from gianhang_tongnhanluc")->result();
	if(count($Gianhang_tongnhanluc)>0){
		$tongnhanluc = "<select name='tongnhanluc' class='tongnhanluc'><option value='$Gianhang_tongnhanluc->ID'>$Gianhang_tongnhanluc->Title</option>";
	}
	else{
		$tongnhanluc = "<select name='tongnhanluc' class='tongnhanluc'><option>Chọn 1</option>";
	}	
		
	foreach($Gianhang_tongnhanluc2 as $row){
		$tongnhanluc .= "<option value='$row->ID'>$row->Title</option>";
	}
	$tongnhanluc .= "</select>";
	
	//Diện tích văn phòng
	$Gianhang_dientichvanphong = $this->db->query("select * from gianhang_dientichvanphong where ID = $data_thongtincoban->DientichvanphongID")->row();
	$Gianhang_dientichvanphong2 = $this->db->query("select * from gianhang_dientichvanphong")->result();
	if(count($Gianhang_dientichvanphong)>0){
		$dientichvanphong = "<select name='dientichvanphong' class='dientichvanphong'><option value='$Gianhang_dientichvanphong->ID'>$Gianhang_dientichvanphong->Title</option>";
	}
	else{
		$dientichvanphong = "<select name='dientichvanphong' class='dientichvanphong'><option>Chọn 1</option>";
	}	
		
	foreach($Gianhang_dientichvanphong2 as $row){
		$dientichvanphong .= "<option value='$row->ID'>$row->Title</option>";
	}
	$dientichvanphong .= "</select>";
	
	
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
<style>
.menu_userpage ul li.li3{background-color: #ffd558;}
</style>

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
			<form action="<?php echo base_url() ?>userpage/update_thongtincoban/<?php echo $data_thongtincoban->ID;?>" method="post" id='thongtincoban'>
			<div class='content-box'>
				<div class='thongtincoban_box'>
					<div class='table_content'>
						<div class='row'>
							<div class='left_row'>
								<span>Tên công ty:</span>
							</div>
							<div class='right_row'>
								<input type='text' name='Tencongty' class='tencongty' value='<?php echo $data_thongtincoban->Tencongty;?>'/> 
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Vùng/miền đăng ký kinh doanh:</span>
							</div>
							<div class='right_row'>
								<?php echo $vungmien;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Trụ sở chính:</span>
							</div>
							<div class='right_row'>
								<span>Đường:</span><input type='text' class='duong' name='duong' value='<?php echo $data_thongtincoban->Duong;?>' />
								<span>Quận/Huyện:</span><input type='text' class='quanhuyen' name='quanhuyen' value='<?php echo $data_thongtincoban->QuanHuyen;?>' />
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Ngành nghề kinh doanh/sản xuất:</span>
							</div>
							<div class='right_row'>
								<?php echo $nganhnghe;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Loại hình kinh doanh:</span>
							</div>
							<div class='right_row'>
								<?php echo $loaihinhkinhdoanh; ?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Sản phẩm chính:</span>
							</div>
							<div class='right_row'>
								<?php echo $sanphamchinhStr;?>
								<span class='sanphamchinh'>Hãy điền vào những sản phẩm chính của công ty bạn, 1 ô 1 sản phẩm</span>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Mã số thuế:</span>
							</div>
							<div class='right_row'>
								<input type='text' class='masothue' name='masothue' value='<?php echo $data_thongtincoban->Masothue;?>'>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Năm thành lập:</span>
							</div>
							<div class='right_row'>
								<select class='chonnam' name='nam'>
									<?php
										if($data_thongtincoban->Namthanhlap == 0){
											echo "<option>Chọn năm</option>";
										}
										else{
											echo "<option>$data_thongtincoban->Namthanhlap</option>";
										}
										
										for($i=2015;$i>1900;$i--){
											echo "<option value='$i'>$i</option>";
										}
									?>
								</select>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Tổng nhân lực:</span>
							</div>
							<div class='right_row'>
								<?php echo $tongnhanluc;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Website công ty:</span>
							</div>
							<div class='right_row'>
								<input type='text' name='website' class='website' value='<?php echo $data_thongtincoban->Website;?>'>
							</div>
						</div>


						<div class='row'>
							<div class='left_row'>
								<span>Chủ sở hữu:</span>
							</div>
							<div class='right_row'>
								<input type='text' name='chusohuu' class='chusohuu' value='<?php echo $data_thongtincoban->Chusohuu;?>'>
							</div>
						</div>


						<div class='row'>
							<div class='left_row'>
								<span>Diện tích văn phòng:</span>
							</div>
							<div class='right_row'>
								<?php echo $dientichvanphong;?>
							</div>
						</div>

						<div class='row'>
							<div class='left_row'>
								<span>Thế mạnh của công ty:</span>
							</div>
							<div class='right_row'>
								<textarea class='themanh' name="themanh">
									<?php echo $data_thongtincoban->Themanhcongty;?>
								</textarea>
								<span class='themanh_conlai'>Còn lại: 300 từ</span>
								<span class='themanh_mota'>Hãy mô tả ngắn gọn về thế mạnh của công ty bạn. Ví dụ: Công ty chúng tôi đã trả qua hơn 20 năm kinh nghiệm trong...</span>
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
			</div><!-- end content-box-->
			</form>
		</div>

	</div>
</div>