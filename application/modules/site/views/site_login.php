<div class="logo_search">
		<div class="containner">
			<div class="logo"><a href='<?php echo base_url() ?>'><img src='public/site/images/logo.PNG' /></a></div>
		</div>
</div>

<div class="login">
	<div class='login_control'>
		<a id='login_box' class='current'>Đăng nhập</a><a id='register_box' class='last'>Đăng ký</a>
	</div>
	<div class="box_inner">
			<div class="login_box box_page">
				<div class='box_top'>
					<form method="POST" action="<?php echo base_url().'login' ?>">
						<p>Email: </p>
						<div><input type='text' name='Email' required /></div>
						<p>Mật khẩu: </p>
						<div><input type='password' name='Password' required /></div>
						<div><input type='submit' value='Đăng nhập' name='login' /></div>
					</form>
				</div>
				<div class='clear'>
					<a class='login_fb'>Đăng nhập bằng </a> <a class='quenmatkhau'>Quên mật khẩu ?</a>
				</div>
			</div>
			<div class="register_box box_page">
				<div class='box_top'>
					<form method="POST" action="<?php echo base_url().'dang-ky' ?>">
						<p>Email: </p>
						<div><input type='email' name='Email' required /></div>
						<p>Mật khẩu: </p>
						<div><input type='password' name='Password' required /></div>
						<p>Nhập lại mật khẩu: </p>
						<div><input type='password' name='Re_Password' required /></div>
						<p>Bạn là: </p>
						<div>
							<select name='Level'>
								<option value='0'>Nhà cung cấp</option>
								<option value='1'>Người mua</option>
								<option value='2'>Người mua & Nhà cung cấp</option>
							</select>
						</div>
						<div><input type='submit' value='Đăng ký' /></div>
					</form>
				</div>
				<div class='clear'>
					<a class='login_fb'>Đăng nhập bằng </a>
				</div>
			</div>
	</div>
</div>

<div class="quenmatkhau_box">
	<div class="box">
		<form action="<?php echo base_url().'get-password-from-email' ?>" method="POST">
			<p>Điền email nhận mật khẩu . Chúng tôi sẽ gửi mật khẩu và email tương ứng với email mà bạn nhập vào .</p>
			<div><input type="email" name="Email" required /></div>
			<div><input type='submit' value="Xác nhận quên mật khẩu" /></div>
		</form>
	</div>
	<a id="hide_box">x</a>
</div>

<style>
.footer{background:#EEE}
.logo_search .logo img{height:75px}
</style>

<script>
	$(".login_control a").click(function(){
		var id = $(this).attr('id');
		$(".box_page").hide();
		$("."+id).show();
		$(".login_control a").removeClass("current");
		$(this).addClass("current");
	});

	$(".quenmatkhau").click(function(){
		$(".quenmatkhau_box").addClass("quenmatkhau_box_show");
	});

	$("#hide_box").click(function(){
		$(".quenmatkhau_box").removeClass("quenmatkhau_box_show");
	});

</script>

<?php 
if(isset($_GET['error'])){
	$error = $_GET['error'];
	if($error==1){
		echo "<script>alert('Mật khẩu không được để trống .')</script>";
	}
	if($error==2){
		echo "<script>alert('Mật khẩu 2 lần không trùng khớp .')</script>";
	}
	if($error==3){
		echo "<script>alert('Email này đã được đăng ký sử dụng . Vui lòng chọn Email khác .')</script>";
	}
	if($error==4){
		echo "<script>alert('Email hoặc mật khẩu không chính xác . Vui lòng đăng nhập lại .')</script>";
	}
}

?>