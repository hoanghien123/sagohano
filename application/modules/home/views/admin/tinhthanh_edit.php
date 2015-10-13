<div class="bg">
<div class="add_data">
	<form action="<?php echo base_url() ?>admin/home/tinhthanh/tinhthanh_update" method="post" >
		<h2 class="title">Chỉnh sửa danh sách tỉnh thành</h2>
		<input type="hidden" value="<?php echo $data->ID ?>" name="ID" id="ID" />
		<p>Tên tỉnh thành / quận huyện </p>
		<div><input type="text" name="Title" value="<?php echo $data->Title ?>" required /></div>
		<p>Thuộc khu vực</p>
		<div>
			<select name='ParentID'>
				<option value='0' <?php echo $data->ParentID==0 ? "selected='selected'" : '' ?>>Khu vực cao nhất</option>
				<?php 
					$result = $this->db->query("select * from tinhthanh where ParentID=0")->result();
					if(count($result)>0){
						foreach($result as $row){
							$select = $row->ID==$data->ParentID ? "selected='selected'" : '';
							echo "<option value='$row->ID' $select>$row->Title</option>";
						}
					}
				?>
			</select>
		</div>
		<div><input type="submit" value="Save" /></div>
	</form>
</div>
</div>