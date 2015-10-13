<?php $this->load->view("topmenu"); ?>
<div class="userpage">
	<div class="left_userpage">
		<?php 
		$this->load->view("qltk_leftmenu");
		?>
	</div>
	<div class="right_userpage">
		<div class="breakcrumb"><a>Quản lý tài khoản</a> » <a>Quản lý thành viên</a></div>
		<div class="quanlythanhvien block">
			<div class="tools">
				<form action="<?php echo base_url()."userpage/search_quanlythanhvien" ?>" method="get">
					<input type="text" placeholder="Tìm kiếm thành viên công ty" name="keywords" />
					<input type="submit" value="Tìm" />
				</form>
			</div>
			<div class="box">
				<?php 
				$search = isset($keywords) ? $keywords : "" ;
				$listuser = $this->db->query("select b.* from site_user_shop a,site_user b where a.UserID=b.ID and ShopID=".$this->shop->ID." $search")->result();
				if(count($listuser)>0){
					foreach($listuser as $row){
						$image = $this->db->query("select * from files where ID=$row->ImageID")->row();
						$src = $image ? $image->Path : "public/site/images/userpage/user_icon.png";
						?>
						<div class="list">
							<div class="images">
								<img src='<?php echo $src ?>' />
							</div>
							<div class="right_list">
								<h3><?php echo $row->NameUser ?> <a>Thông tin tài khoản</a></h3>
								<p><span>Chức vụ </span>: <?php echo $row->Chucvu ?></p>
								<p><span>Tel </span>: <?php echo $row->Phone ?></p>
							</div>
							<?php
							$permission = $this->db->query("select a.* from gianhang_permission a, site_user_permission b where a.ID=b.PermissionID and b.UserID=$row->ID")->result();
							$title_permission="";
							$str_permission="";
							if(count($permission)>0){
								foreach ($permission as $item) {
									$str_permission.="<li><input type='checkbox' checked='checked' name='permission_$item->ID' />$item->Title</li>";
									$title_permission.="<span>$item->Title</span>";
								}
							}
							?>
							<div class="permission">Quyền hạn : <?php echo $title_permission ?>
								<div class="setting"><a class="icon"></a>
									<ul>
										<?php 
										echo "<form action='".base_url()."userpage/save_permission' method='post'><li>Danh sách quyền hạn</li>";
										echo $str_permission;
										$permissionorder = $this->db->query("select * from gianhang_permission where ID not in(select PermissionID from site_user_permission where UserID=$row->ID)")->result();
										if(count($permissionorder)>0){
											foreach ($permissionorder as $value) {
												echo "<li><input type='checkbox' name='permission_$value->ID' />$value->Title</li>";
											}
										}
										echo "<input type='hidden' name='ID' value='$row->ID' />";
										?>
										<li><input type="submit" value="Lưu" /></li>
										</form>
									</ul>
								</div>
							</div>
						</div>
						<?php 
					}
				}
				?>
			</div>
			<a class="add_user"></a>
		</div>
	</div>
</div>