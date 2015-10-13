<script type="text/javascript" src="<?php echo base_url()?>public/plugin/ckeditor/ckeditor.js"></script>
<?php
	/* LIST DANH MỤC */
	$site_categories = $this->db->query("select * from site_categories")->result();
	$site_categories_this = $this->db->query("select * from site_categories where ID = $data_sanpham->CategoriesID")->row();
	$list_danhmuc = count($site_categories_this)>0 ? "<li><span style='display:none'>$site_categories_this->ID</span>$site_categories_this->Title</li>" : "" ;
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
	/* LIST HÌNH ẢNH */
	$data_list_hinhanh = $this->db->query("select b.ID as ID,b.Path as Url from gianhang_sanpham_images a,files b WHERE a.ImageID = b.ID AND SanphamID = $data_sanpham->ID")->result();
	/* ĐƠN VỊ */
	$data_gianhang_donvi = $this->db->query("select * from gianhang_donvi")->result();
	$data_gianhang_donvi_str = "";
	if(count($data_gianhang_donvi)>0){
		foreach ($data_gianhang_donvi as $row) {
			$data_gianhang_donvi_str .= "<option value='$row->Title'>$row->Title</option>";
		}
	} 
	
	/* LIST OPTION */
	$list_option = $this->db->query("select * from gianhang_option where SanphamID = $data_sanpham->ID")->row();
	$list_option_str = "";
	if(count($list_option)>0){
		$optionStr = explode("_", $list_option->Title);
		foreach($optionStr as $row){
			if($row != '*'){
				$optionStr2 = explode("*", $row);
				foreach($optionStr2 as $key =>$row2){
					if($row2 != " "){
						if($key % 2 === 0){
							$list_option_str .= "<input type='text' name='dactinh[]' class='dactinh' placeholder='Giá trị (Ví dụ: Xanh lá cây)' value='$row2'>";
						}
						else{
							$list_option_str .= "<input type='text' name='dactinh[]' class='dactinh' placeholder='Đặc tính/Tên chi tiết (Ví dụ: Màu)' value='$row2'>";
						}
					}
				}
			}
		}		
		$list_option_str .= "
		<input type='text' name='dactinh[]' class='dactinh' placeholder='Đặc tính/Tên chi tiết (Ví dụ: Màu)' style='margin-left:-4px'>
		";
	}
	else{
		$list_option_str .= "
		<input type='text' name='dactinh[]' class='dactinh' placeholder='Đặc tính/Tên chi tiết (Ví dụ: Màu)' style='margin-left:-4px'>
		<input type='text' name='dactinh[]' class='dactinh' placeholder='Giá trị (Ví dụ: Xanh lá cây)' style='margin-left:-4px'>
		";
	}
?>

<?php $this->load->view("topmenu3"); ?>
<style type="text/css">
	.menu_userpage ul li.li1{background: #FFF !important}
	.menu_userpage ul li.li4{background-color: #ffd558}
	.thongtincongty .left_thongtincongty .menu_left ul li a.phannhom{background-color:#FFF !important;}
	.delete_album_image{position: absolute;z-index: 10000;cursor: pointer;padding: 5px 5px;background: red;margin: 0px 0px 0px -17px;background: #2e79c5;padding: 0px 4px;cursor: pointer;    color: #FFF;}
	.thongtincongty .left_thongtincongty .menu_left ul li a.current{background-color: #FFFFFF;}
	.thongtincongty .left_thongtincongty .menu_left ul li a.phannhom{background-color: #ececec;}
</style>
<div class="thongtincongty">
	<div class="left_thongtincongty">
	<?php 
		$this->load->view("qlsp_leftmenu");
	?>
	</div>
	<div class="dbsp_sanpham">
		<div class='dbsp_top'>
			<div class='title'>
				<span class='thongtincoban hv'>Thông tin cơ bản</span>
				<span class='motachitiet'>Mô tả chi tiết</span>
				<span class='thongtingiaodich'>Thông tin giao dịch</span>
			</div>
		</div><!-- end dbsp_top-->

		<form action='<?php echo base_url() ?>userpage/edit_sanpham/<?php echo $data_sanpham->ID;?>' method="post" id='thongtincoban' enctype="multipart/form-data">
		<div class='dbsp_content'>
			<div class='block_thongtincoban'>
				<div class='row'>
					<div class='col'>Tên sản phẩm:</div>
					<div class='col2'><input type='text' class='tensanpham' name='tensanpham' value='<?php echo isset($data_sanpham->Title) ? $data_sanpham->Title : "" ;?>'/></div>
				</div>

				<div class='row'>
					<div class='col'>Hình ảnh đại diện:</div>
					<div class='col2'>
						<div class='anh_daidien'>
							<div class='anh'>
								<img src='<?php echo isset($data_sanpham->Image_Url) ? $data_sanpham->Image_Url : base_url()."public/site/images/userpage/images_up.png";?>' alt='logo' name='logo_congty' id='anhdaidien' />
							</div>
							<div class='tailen'>
								<input type='file' class='anhdaidien_sp' name='Images_upload_daidien' onchange="read_anhdaidien(this);"/>
								<span class='xoa_anhdaidien'>Xóa logo</span><br/>
								<span class='gioihan'>Tối đa 200KB. Định dạng JPEG và PNG</span>
							</div>
						</div>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Album ảnh:</div>
					<div class='col2'>
                        <div style='background:#CCC;padding:10px'>
                        	<?php
                        		if(isset($data_list_hinhanh) && count($data_list_hinhanh)>0){
                        			foreach ($data_list_hinhanh as $row) {
                        				echo "
                        				<span class='hinhanh_al'>
											<img class='thumb' src='$row->Url' style='height:100px;'/><span class='delete_album_image' id='$row->ID'>X</span>
										</span>
                        				";
                        			}
                        		}
                        		else{
                        			echo "Chưa có ảnh trong Album";
                        		}
                        	?>
                        	
                        </div>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Thay bằng Album ảnh khác:</div>
					<div class='col2'>
						<div><input type="FILE" name="Images_upload[]" id="Images_upload" accept="image/*" multiple /></div>
                        <div id="preview_images" style='background:#CCC; margin-top:20px;'>
                        	Có thể chọn nhiều hình (ít hơn 10 hình)
                        </div>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Từ khóa sản phẩm:</div>
					<div class='col2'>
						<input type='text' class='tukhoasanpham' name='tukhoasanpham' value='<?php echo isset($data_sanpham->MetaTitle) ? $data_sanpham->MetaTitle : "" ;?>'/>
						<span>
							<p>Nhập từ khóa sản phẩm mà khách hàng có thể sử dụng để tìm sản phẩm này của công ty bạn.</p>
							<p style='color:#999999'>Ví dụ: hãy sủ dụng từ khóa "Thùng giấy" hoặc "Thùng giấy carton" nếu bạn muốn bán sản phẩm "Thùng carton".</p>
						</span>
					</div>
				</div>
				
				<div class='row'>
					<div class='col'>Danh mục gợi ý:</div>
					<div class='col2'>
						<input type='text' class='tukhoasanpham' name='danhmucgoiy' id='danhmucgoiy'/>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Danh mục sản phẩm:</div>
					<div class='col2'>
						<div class='danhmuc'>
							<input type='hidden' value='10' class='dmsp' name='danhmuc'/>
							<span class='title_dmsp'><?php echo count($site_categories_this)>0 ? $site_categories_this->Title : "" ?></span>
							<div class='khung_chon'>
								<div class='top'>
									<div class='pre_categories' id='0'><i class="fa fa-chevron-left"></i></div>
									<div class='tatcadanhmuc'>Tất cả danh mục</div>
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
						</div><!-- end danhmuc-->

					</div>
				</div>

				<div class='row'>
					<div class='col'>Chi tiết sản phẩm:</div>
					<div class='col2'>
						<textarea rows="7" cols="78" name="motangan" cols="20" rows="3"  placeholder="Mô tả chi tiết sản phẩm..." class="block_ctsp">
							<?php echo $data_sanpham->MotaNgan;?>
						</textarea>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Thêm chi tiết sản phẩm:</div>
					<div class='col2'>
						<div class='danhsach_dactinh'>
							<div class='dactinh_ct'>
								<?php 
									echo $list_option_str;
								?>
							</div>
						</div>
						<p style='color:#999'>Bạn có thể để thêm đến <span style="color:#444">10 chi tiết sản phẩm khác</span> mà bạn không tìm thấy trong danh sách chi tiết sản phẩm gợi 
							ý có sẵn của chúng tôi để giúp người mua tìm được sản phẩm dễ dàng hơn.</p>
						<input type='button' class='them_ctsp' value='+ Thêm'>
					</div>
				</div>

			</div><!-- end block_thongtincoban -->

			<div class='block_motachitiet'>
				<textarea name="Introtext" class="ckeditor">
					<?php $str_introtext = htmlspecialchars($data_sanpham->Introtext);echo  $data_sanpham->Introtext;?>
				</textarea>
			</div><!-- end block_motachitiet -->

			<div class='block_thongtingiaodich'>
				<div class='row'>
					<div class='col'>Số lượng đơn hàng tối thiểu:</div>
					<div class='col2'>
						<?php
							$donvitinhStr = $data_sanpham->Soluongdonhangtoithieu;
							$donvitinhStr = explode("_", $donvitinhStr);
							$soluong = $donvitinhStr[0];
							$donvi = $donvitinhStr[1];
						?>
						<input type='text' class='soluongdonhang' name='soluongdonhangtoithieu' placeholder='Số lượng' value='<?php echo isset($donvitinhStr) ? $soluong : "" ?>' />
						<select class='donvitinh'  name='donvitinh1'>
							<?php echo isset($donvi) ? "<option>$donvi</option>" : "<option>Đơn vị tính</option>" ?>
							<?php echo $data_gianhang_donvi_str;?>
						</select>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Giá <span style='font-weight:normal;font-size:11px'>(Chưa bao gồm vận chuyển & VAT)</span>:</div>
					<div class='col2'>
						<?php
							$giaStr = $data_sanpham->Price;
							$giaStr = explode("_", $giaStr);

							$giathapnhat = $giaStr[0];
							$giacaonhat = $giaStr[1];
							$donvigia = $giaStr[2];
						?>
						<input type='text' class='giathapnhat' name='giathapnhat' placeholder='Giá thấp nhất' value='<?php echo $giaStr[0] != " " ? number_format((float)$giathapnhat) : "" ?>'/>  <span class='ll'>-</span>  
						<input type='text' class='giacaonhat' name='giacaonhat' placeholder='Giá cao nhất' value='<?php echo $giaStr[1] != " " ? number_format((float)$giacaonhat) : "" ?>'/>
						<select class='donvitinh' name='donvitinh_gia'>
							<?php echo isset($donvigia) ? $donvigia : "<option>Đơn vị tính</option>" ?>
							<option value='VNĐ/chiếc'>VNĐ/chiếc</option>
						</select>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Vùng/miền nơi cung cấp:</div>
					<div class='col2'>
						<select class='tinhthanhpho' name='tinhthanh'>
							<?php 
								$tinhthanh = $this->db->query("select * from tinhthanh where ID=$data_sanpham->TinhthanhID")->row();
								echo count($tinhthanh)>0 ? "<option value='$tinhthanh->ID'>$tinhthanh->Title</option>" : "<option>Tỉnh/ Thành phố</option>";
								echo $tinhthanh_str;
							?>
						</select>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Phương thức thanh toán ưu tiên:</div>
					<div class='col2'>
						<select class='phuongthucthanhtoanuutien' name='phuongthuc_thanhtoan_uutien'>
							<?php 
								$phuongthucthanhtoanuutien = $this->db->query("select * from gianhang_phuongthucthanhtoanuutien where ID=$data_sanpham->PhuongthucthanhtoanuutienID")->row();
								echo count($phuongthucthanhtoanuutien)>0 ? "<option value='$phuongthucthanhtoanuutien->ID'>$phuongthucthanhtoanuutien->Title</option>" : "<option>Chọn 1</option>";
								echo $phuongthucthanhtoanuutien_str;
							?>
						</select>
						<input type='checkbox' class='lc'><span class='lc'>L/C</span>
						<input type='checkbox' class='tt'><span class='tt'>T/T</span>
					</div>
				</div>

				<div class='row'>
					<?php
						$khanangcungungStr = $data_sanpham->Khanangcungung;
						$khanangcungungStr = explode("_", $khanangcungungStr);
						$khanangcungung0 = $khanangcungungStr[0];
						$khanangcungung1 = $khanangcungungStr[1];
						$khanangcungung2 = $khanangcungungStr[2];
					?>
					<div class='col'>Khả năng cung ứng:</div>
					<div class='col2'>
						<input type='text' class='khanangcungung' placeholder='Số lượng' name='khanangcungung1' value='<?php echo isset($khanangcungungStr) ? $khanangcungung0 : "" ?>'/>
						<span class='ll'>/</span> 
						<select class='donvitinh' name='donvitinh2'>
							<?php 
								echo isset($khanangcungungStr) ? "<option>$khanangcungung1</option>" : "<option>Đơn vị tính</option>"; 
								echo $data_gianhang_donvi_str;
							?>
						</select>
						<span class='ll'>/</span> 
						<select class='thoigian' name='thoigian2'>
							<?php 
								echo isset($khanangcungungStr) ? "<option>$khanangcungung2</option>" : "<option>Thời gian</option>";
							?>
							<option value=''>Thời gian</option>
							<option value='ngày'>ngày</option>
						</select>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Thời gian vận chuyển:</div>
					<div class='col2'>
						<input type='text' class='thoigianvanchuyen' name='thoigianvanchuyen' placeholder='Thời gian' value='<?php echo isset($data_sanpham->Thoigianvanchuyen) ? $data_sanpham->Thoigianvanchuyen : "" ?>'/>
					</div>
				</div>

				<div class='row'>
					<div class='col'>Chi tiết/ Quy cách đóng gói:</div>
					<div class='col2'>
						<input type='text' class='quycachdonggoi' name='quycachdonggoi' value='<?php echo isset($data_sanpham->Quycachdonggoi) ? $data_sanpham->Quycachdonggoi : "" ?>' placeholder='VD: Thùng 30 cái x 1 hộp'/>
					</div>
				</div>
			</div><!-- end block_thongtingiaodich -->

		</div><!-- end dbsp_content-->

		<div class='dbsp_footer'>
			<div class='row'>
				<input type='submit' value='Lưu thông tin' class='dangban' name='edit'>
			</div>
		</div><!-- dbsp_footer-->

		</form><!-- end FORM-->

	</div><!-- end .qlsp-->
</div>

<script type="text/javascript">
	$(document).ready(function(){
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
		$(document).on('click', ".danhmucgoiy", function() {
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
							alert("Có lỗi 1 !!");
						}									
				  },
				  error:function(){
					  alert("Có lỗi 2!!");
				  }
			});
			
		});
		
		
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
</script>

<script>
	var url = 'http://localhost/sagohano';
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



    /* Xóa hình trong Album */
    //=====================THAY KHÁCH HÀNG THƯƠNG LÁI
	$(document).on('click', ".delete_album_image", function() {
		var id = $(this).attr('id');
		$.ajax({
			  url: ""+url+"/userpage/delete_images",
		      type: "POST",
		      dataType: "text",
		      context: this,
		      data: "id="+id,
		      beforeSend: function() {
					$(".loading").show();					
				},
		      success: function(result){
					if(result)
					{
						$(this).closest('.hinhanh_al').css({'display':'none'});
						alert("Xóa hình ảnh thành công!");
					}
					else
					{	
						alert("Lỗi hệ thống !!");
					}									
		      },
		      error:function(){
		    	  alert("Lỗi hệ thống !!");
		      }
		});
	});
	
	/* Thêm đặc tính */
    //=====================Thêm đặc tính
	$(document).on('click', ".them_ctsp", function() {
		$(this).closest(".col2").find('.danhsach_dactinh').append("<div class='dactinh_ct'>\
											<input type='text' name='dactinh[]' class='dactinh' placeholder='Đặc tính/Tên chi tiết (Ví dụ: Màu)'>\
											<input type='text' name='dactinh[]' class='dactinh' placeholder='Giá trị (Ví dụ: Xanh lá cây)'>\
										</div>");
	});
	
	
</script>

