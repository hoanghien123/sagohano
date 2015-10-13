<div class="bg">
<div class="add_data">
	<form action="<?php echo base_url() ?>admin/home/home/account_update" method="post" >
		<h2 class="title">Thêm dữ liệu</h2>
		<input type="hidden" value="<?php echo $data->ID ?>" name="ID" id="ID" />
		<p style='border-bottom:1px solid #EEE; padding-bottom:5px;margin-bottom:10px'>Trạng thái tin</p>
		<div>
			Enable <input name="Published" type="radio" value="1" <?php echo $data->Published==1 ? "checked='checked'" : '' ; ?> />
			Disable <input name="Published" type="radio" value="0" <?php echo $data->Published==0 ? "checked='checked'" : '' ; ?> />
		</div>
		<p>UserName</p>
		<div><input name="Username" type="text" id='txt_alias' value="<?php echo $data->UserName ?>" required /></div>
		<p>Password Login</p>
		<div><input name="Password" type="text" id='txt_alias' value="<?php echo $data->PassWord ?>" required /></div>
		<div><input type="submit" value="Save" /></div>
	</form>
</div>
</div>