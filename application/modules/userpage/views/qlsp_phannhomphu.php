<?php $this->load->view("topmenu3"); ?>

<div class='dim_block_themnhom'></div>
<div class='block_themnhom'>
	<form action='<?php echo base_url()?>userpage/themnhomsanpham2' method='POST'>
	<div class='title_themnhom'>Thêm nhóm mới</div>
	<div class='content_themnhom'>
		<div class='row'>
			<span>Tên nhóm mới:</span><input type='text' class='tennhommoi' name='tennhommoi'/>
		</div>
		<div class='row'>
			<span>Danh mục cha:</span>
			<select name='ParentID' class='tennhommoi'>
				<option value='<?php echo $id;?>'><?php echo $ParentTitle;?></option>
				<?php 
					if(count($data_danhmuc)>0){
						foreach($data_danhmuc as $row){
							echo "
							<option value='$row->ID'> - $row->Title</option>
							";
						}
					}
				?>
			</select>
		</div>
		<div class='row'>
			<span class='showmore'>Show more</span>
		</div>
		<div class='block_meta'>
			<div class='row'>
				<span>MetaTitle:</span><input type='text' class='tennhommoi' name='metatitle'/>
			</div>
			<div class='row'>
				<span>MetaKeyword:</span><input type='text' class='tennhommoi' name='metakeywords'/>
			</div>
			<div class='row'>
				<span>MetaDescrition:</span><input type='text' class='tennhommoi' name='metadescription'/>
			</div>
		</div>
		
		<div class='row'>
			<input type='submit' class='themnhommoi' value='Thêm nhóm mới'/>
		</div>
		
	</div>
	</form>
</div>


<div class='block_doiten'>
	<form action='<?php echo base_url()?>userpage/doiten_nhom_danhmuc' method='POST'>
	<div class='title_themnhom'>Đổi tên</div>
	<div class='content_doiten'>
		<div class='row'>
			<span>Tên nhóm cũ:</span><input type='text' class='tennhomcu' name='tennhomcu'/>
		</div>
		<div class='row'>
			<span>Tên nhóm mới:</span><input type='text' class='tennhomcu' name='tennhommoi' required/>
		</div>
		<div class='row'>
			<input type='submit' class='themnhommoi' value='Đổi tên'/>
		</div>
	</div>
	</form>
</div>

<style type="text/css">
	.menu_userpage ul li.li1{background: #FFF !important}
	.menu_userpage ul li.li4{background-color: #ffd558}
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
	<div class="qlsp_sanpham">
		<div class='qlsp_top'>
			<div class='left_phannhomsp'>
				<span class='trolai'>
				<a href='<?php 
					if($ParentID == 0){
						echo base_url()."userpage/phannhomsanpham";
					}
					else{
						echo base_url()."userpage/phannhomphu/".$ParentID;
					}?>'>Trở lại</a></span>
			</div>
			<div class='right_phanhomsp'>
				<input type='button' class='taonhommoi' value='+ Tạo nhóm mới'/>
				<input type='button' class='doiten' value='Đổi tên'/>
				<input type='button' class='xoanhom' value='Xóa nhóm'/>
			</div>
		</div><!-- end top-->

		<div class='qlsp_content'>
			<div class='left_content_pnsp'>
				<form id="form_nhom_danhmuc">	
				<?php 
					if(count($data_danhmuc)>0){
						foreach($data_danhmuc as $row){
							echo "
							<div class='row'>
								<div class='left_row'><input type='radio' id='list".$row->ID."' name='nhom_danhmuc' value='".$row->ID."' /><label for='list".$row->ID."'><span class='tennhom' id='".$row->ID."'>".$row->Title."</span></label></div>
								<div class='right_row'><span style='color:#7C7C7C;'>Lần cập nhật cuối:".date("d/m/Y",strtotime($row->LastEdited))."</span><a href='".base_url()."userpage/phannhomphu/".$row->ID."'>Chi tiết</a></div>
							</div><!-- end .row-->
							";
						}
					}
				?>
				</form>
			</div><!-- end .left_content_pnsp -->

			<div class='right_content_pnsp'>
				<div class='title'>Chi tiết</div>
				<div class='content_pnsp'>
				</div>
			</div><!-- end .right_content_pnsp -->

		</div><!-- end qlsp_content-->

	</div><!-- end .qlsp-->
</div>


<script>
	$(document).on('click', ".taonhommoi", function() {
		$('.dim_block_themnhom,.block_themnhom').css({"display":"block"});
	});
	
	$(document).on('click', ".dim_block_themnhom", function() {
		$('.dim_block_themnhom,.block_themnhom,.block_doiten').css({"display":"none"});
	});
	
	$(document).on('click', ".tennhom", function() {
		var id = $(this).attr('id');
		$.ajax({
			  url: "<?php echo base_url()?>userpage/show_nhomphu",
			  type: "POST",
			  dataType: "text",
			  context: this,
			  data: "ID="+id,
			  beforeSend: function() {
					$(".load_ajax").show();					
				},
			  success: function(result){
					if(result)
					{
						$(".content_pnsp").html(result);
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
	
	$(document).on('click', ".doiten", function() {
		var id = $('input[name=nhom_danhmuc]:checked', '#form_nhom_danhmuc').val(); 
		if (typeof id != 'undefined'){
			$.ajax({
				  url: "<?php echo base_url()?>userpage/show_form_doiten",
				  type: "POST",
				  dataType: "text",
				  context: this,
				  data: "ID="+id,
				  beforeSend: function() {
						$(".load_ajax").show();					
					},
				  success: function(result){
						if(result)
						{
							$(".content_doiten").html(result);
							$('.dim_block_themnhom,.block_doiten').css({"display":"block"});
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
		else{
			return;
		}
	});
	
	$(document).on('click', ".xoanhom", function() {
		var id = $('input[name=nhom_danhmuc]:checked', '#form_nhom_danhmuc').val(); 
		if (typeof id != 'undefined'){
			if (confirm('Bạn có chắc xóa nhóm danh này ??')) {
				$.ajax({
					  url: "<?php echo base_url()?>userpage/xoa_nhom_danhmuc",
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
	
	$(document).on('click', ".showmore", function() {
		$('.block_themnhom .block_meta').toggle("slow");
	});
	
</script>



