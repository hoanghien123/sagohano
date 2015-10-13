<div class="bg">
<div class="add_data">
	<form action="<?php echo base_url() ?>admin/home/tinhthanh/tinhthanh_add_new" method="post">
		<h2 class="title">Thêm danh sách tỉnh thành</h2>
		<p>Tên tỉnh thành / quận huyện</p>
		<div><input type="text" name="Title" required /></div>
		<p>Thuộc khu vực</p>
		<div>
			<select name='ParentID'>
				<option value='0'>Khu vực cao nhất</option>
				<?php 
					$result = $this->db->query("select * from tinhthanh where ParentID=0")->result();
					if(count($result)>0){
						foreach($result as $row){
							echo "<option value='$row->ID'>$row->Title</option>";
						}
					}
				?>
			</select>
		</div>
		<div><input type="submit" value="Add now" /></div>
	</form>
</div>
</div>
