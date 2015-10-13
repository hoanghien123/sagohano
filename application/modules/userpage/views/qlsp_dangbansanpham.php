<script type="text/javascript" src="<?php echo base_url()?>public/plugin/ckeditor/ckeditor.js"></script>
<?php
	/* LIST DANH MỤC */
	$site_categories = $this->db->query("select * from site_categories where ParentID = 0")->result();
	$list_danhmuc = "";
	foreach($site_categories as $row){
		$list_danhmuc .= "<li><span style='display:none'>$row->ID</span>$row->Title</li>";
	}
	/* VÙNG MIỀN ĐĂNG KÝ */
	$tinhthanh = $this->db->query("select * from tinhthanh where ParentID=0")->result();
	$tinhthanh_str = "";
	foreach($tinhthanh as $row){
		$tinhthanh_str .= "<option value='$row->ID'>$row->Title</option>";
	}
	/* PHƯƠNG THỨC THANH TOÁN ƯU TIÊN */
	$phuongthucthanhtoanuutien = $this->db->query("select * from gianhang_phuongthucthanhtoanuutien")->result();
	$phuongthucthanhtoanuutien_str = "";
	foreach($phuongthucthanhtoanuutien as $row){
		$phuongthucthanhtoanuutien_str .= "<option value='$row->ID'>$row->Title</option>";
	}
	/* ĐƠN VỊ */
	$data_gianhang_donvi = $this->db->query("select * from gianhang_donvi")->result();
	$data_gianhang_donvi_str = "";
	if(count($data_gianhang_donvi)>0){
		foreach ($data_gianhang_donvi as $row) {
			$data_gianhang_donvi_str .= "<option value='$row->ID'>$row->Title</option>";
		}
	} 
	
?>

<?php $this->load->view("topmenu3"); ?>
<style type="text/css">
	.menu_userpage ul li.li1{background: #FFF !important}
	.menu_userpage ul li.li4{background-color: #ffd558}
	.thongtincongty .left_thongtincongty .menu_left ul li a.phannhom{background-color:#FFF !important;}
</style>
<div class="thongtincongty">
	<div class="left_thongtincongty">
		<?php 
		$this->load->view("qlsp_leftmenu");
		?>
		<style type="text/css">
		.thongtincongty .left_thongtincongty .menu_left ul li a.current{background-color: #FFFFFF;}
		.thongtincongty .left_thongtincongty .menu_left ul li a.phannhom{background-color: #ececec;}
		</style>
	</div>
	<div class="dbsp_sanpham">
		<div class='dbsp_top'>
			<div class='title'>
				<span class='thongtincoban hv'>Thông tin cơ bản</span>
				<span class='motachitiet'>Mô tả chi tiết</span>
				<span class='thongtingiaodich'>Thông tin giao dịch</span>
			</div>
		</div><!-- end dbsp_top-->

		<form action='<?php echo base_url() ?>userpage/add_sanpham' method="post" id='thongtincoban' enctype="multipart/form-data">
		<div class='dbsp_content'>
			<div class='block_thongtincoban'>
				<div class='row'>
					<div class='col'>Tên sản phẩm:</div>
					<div class='col2'><input type='text' class='tensanpham' name='tensanpham'/></div>
				</div>

				<div class='row'>
					<div class='col'>Hình ảnh đại diện:</div>
					<div class='col2'>
						<div class='anh_daidien'>
							<div class='anh'>
								<img src='<?php echo base_url()."public/site/images/userpage/images_up.png";?>' alt='logo' name='logo_congty' id='anhdaidien' />
							</div>
							<div class='tailen'>
								<input type='file' class='anhdaidien_sp' name='Images_upload_daidien' onchange="read_anhdaidien(this);"/>
								<span class='xoa_anhdaidien'>Xóa ảnh</span><br/>
								<span class='gioihan'>Tối đa 200KB. Định dạng JPEG và PNG</span>
							</div>
						</div>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Hình ảnh:</div>
					<div class='col2'>
						<div><input type="FILE" name="Images_upload[]" id="Images_upload" accept="image/*" multiple /></div>
                        <div id="preview_images" style='background:#CCC; margin-top:20px;'>Có thể chọn nhiều hình (ít hơn 10 hình)</div>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Từ khóa sản phẩm:</div>
					<div class='col2'>
						<input type='text' class='tukhoasanpham' name='tukhoasanpham'/>
						<span>
							<p>Nhập từ khóa sản phẩm mà khách hàng có thể sử dụng để tìm sản phẩm này của công ty bạn.</p>
							<p style='color:#999999'>Ví dụ: hãy sủ dụng từ khóa "Thùng giấy" hoặc "Thùng giấy carton" nếu bạn muốn bán sản phẩm "Thùng carton".</p>
						</span>
					</div>
				</div>
				
				<div class='row'>
					<div class='col'>Danh mục gợi ý:</div>
					<div class='col2'>
						<input type='text' class='tukhoasanpham' name='danhmucgoiy' id='danhmucgoiy'/><input type='button' class='search_dm_goiy' value='Tìm'/>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Danh mục sản phẩm:</div>
					<div class='col2'>
						<div class='danhmuc'>
							<input type='hidden' value='10' class='dmsp' name='danhmuc'/>
							<span class='title_dmsp'>Chọn 1</span>
							<div class='khung_chon'>
								<div class='top'>
									<div class='pre_categories' id='0'><i class="fa fa-chevron-left"></i></div>
									<div class='tatcadanhmuc' style='background: -o-linear-gradient(#5da9f4,#2e79c5);background: -moz-linear-gradient(#5da9f4,#2e79c5);background: -webkit-linear-gradient(#5da9f4,#2e79c5);color: #FFF;'>Tất cả danh mục</div>
									<div class='danhmucgoiy'>Danh mục gợi ý</div>
									<div class='danhmucdachonganday'>Danh mục đã chọn gần đây</div>
								</div>
								<div class='block'>
									<ul>
										<div class=''></div>
										<?php
										echo $list_danhmuc;
										?>
									</ul>
								</div><!-- end .block -->
								<div class='footer'>
								</div>

							</div><!-- end khungchon-->
							
							<div class='khung_chon2'>
								<div class='block'>
									<ul>
										
									</ul>
								</div><!-- end .block -->
								<div class='footer'>
								</div>

							</div><!-- end khungchon-->
							
						</div><!-- end danhmuc-->

					</div>
				</div>

				<div class='row'>
					<div class='col'>Chi tiết sản phẩm:</div>
					<div class='col2'>
						<textarea rows="7" cols="78" name="noidung" id="v_message_offline_edit" cols="20" rows="3" placeholder="Mô tả chi tiết sản phẩm..." class="block_ctsp"></textarea>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Thêm chi tiết sản phẩm:</div>
					<div class='col2'>
						<div class='danhsach_dactinh'>
							<div class='dactinh_ct'>
								<input type='text' name='dactinh[]' class='dactinh' placeholder='Đặc tính/Tên chi tiết (Ví dụ: Màu)'>
								<input type='text' name='dactinh[]' class='giatri' placeholder='Giá trị (Ví dụ: Xanh lá cây)'>
							</div>
						</div>
						<p style='color:#999'>Bạn có thể để thêm đến <span style="color:#444">10 chi tiết sản phẩm khác</span> mà bạn không tìm thấy trong danh sách chi tiết sản phẩm gợi 
							ý có sẵn của chúng tôi để giúp người mua tìm được sản phẩm dễ dàng hơn.</p>
						<input type='button' class='them_ctsp' value='+ Thêm'>
					</div>
				</div>

			</div><!-- end block_thongtincoban -->

			<div class='block_motachitiet'>
				<textarea  name="Introtext" class="ckeditor"></textarea>

			</div><!-- end block_motachitiet -->

			<div class='block_thongtingiaodich'>
				<div class='row'>
					<div class='col'>Số lượng đơn hàng tối thiểu:</div>
					<div class='col2'>
						<input type='text' class='soluongdonhang' name='soluongdonhangtoithieu' placeholder='Số lượng'/>
						<select class='donvitinh'  name='donvitinh1'>
							<option>Đơn vị tính</option>
							<?php echo isset($data_gianhang_donvi_str)>0 ? $data_gianhang_donvi_str : "" ?>
						</select>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Giá <span style='font-weight:normal;font-size:11px'>(Chưa bao gồm vận chuyển & VAT)</span>:</div>
					<div class='col2'>
						<input type='text' class='giathapnhat' name='giathapnhat' placeholder='Giá thấp nhất'/>  <span class='ll'>-</span>  
						<input type='text' class='giacaonhat' name='giacaonhat' placeholder='Giá cao nhất'/>
						<select class='donvitinh' name='donvitinh_gia'>
							<option>Đơn vị tính</option>
							<option>VNĐ</option>
							<option>USD</option>
						</select>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Vùng/miền nơi cung cấp:</div>
					<div class='col2'>
						<select class='tinhthanhpho' name='tinhthanh'>
							<option>Tỉnh/ Thành phố</option>
							<?php
							echo $tinhthanh_str;
							?>
						</select>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Phương thức thanh toán ưu tiên:</div>
					<div class='col2'>
						<select class='phuongthucthanhtoanuutien' name='phuongthuc_thanhtoan_uutien'>
							<option>Chọn 1</option>
							<?php 
								echo $phuongthucthanhtoanuutien_str;
							?>
						</select>
						<input type='checkbox' class='lc'><span class='lc'>L/C</span>
						<input type='checkbox' class='tt'><span class='tt'>T/T</span>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Khả năng cung ứng:</div>
					<div class='col2'>
						<input type='text' class='khanangcungung' placeholder='Số lượng' name='khanangcungung1'/>
						<span class='ll'>/</span> 
						<select class='donvitinh' name='donvitinh2'>
							<option value=''>Đơn vị tính</option>
							<?php echo isset($data_gianhang_donvi_str)>0 ? $data_gianhang_donvi_str : "" ?>
						</select>
						<span class='ll'>/</span> 
						<select class='thoigian' name='thoigian2'>
							<option value=''>Thời gian</option>
							<option value='ngày'>ngày</option>
						</select>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Thời gian vận chuyển:</div>
					<div class='col2'>
						<input type='text' class='thoigianvanchuyen' name='thoigianvanchuyen' placeholder='Thời gian'/>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Chi tiết/ Quy cách đóng gói:</div>
					<div class='col2'>
						<input type='text' class='quycachdonggoi' name='quycachdonggoi' placeholder='VD: Thùng 30 cái x 1 hộp'/>
					</div>
				</div>
			</div><!-- end block_thongtingiaodich -->

		</div><!-- end dbsp_content-->

		<div class='dbsp_footer'>
			<div class='row'>
				<input type='checkbox' class='dieukhoan' name='dieukhoan' required>
				<span>Đồng ý với <span style='color:#06C'>điều khoản đăng bán sản phẩm</span> và <span style='color:#06C'>điều khoản sử dụng</span> của <span style='font-weight:bold'>Sagohano</span></span>
			</div>
			<div class='row'>
				<input type='submit' value='Đăng bán & Thêm sản phẩm tương tự' class='dangban_tuongtu' name='dangbanvathem'>
				<input type='submit' value='Đăng bán' class='dangban' name='dangban'>
				<input type='submit' value='Lưu nháp' class='luunhap' name='luunhap'>
			</div>
		</div><!-- dbsp_footer-->

		</form><!-- end FORM-->

	</div><!-- end .qlsp-->
</div>

<script type="text/javascript">
	$(document).ready(function(){
		/* --- KHUNG CHỌN DANH MỤC--*/
		$('.title_dmsp').click(function(){
			$('.khung_chon').css({"display":"block"});
		});

		$(document).on('click', ".khung_chon ul li", function() {
			var value = $(this).html();
			var value2 = $(this).find('span').html();
			$.ajax({
				  url: "userpage/showdanhmuc_child",
				  type: "POST",
				  dataType: "text",
				  context: this,
				  data: "id="+value2,
				  beforeSend: function() {
						$(".load_ajax").show();					
					},
				  success: function(result){
						if(result)
						{
							if(result != 'last'){
								$('.khung_chon .block ul').html(result);
								$('.pre_categories').attr("id",value2);
							}
							else{
								$(this).closest('.danhmuc').find('.title_dmsp').html(value);
								$(this).closest('.danhmuc').find('.dmsp').val(value2);
								$('.khung_chon').css({"display":"none"});
							}
						}
						else
						{	
							alert("Có lỗi 1 !!");
						}									
				  },
				  error:function(){
					  alert("Có lỗi 2!!");
				  }
			});
		});
		
		$(document).on('click', ".pre_categories", function() {
			var value = $(this).attr("id");
			$.ajax({
				  url: "userpage/showdanhmuc_pre",
				  type: "POST",
				  dataType: "text",
				  context: this,
				  data: "id="+value,
				  beforeSend: function() {
						$(".load_ajax").show();					
					},
				  success: function(result){
						if(result)
						{
							if(result == 'last'){
								return;
							}
							else{
								$('.khung_chon').html(result);
							}
							
						}
						else
						{	
							alert("Có lỗi 1 !!");
						}									
				  },
				  error:function(){
					  alert("Có lỗi 2!!");
				  }
			});
		});
		
		
		$(document).on('click', ".danhmucgoiy", function() {
			$('.tatcadanhmuc').css({"background":"#FFF","color":"#444"});
			$('.danhmucgoiy').css({"background":"#FFF","color":"#444"});
			$('.danhmucdachonganday').css({"background":"#FFF","color":"#444"});
			$(this).css({"background":"-o-linear-gradient(#5da9f4,#2e79c5)","background":"-moz-linear-gradient(#5da9f4,#2e79c5)","background":"-webkit-linear-gradient(#5da9f4,#2e79c5)","color":"#FFF"});
			var value = $('#danhmucgoiy').val();
			$.ajax({
				  url: "userpage/showdanhmuc_goiy",
				  type: "POST",
				  dataType: "text",
				  context: this,
				  data: "id="+value,
				  beforeSend: function() {
						$(".load_ajax").show();					
					},
				  success: function(result){
						if(result)
						{
							$('.khung_chon .block ul').html(result);
						}
						else
						{	
							alert("Có lỗi 1 !!");
						}									
				  },
				  error:function(){
					  alert("Có lỗi 2!!");
				  }
			});
			
		});
		
		$(document).on('click', ".tatcadanhmuc", function() {
			$('.tatcadanhmuc').css({"background":"#FFF","color":"#444"});
			$('.danhmucgoiy').css({"background":"#FFF","color":"#444"});
			$('.danhmucdachonganday').css({"background":"#FFF","color":"#444"});
			$(this).css({"background":"-o-linear-gradient(#5da9f4,#2e79c5)","background":"-moz-linear-gradient(#5da9f4,#2e79c5)","background":"-webkit-linear-gradient(#5da9f4,#2e79c5)","color":"#FFF"});
			
			var value = 0;
			$.ajax({
				  url: "userpage/showdanhmuc_tatcadanhmuc",
				  type: "POST",
				  dataType: "text",
				  context: this,
				  data: "id="+value,
				  beforeSend: function() {
						$(".load_ajax").show();					
					},
				  success: function(result){
						if(result)
						{
							$('.khung_chon .block ul').html(result);
						}
						else
						{	
							alert("Có lỗi 1 !!");
						}									
				  },
				  error:function(){
					  alert("Có lỗi 2!!");
				  }
			});
			
		});
		
		$(document).on('click', ".danhmucdachonganday", function() {
			$('.tatcadanhmuc').css({"background":"#FFF","color":"#444"});
			$('.danhmucgoiy').css({"background":"#FFF","color":"#444"});
			$('.danhmucdachonganday').css({"background":"#FFF","color":"#444"});
			$(this).css({"background":"-o-linear-gradient(#5da9f4,#2e79c5)","background":"-moz-linear-gradient(#5da9f4,#2e79c5)","background":"-webkit-linear-gradient(#5da9f4,#2e79c5)","color":"#FFF"});
			
			var value = 0;
			$.ajax({
				  url: "userpage/showdanhmuc_danhmucganday",
				  type: "POST",
				  dataType: "text",
				  context: this,
				  data: "id="+value,
				  beforeSend: function() {
						$(".load_ajax").show();					
					},
				  success: function(result){
						if(result)
						{
							$('.khung_chon .block ul').html(result);
						}
						else
						{	
							$('.khung_chon .block ul').html("");
						}									
				  },
				  error:function(){
					  alert("Có lỗi 2!!");
				  }
			});
			
		});
		/* --- END KHUNG CHỌN DANH MỤC --*/
		

		$('.dbsp_top .title .motachitiet').click(function(){
			$(this).addClass("hv");
			$('.dbsp_top .title .thongtincoban').removeClass("hv");
			$('.dbsp_top .title .thongtingiaodich').removeClass("hv");

			$('.dbsp_content .block_thongtincoban').css({"display":"none"});
			$('.dbsp_content .block_motachitiet').css({"display":"block"});
			$('.dbsp_content .block_thongtingiaodich').css({"display":"none"});
		});

		$('.dbsp_top .title .thongtincoban').click(function(){
			$(this).addClass("hv");
			$('.dbsp_top .title .motachitiet').removeClass("hv");
			$('.dbsp_top .title .thongtingiaodich').removeClass("hv");

			$('.dbsp_content .block_thongtincoban').css({"display":"block"});
			$('.dbsp_content .block_motachitiet').css({"display":"none"});
			$('.dbsp_content .block_thongtingiaodich').css({"display":"none"});
		});

		$('.dbsp_top .title .thongtingiaodich').click(function(){
			$(this).addClass("hv");
			$('.dbsp_top .title .motachitiet').removeClass("hv");
			$('.dbsp_top .title .thongtincoban').removeClass("hv");

			$('.dbsp_content .block_thongtincoban').css({"display":"none"});
			$('.dbsp_content .block_motachitiet').css({"display":"none"});
			$('.dbsp_content .block_thongtingiaodich').css({"display":"block"});
		});

	});

function read_anhdaidien(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#anhdaidien').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}
/* Thêm đặc tính */
//=====================Thêm đặc tính
$(document).on('click', ".them_ctsp", function() {
	$(this).closest(".col2").find('.danhsach_dactinh').append("<div class='dactinh_ct'>\
										<input type='text' name='dactinh[]' class='dactinh' placeholder='Đặc tính/Tên chi tiết (Ví dụ: Màu)'>\
										<input type='text' name='dactinh[]' class='giatri' placeholder='Giá trị (Ví dụ: Xanh lá cây)'>\
									</div>");
});

$(document).on('click', ".search_dm_goiy", function() {
	$('.khung_chon').css({"display":"block"});
	$('.tatcadanhmuc').css({"background":"#FFF","color":"#444"});
	$('.danhmucgoiy').css({"background":"#FFF","color":"#444"});
	$('.danhmucdachonganday').css({"background":"#FFF","color":"#444"});
	$('.danhmucgoiy').css({"background":"-o-linear-gradient(#5da9f4,#2e79c5)","background":"-moz-linear-gradient(#5da9f4,#2e79c5)","background":"-webkit-linear-gradient(#5da9f4,#2e79c5)","color":"#FFF"});
	var value = $('#danhmucgoiy').val();
	$.ajax({
		  url: "userpage/showdanhmuc_goiy",
		  type: "POST",
		  dataType: "text",
		  context: this,
		  data: "id="+value,
		  beforeSend: function() {
				$(".load_ajax").show();					
			},
		  success: function(result){
				if(result)
				{
					$('.khung_chon .block ul').html(result);
				}
				else
				{	
					alert("Có lỗi 1 !!");
				}									
		  },
		  error:function(){
			  alert("Có lỗi 2!!");
		  }
	});
});


</script>

<script>
	var files = files || {};
    files.handleFileSelect = function(evt) {
        document.getElementById('preview_images').innerHTML = [''];
        var files = evt.target.files;
        if(files.length > 10){
            alert("Album chỉ cho phép upload tối đa 10 hình !!");
            return false;
        }
        strfail = "";
        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            if(f.size > 1048576){
                if(strfail!="")
                    strfail+=(f.name)+"     Kích thước   "+(f.size/1024)+"kb\n";
                else
                    strfail+="\n"+(f.name)+"     Kích thước   "+(f.size/1024)+"kb\n";
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    var span = document.createElement('span');
                    span.innerHTML = ['<img class="thumb" src="', e.target.result, '" title="', escape(theFile.name), '" style="width:100px;margin-left:10px; border:1px solid #888;padding:3px; margin-top:10px;margin-bottom:10px;background:#FFF" />'].join('');
                    document.getElementById('preview_images').insertBefore(span, null);
                };
            })(f);
            reader.readAsDataURL(f);
        }
        if(strfail!="")
            alert("Các hình "+strfail+" kích thước quá lớn");
    };
    document.getElementById('Images_upload').addEventListener('change', files.handleFileSelect, false);
</script>

