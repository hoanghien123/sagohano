<?php $this->load->view("topmenu3"); ?>
<style type="text/css">
	.menu_userpage ul li.li1{background: #FFF !important}
	.menu_userpage ul li.li4{background-color: #ffd558}
</style>

<div class="thongtincongty">

	<div class="left_thongtincongty">
		<?php 
		$this->load->view("qlsp_leftmenu");
		?>
	</div>
	<div class="qlsp_sanpham">
		<div ng-app="myApp" ng-controller="customersCtrl"> 
			<div class='qlsp_top'>
				<div class='left-top'>
						<input type="text" ng-model="test" placeholder='Tìm kiếm sản phẩm của công ty bạn ...' class='search'>
						<input type='submit' class='timkiem_sp' value='search'>
				</div>
				<form method='POST' action='<?php echo base_url(); ?>userpage/update_list_product'>
				<div class='right-top'>
					<input type='submit' name='xoa' class='xoa' value='Xóa'>
					<input type='submit' name='ngungban' class='ngungban' value='Ngưng bán'>
					<input type='submit' name='tieptucban' class='tieptucban' value='Tiếp tục bán'>
				</div>
			</div><!-- end top-->
			
			<div class='qlsp_content' ng-repeat="x in names | filter:test">
				
				<div class='child trangthai{{ x.Published }}'>
					<div class='chon'><input type='checkbox' name='sanpham_check' class="chkNumber"  value='{{ x.ID}}'/><span>Chọn</span><div class='tat' id='{{ x.ID}}'>x</div></div>
					<div class='content_child'>
						<a href='<?php echo base_url();?>userpage/chitietsanpham/{{ x.ID}}'><img src='{{ x.Duongdananh}}' alt='{{ x.Title}}'></a>
						<div class='title'><a href='<?php echo base_url();?>userpage/chitietsanpham/{{ x.ID }}'>{{ x.Title }}</a></div>
						<div class='metadata'>
							<div class='price'>{{ x.Gia }}</div>
							<div class='ngaycapnhat'>{{ x.Ngaycapnhat }}</div>
						</div>
						<div class='bot'>
							<div class='name'>{{ x.Nguoidang }}</div>
							<div class='mssp'>MSSP:{{ x.ID }}</div>
						</div>
					</div><!-- end content_child-->
				</div><!-- end-child-->
				
			</div><!-- end qlsp_content-->
			</form>
		</div><!-- customersCtrl-->
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
	
	$(document).on('click', ".ngungban", function() {
		$("input[type='checkbox']").val();
	});
	
	$('.ngungban').click(function () {
        if ($('.chkNumber:checked').length) {
			var chkId = '';
			$('.chkNumber:checked').each(function () {
				chkId += $(this).val() + ",";
			});
			chkId = chkId.slice(0, -1);
			$.ajax({
				  url: "<?php echo base_url()?>userpage/ngungban_sanpham_x",
				  type: "POST",
				  dataType: "text",
				  context: this,
				  data: "ID="+chkId,
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
					  return;
				  }
			});
        }
        else {
			alert('Nothing Selected');
        }
    });
	
	
	$('.tieptucban').click(function () {
        if ($('.chkNumber:checked').length) {
			var chkId = '';
			$('.chkNumber:checked').each(function () {
				chkId += $(this).val() + ",";
			});
			chkId = chkId.slice(0, -1);
			$.ajax({
				  url: "<?php echo base_url()?>userpage/tieptucban_sanpham_x",
				  type: "POST",
				  dataType: "text",
				  context: this,
				  data: "ID="+chkId,
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
					 return;
				  }
			});
        }
        else {
			alert('Nothing Selected');
        }
    });
	
	
	$('.xoa').click(function () {
        if ($('.chkNumber:checked').length) {
			var chkId = '';
			$('.chkNumber:checked').each(function () {
				chkId += $(this).val() + ",";
			});
			chkId = chkId.slice(0, -1);
			
			if (confirm('Bạn có chắc xóa sản phẩm này ??')) {
				$.ajax({
					  url: "<?php echo base_url()?>userpage/xoaxoa_sanpham_x",
					  type: "POST",
					  dataType: "text",
					  context: this,
					  data: "ID="+chkId,
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
						 return;
					  }
				});
			}
			else{
				return;
			}
        }
        else {
			alert('Nothing Selected');
        }
    });
	
</script>
<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    $http.get("<?php echo base_url()?>userpage/sanpham_angular")
    .success(function (response) {$scope.names = response;});
});
</script>



