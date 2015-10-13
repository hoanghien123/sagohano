<div class="bg">
<div class="add_data">
	<form action="<?php echo base_url() ?>admin/site/categories/categories_update" method="post" >
		<h2 class="title">Chỉnh sửa danh mục sản phẩm</h2>
		<input type="hidden" value="<?php echo $data->ID ?>" name="ID" id="ID" />
		<p style='border-bottom:1px solid #EEE; padding-bottom:5px;margin-bottom:10px'>Trạng thái hiển thị</p>
		<div>
			Enable <input name="Published" type="radio" value="1" <?php echo $data->Published==1 ? "checked='checked'" : '' ; ?> />
			Disable <input name="Published" type="radio" value="0" <?php echo $data->Published==0 ? "checked='checked'" : '' ; ?> />
		</div>
		<p>Tên danh mục </p>
		<div><input type="text" name="Title" value="<?php echo $data->Title ?>" required /></div>
		<p>Thuộc danh mục</p>
		<div>
			<select name='ParentID'>
				<option value='0' <?php echo $data->ParentID==0 ? "selected='selected'" : '' ?>>Danh mục cao nhất</option>
				<?php 
					$result = $this->db->query("select * from site_categories")->result();
					if(count($result)>0){
						foreach($result as $row){
							$select = $row->ID==$data->ParentID ? "selected='selected'" : '';
							echo "<option value='$row->ID' $select>$row->Title</option>";
						}
					}
				?>
			</select>
		</div>
		<hr>
		<p>Meta Title</p>
		<div><input type="text" name="MetaTitle" value="<?php echo $data->MetaTitle ?>" /></div>
		<p>Meta Keywords</p>
		<div><input type="text" name="MetaKeywords" value="<?php echo $data->MetaKeywords ?>" /></div>
		<p>Meta Description</p>
		<div><textarea name="MetaDescription" /><?php echo $data->MetaDescription ?></textarea>
		<div><input type="submit" value="Save" /></div>
	</form>
</div>
</div>
