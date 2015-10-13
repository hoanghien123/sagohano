<?php $this->load->view("topmenu"); ?>
<div class="userpage">
	<div class="left_userpage">
		<?php 
		$this->load->view("qltk_leftmenu");
		?>
	</div>
	<div class="right_userpage">
		<div class="breakcrumb"><a>Quản lý tài khoản</a> » <a>Hồ sơ thông tin cá nhân</a></div>
		<div class="hosothongtincanhan block">
			<div class="control_tab"><a data='tab1'>Danh thiếp</a><a data='tab2'>Thông tin nhu cầu mua hàng</a></div>
			<div class="tab">
				<div class="tab1 innertab">
					<form method="POST" action="<?php echo base_url().'userpage/save_danhthiep' ?>">
						<table>
							<tr>
								<td>Họ & tên</td>
								<td><input type="text" name="Hoten" value="<?php echo $this->user->NameUser ?>" /></td>
							</tr>
							<tr>
								<td>Giới tính</td>
								<td><input type="radio" name="Gioitinh" value="0" <?php echo $this->user->Gioitinh==0 ? "checked='checked'" : "" ; ?> /> Nam <input type="radio" name="Gioitinh" value="1" <?php echo $this->user->Gioitinh==1 ? "checked='checked'" : "" ; ?> /> Nữ <input type="radio" name="Gioitinh" value="2" <?php echo $this->user->Gioitinh==2 ? "checked='checked'" : "" ; ?> /> Khác</td>
							</tr>
							<tr>
								<td>Chức vụ</td>
								<td><input type="text" name="Chucvu" value="<?php echo $this->user->Chucvu ?>" /></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type="email" name="Email" value="<?php echo $this->shop->Email ?>" /></td>
							</tr>
							<tr>
								<td>Địa chỉ</td>
								<td>
									<div><span>Đường :</span> <input type="text" name="Duong" value="<?php echo $this->shop->Duong ?>" /></div>
									<div><span>Thành phố :</span> 
										<select name="CityID">
										<?php 
										$city = $this->db->query("select * from tinhthanh where ParentID=0")->result();
										$str_city = "";
										if(count($city)>0){
											foreach ($city as $row) {
												$select = $this->shop->CityID ==$row->ID ? "selected='selected'" : "" ;
												echo "<option $select value='$row->ID'>$row->Title</option>";	
												$str_city.="<option value='$row->ID'>$row->Title</option>";
											}
										}
										?>
										</select>
									</div>
									<div><span>Mã bưu chính :</span> <input type="text" name="Mabuuchinh" value="<?php echo $this->shop->Mabuuchinh ?>" /></div>
								</td>
							</tr>
							<tr>
								<td>Số điện thoại</td>
								<td><input type="text" name="Phone" value="<?php echo $this->shop->Phone ?>" /></td>
							</tr>
							<tr>
								<td>Số fax</td>
								<td><input type="text" name="Fax" value="<?php echo $this->shop->Fax ?>" /></td>
							</tr>
							<tr>
								<td>Tên công ty</td>
								<td><input type="text" name="Tencongty" value="<?php echo $this->shop->Tencongty ?>" /></td>
							</tr>
							<tr>
								<td>Loại hình kinh doanh</td>
								<td>
									<select name="Loaihinhkinhdoanh">
										<option value="0">-- Vui lòng chọn --</option>
										<?php 
										$loaihinhkinhdoanh = $this->db->query("select * from gianhang_loaihinhkinhdoanh")->result();
										if(count($loaihinhkinhdoanh)>0){
											foreach ($loaihinhkinhdoanh as $row) {
												$select = $this->shop->LoaihinhkinhdoanhID ==$row->ID ? "selected='selected'" : "" ;
												echo "<option $select value='$row->ID'>$row->Title</option>";
											}
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Website công ty</td>
								<td><input type="text" name="Website" value="<?php echo $this->shop->Website ?>" /></td>
							</tr>
							<tr>
								<td colspan=2><input type='submit' value='Lưu danh thiếp' /></td>
							</tr>
						</table>
					</form>
				</div>
				<div class="tab2 innertab">
					<form method="POST" action="<?php echo base_url().'userpage/save_thongtinmuahang' ?>">
						<?php 
						$categories = $this->db->query("select * from site_categories where ParentID=0")->result();
						$str1 = "<option value=0>-- Chọn danh mục sản phẩm --</option>";
						$arr_categories = array();
						if(count($categories)>0){
							foreach($categories as $row){
								$str1.="<option value='$row->ID'>$row->Title</option>";
								$arr_categories[$row->ID] = $row->Title;
							}
						}
						?>
						<table>
							<tr>
								<td>Lĩnh vực công nghiệp của chúng tôi</td>
								<td><input type="text" name="Linhvuccongnghiep" value="<?php echo $this->shop->Linhvuccongnghiep ?>" /></td>
							</tr>
							<tr>
								<td>Sản phẩm chúng tôi quan tâm</td>
								<td>
									<?php 
									$sanphamquantam = $this->db->query("select * from gianhang_sanphamquantam where ShopID=".$this->shop->ID)->result();
									if(count($sanphamquantam)>0){
										foreach ($sanphamquantam as $row) {
											$first = $row->CategoriesID!=0 ? "<option value='$row->ID' selected='selected'>".$arr_categories[$row->ID]."</option>" : "" ;
											echo "<div><input type='tetx' class='title_sanphamquantam' value='$row->Title' rel='$row->ID' /> <select class='choose_sanphamquantam' rel='$row->ID'>$first $str1</select></div>";
										}
									}
									?>
								</td>
							</tr>
							<tr>
								<td>Chu kỳ mua hàng</td>
								<td><select name="Chukymuahang">
								<option value="0">Vui lòng chọn</option>
								<?php
								$chukymuahang = $this->db->query("select * from gianhang_chukymuahang")->result();
								if(count($chukymuahang)>0){
									foreach ($chukymuahang as $row) {
										$select = $this->shop->ChukymuahangID==$row->ID ? "selected='selected'" : "" ;
										echo "<option $select value='$row->ID'>$row->Title</option>";
									}
								}
								 ?></select></td>
							</tr>
							<tr>
								<td>Giá trị mua hàng mỗi năm</td>
								<td><select name="Giatrimuahangmoinam">
								<option value="0">Vui lòng chọn</option>
								<?php
								$giatrimuahang = $this->db->query("select * from gianhang_giatrimuahangmoinam")->result();
								if(count($giatrimuahang)>0){
									foreach ($giatrimuahang as $row) {
										$select = $this->shop->GiatrimuahangmoinamID==$row->ID ? "selected='selected'" : "" ;
										echo "<option $select value='$row->ID'>$row->Title</option>";
									}
								}
								 ?></select> (ĐVT : triệu đồng)</td>
							</tr>
							<tr>
								<td>Ưu tiên nhà cung cấp tại</td>
								<td>
									<?php 
									$uutiennhacungcap = $this->db->query("select b.*,a.ID as IDuutien from gianhang_uutiennhacungcap a,tinhthanh b where a.CityID=b.ID and a.ShopID=".$this->shop->ID)->result();
									if(count($uutiennhacungcap)>0){
										foreach ($uutiennhacungcap as $row) {
											echo "<div><select class='uutien' rel='$row->IDuutien'><option value='$row->ID'>$row->Title</option>$str_city</select></div>";
										}
									}
									?>
									<a href="<?php echo base_url()."userpage/add_uutiennhacungcap" ?>">+ Thêm địa chỉ</a>
								</td>
							</tr>
							<tr>
								<td colspan=2>Ưu tiên nhà cung cấp với các loại hình kinh doanh</td>
							</tr>
							<tr>
								<td colspan=2>
										<?php 
										$arr = $this->db->query("select * from gianhang_uutienloaihinhkinhdoanh where ShopID=".$this->shop->ID)->result();
										$check = array();
										if(count($arr)>0){
											foreach ($arr as $row) {
												$check[] = $row->ID;
											}
										}
										$loaihinhkinhdoanh = $this->db->query("select * from gianhang_loaihinhkinhdoanh")->result();
										if(count($loaihinhkinhdoanh)>0){
											foreach ($loaihinhkinhdoanh as $row) {
												$checked=in_array($row->ID, $check) ? "checked='cheched'" : "" ;
												echo "<li><input $checked type='checkbox' name='loaihinhkinhdoanh' /> $row->Title </li>";
											}
										}
										?>
								</td>
							</tr>
							<tr>
								<td colspan=2><input type='submit' value='Lưu thông tin' /></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(".control_tab a").click(function(){
		var data = $(this).attr('data');
		$(".control_tab a").css({'background':'#F5f5f5'});
		$(this).css({'background':'#eee'});
		$(".innertab").hide();
		$("."+data).show();
	});

	$(".uutien").change(function(){
		var uutien = $(this).attr("rel");
		var ID = $(this).val();
		$.ajax({
                url: "<?php echo base_url().'userpage/change_uutien_vungmien' ?>",
                type: "POST",
                dataType: "html",
                data: "ID="+ID+"&uutien="+uutien,
                success: function(result){
                	alert("Thay đổi thành công !.");
            }
        });
	});

	$(".title_sanphamquantam").change(function(){
		var data = $(this).attr("rel");
		var title = $(this).val();
		$.ajax({
                url: "<?php echo base_url().'userpage/change_title_sanphamquantam' ?>",
                type: "POST",
                dataType: "html",
                data: "ID="+data+"&title="+title,
                success: function(result){
                	alert("Thay đổi thành công !.");
            }
        });
	});

	$(".choose_sanphamquantam").change(function(){
		var data = $(this).attr("rel");
		var title = $(this).val();
		$.ajax({
                url: "<?php echo base_url().'userpage/change_categories_sanphamquantam' ?>",
                type: "POST",
                dataType: "html",
                data: "ID="+data+"&Categories="+title,
                success: function(result){
                	alert("Thay đổi thành công !.");
            }
        });
	});
	
</script>

