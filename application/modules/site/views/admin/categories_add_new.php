<div class="bg">
<div class="add_data">
	<form action="<?php echo base_url() ?>admin/site/categories/categories_add_new" method="post">
		<h2 class="title">Thêm danh mục sản phẩm</h2>
		<p style='border-bottom:1px solid #EEE; padding-bottom:5px;margin-bottom:10px'>Trạng thái hiển thị</p>
		<div>
			Enable <input name="Published" type="radio" value="1" checked="checked" />
			Disable <input name="Published" type="radio" value="0"  />
		</div>
		<p>Tên danh mục</p>
		<div><input type="text" name="Title" required /></div>
		<p>Thuộc danh mục</p>
		<div>
			<select name='ParentID'>
				<option value='0'>Danh mục cao nhất</option>
				<?php 
					$result = $this->db->query("select * from site_categories")->result();
					if(count($result)>0){
						foreach($result as $row){
							echo "<option value='$row->ID'>$row->Title</option>";
						}
					}
				?>
			</select>
		</div>
		<hr>
		<p>Meta Title</p>
		<div><input type="text" name="MetaTitle" /></div>
		<p>Meta Keywords</p>
		<div><input type="text" name="MetaKeywords" /></div>
		<p>Meta Description</p>
		<div><textarea name="MetaDescription" /></textarea>
		<div><input type="submit" value="Add now" /></div>
	</form>
</div>
</div>