<div id='content'>
	<div class="tools">
		<li class="first"><a class="add_new" href='<?php echo base_url() ?>admin/home/tinhthanh/add_tinhthanh'>Add new</a></li>
		<li>
			<form action='<?php echo base_url().'admin/home/tinhthanh/search_tinhthanh' ?>' method='POST'>
				<p>Tìm kiếm từ khóa :
					<input type='text' name='keyword' />
				</p> 
			</form>
		</li>
	</div>
	<div class="data_content">
		<table>
			<tr>
				<th class="ID_td">ID</th>
				<th>Tên tỉnh thành / quận huyện</th>
				<th class="Edit_td">Edit</th>
				<th class="Edit_td">Delete</th>
			</tr>
			<?php
			if(count($data)>0){
				$i=isset($start) ? $start+1 : 1;
				foreach($data as $row){
					$link_edit = base_url()."admin/home/tinhthanh/edit_tinhthanh/$row->ID";
					$link_delete = base_url()."admin/home/tinhthanh/delete_tinhthanh/$row->ID";
					echo "<tr>";
					echo "<td>$i</td>";
					echo "<td>$row->Title</td>";
					echo "<td><a href='$link_edit'>Edit</a></td>";
					echo "<td><a href='$link_delete' class='delete'>Delete</a></td>";
					echo "</tr>";
					$i++;
				}
			}else{
				echo "<tr> <td colspan=4> Không có dữ liệu</td></tr>";
			}
			?>
		</table>
		<?php 
			echo isset($nav) && count($data)>0 ? "<div style='clear:both'>$nav</div>" : '';
		?>
	</div>
</div>