<div class="bg">
<div class="add_data">
	<form action="<?php echo base_url() ?>admin/home/home/account_add_new" method="post">
		<h2 class="title">Thêm tài khoản quản trị</h2>
		<p style='border-bottom:1px solid #EEE; padding-bottom:5px;margin-bottom:10px'>Trạng thái</p>
		<div>
			Enable <input name="Published" type="radio" value="1" checked="checked" />
			Disable <input name="Published" type="radio" value="0"  />
		</div>
		<p>Username Login</p>
		<div><input name="Username" type="text" id='txt_alias' required /></div>
		<p>Password Login</p>
		<div><input name="Password" type="text" id='txt_alias' required /></div>
		<div><input type="submit" value="Add now" /></div>
	</form>
</div>
</div>
