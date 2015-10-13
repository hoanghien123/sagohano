<?php $this->load->view("topmenu3"); ?>
<div class="thongtincongty">

	<div class="left_thongtincongty">
		<?php 
		$this->load->view("qlsp_leftmenu");
		?>
	</div>
	<div class="qlsp_sanpham">
		<div class='qlsp_top'>
			<div class='left-top'>
				<form action='<?php echo base_url(); ?>userpage/danhsachsanpham_search' method='POST'>
					<input type='text' name='key' placeholder='Tìm kiếm sản phẩm của công ty bạn ...' class='search' value='<?php echo isset($key) ? $key : "";   ?>'>
					<input type='submit' class='timkiem_sp' value='search'>
				</form>
			</div>
			<form method='POST' action='<?php echo base_url(); ?>userpage/update_list_product'>
			<div class='right-top'>
				<input type='submit' name='xoa' class='xoa' value='Xóa'>
				<input type='submit' name='ngungban' class='ngungban' value='Ngưng bán'>
				<input type='submit' name='tieptucban' class='tieptucban' value='Tiếp tục bán'>
			</div>
		</div><!-- end top-->
		
		<div class='qlsp_content'>
			<?php 
				if(count($data_sanpham)>0){
					foreach($data_sanpham as $row){
						$data_UserPost = $this->db->query("select * from site_user where ID=$row->UserPostID")->row();
						$Url = $row->Image_Url;
						$PriceStr = explode('_',$row->Price);
						$Price = $PriceStr[0] != " " ? $PriceStr[0] : 0;
						if($row->Image_Url == ""){
							$Url = base_url()."public/site/images/chonanh.png";
						}
						echo "
							<div class='child trangthai$row->Published'>
								<div class='chon'><input type='checkbox' name='sanpham_check[]' value='".$row->ID."'/><span>Chọn</span><div class='tat' id='".$row->ID."'>x</div></div>
								<div class='content_child'>
									<a href='".base_url()."userpage/chitietsanpham/$row->ID'><img src='$Url' alt='Áo khoác'></a>
									<div class='title'><a href='".base_url()."userpage/chitietsanpham/$row->ID'>$row->Title</a></div>
									<div class='metadata'>
										<div class='price'>".number_format((int)$Price)." ".$PriceStr[2]."</div>
										<div class='ngaycapnhat'>Ngày cập nhật: ".date("d/m/Y",strtotime($row->LastEdited))."</div>
									</div>
									<div class='bot'>
										<div class='name'>$data_UserPost->NameUser</div>
										<div class='mssp'>MSSP:$row->ID</div>
									</div>
								</div><!-- end content_child-->
							</div><!-- end-child-->";
					}
					echo isset($nav) ? $nav : '';
				}
				else{
					echo "Chưa có sản phẩm...";
				}
			?>
			
		</div><!-- end qlsp_content-->
		</form>
	</div><!-- end .qlsp-->

</div>

<script>
	$(document).on('click', ".tat", function() {
		var id = $(this).attr("id");
		if (typeof id != 'undefined'){
			if (confirm('Bạn có chắc xóa sản phẩm này ??')) {
				$.ajax({
					  url: "<?php echo base_url()?>userpage/xoa_sanpham_x",
					  type: "POST",
					  dataType: "text",
					  context: this,
					  data: "ID="+id,
					  beforeSend: function() {
											
						},
					  success: function(result){
							if(result)
							{
								location.reload();
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
			}
		}
		else{
			return;
		}
	});
	
</script>



