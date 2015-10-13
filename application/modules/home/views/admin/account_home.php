<div id='content'>
	<div class="tools">
		<li class="first"><a class="add_new" href='<?php echo base_url() ?>admin/home/home/add_account'>Add new</a></li>
		<li>
			<form action='<?php echo base_url().'admin/home/home/search_account' ?>' method='POST'>
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
				<th>Username</th>
				<th>Password</th>
				<th class="Published_td">Trạng thái</th>
				<th class="Edit_td">Edit</th>
				<th class="Edit_td">Delete</th>
			</tr>
			<?php
			if(count($data)>0){
				$i=1;
				foreach($data as $row){
					$link_edit = base_url()."admin/home/home/edit_account/$row->ID";
					$link_delete = base_url()."admin/home/home/delete_account/$row->ID";
					$published = $row->Published==1 ? 'Enable' : 'Disable' ;
					echo "<tr>";
					echo "<td>$i</td>";
					echo "<td>$row->UserName</td>";
					echo "<td>$row->PassWord</td>";
					echo "<td>$published</td>";
					echo "<td><a href='$link_edit'>Edit</a></td>";
					echo "<td><a href='$link_delete'>Delete</a></td>";
					echo "</tr>";
					$i++;
				}
			}else{
				echo "<tr> <td colspan=6> Không có dữ liệu</td></tr>";
			}
			?>
		</table>
		<?php 
			echo isset($nav) && count($data)>0 ? "<div style='clear:both'>$nav</div>" : '';
		?>
	</div>
</div>