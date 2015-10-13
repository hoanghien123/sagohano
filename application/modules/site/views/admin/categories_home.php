<div id='content'>
	<div class="tools">
		<li class="first"><a class="add_new" href='<?php echo base_url() ?>admin/site/categories/add_categories'>Add new</a></li>
		<li>
			<form action='<?php echo base_url().'admin/site/categories/search_categories' ?>' method='POST'>
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
				<th>Tên danh mục</th>
				<th>Danh mục cha</th>
				<th>Trạng thái</th>
				<th class="Edit_td">Edit</th>
				<th class="Edit_td">Delete</th>
			</tr>
			<?php
			$result = $this->db->query("select * from site_categories")->result();
			$arr = array();
			if(count($result)>0){
				foreach($result as $item){
					$arr[$item->ID] = $item->Title;
				}
			}
			if(count($data)>0){
				
				$i=isset($start) ? $start+1 : 1;
				foreach($data as $row){
					$link_edit = base_url()."admin/site/categories/edit_categories/$row->ID";
					$link_delete = base_url()."admin/site/categories/delete_categories/$row->ID";
					echo "<tr>";
					echo "<td>$i</td>";
					echo "<td>$row->Title</td>";
					echo isset($arr[$row->ParentID]) ? "<td>".$arr[$row->ParentID]."</td>" : "<td>Danh mục cao nhất</td>"; 
					$published = $row->Published==1 ? "Enable" : "Disable" ;
					echo "<td>$published</td>";
					echo "<td><a href='$link_edit'>Edit</a></td>";
					echo "<td><a href='$link_delete' class='delete'>Delete</a></td>";
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