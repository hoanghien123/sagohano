<div class="update_information">
	<div class="header_update_infomation"><img src='public/site/images/chim_white.png' alt='sagohano' /></div>
	<div class="title">Chào mừng thành viên mới của cộng đồng doanh nghiệp Việt Nam <span>Sagohano </span></div>
	<div class="box">
		<h3>Tài khoản của bạn sẽ được kích hoạt ngay sau khi cập nhật những thông tin quan trọng sau đây :</h3>
		<table>
			<form method="POST" action="<?php echo base_url().'save-information' ?>" id="checkform">
				<tr>
					<th>Thông tin công ty</th>
					<th><span>*</span> Thông tin thiết yếu</th>
				</tr>
				<tr>
					<td><span>*</span> Tên công ty</td>
					<td><input type='text' name="Name_congty" required /></td>
				</tr>
				<tr>
					<td><span>*</span> Ngành nghề kinh doanh/sản xuất</td>
					<td><select name="CategoriesID" class="select_valid">
						<option value="0">Chọn 1 ngành nghề kinh doanh</option>
						<?php 
						$categories = $this->db->query("select * from site_categories where Published=1")->result();
						if(count($categories)>0){
							foreach ($categories as $row) {
								echo "<option value='$row->ID'>$row->Title</option>";
							}
						}
						?>
					</select></td>
				</tr>
				<tr>
					<td><span>*</span> Loại hình kinh doanh</td>
					<td><select name="LoaihinhkinhdoanhID" class="select_valid1">
						<option value="0">Chọn 1 loại hình kinh doanh</option>
						<?php 
						$loaihinh = $this->db->query("select * from gianhang_loaihinhkinhdoanh where Published=1")->result();
						if(count($loaihinh)>0){
							foreach ($loaihinh as $row) {
								echo "<option value='$row->ID'>$row->Title</option>";
							}
						}
						?>
					</select></td>
				</tr>
				<tr>
					<td><span>*</span> Mã số thuế</td>
					<td><input type='text' name="Masothue" required /></td>
				</tr>
				<tr>
					<th>Thông tin cá nhân</th>
					<th></th>
				</tr>
				<tr>
					<td><span>*</span> Tên người quản lý trang</td>
					<td><input type='text' name="Name_nguoiquanly" required /></td>
				</tr>
				<tr>
					<td>Chức vụ</td>
					<td><input type='text' name="Chucvu" /></td>
				</tr>
				<tr>
					<td>Email liên lạc</td>
					<td><input type='email' name="Email" /></td>
				</tr>
				<tr>
					<td><span>*</span>  Số điện thoại</td>
					<td><input type='text' name="Phone" required /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type= 'submit' value="Cập nhật" /> <a href=''>Cập nhật sau ...</a></td>
				</tr>
			</form>
		</table>
		<p class="warning">Tài khoản đăng ký sẽ tự hủy nếu không được cập nhật những thông tin (*) trong 7 ngày .</p>
	</div>
</div>
<Script>
	$("#checkform").submit(function(){
		var select1 = $(".select_valid").val();
		if(select1==0){
			alert("Vui lòng chọn ngành nghề kinh doanh .");
			return false;	
		}
		var select2 = $(".select_valid1").val();
		if(select2==0){
			alert("Vui lòng chọn loại hình kinh doanh .");
			return false;
		}
		
	});
</script>