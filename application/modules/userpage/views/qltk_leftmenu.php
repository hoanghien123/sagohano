<div class="information_user">
			<a id='chooseimage'></a>
			<img src='public/site/images/userpage/user_icon.png' />
			<p class="diff"><?php 
				echo $this->user->Published==0 ? "Thành viên chưa được kiểm duyệt" : "Thành viên đã được kiểm duyệt" ;
			?></p>
			<p>Tên : <?php echo $this->user->NameUser ?></p>
			<p>Chức vụ : <?php echo $this->user->Chucvu ?></p>
			<p class="diff">Đăng nhập lần cuối lúc</p>
			<p><?php echo date("g:i a - d/m/Y",strtotime($this->user->Lastlogin)); ?></p>
			<p class="last">[ Hãy trở thành thành viên cao cấp ]</p>
		</div>
		<div class="list_menu">
			<p class="title folder_icon">Thông tin cá nhân</p>
			<li><a href='<?php echo base_url().'userpage/' ?>thongtincanhan'>Hồ sơ thông tin cá nhân</a></li>
			<li><a href='<?php echo base_url().'userpage/' ?>quanlythanhvien'>Quản lý thành viên</a></li>
			<li><a href='<?php echo base_url().'userpage/' ?>thietlapriengtu'>Thiết lập riêng tư</a></li>
			<li><a href='<?php echo base_url().'userpage/' ?>change_picture'>Thay đổi ảnh đại diện</a></li>
			<p class="title clock_icon">Bảo mật tài khoản</p>
			<li><a href='<?php echo base_url().'userpage/' ?>change_email'>Thay đổi email tài khoản</a></li>
			<li><a href='<?php echo base_url().'userpage/' ?>change_password'>Thay đổi mật khẩu</a></li>
			<li><a href='<?php echo base_url().'userpage/' ?>cauhoibaomat'>Thiết lập câu hỏi bảo mật</a></li>
			<li><a href='<?php echo base_url().'userpage/' ?>settingip'>Thiết lập IP đăng nhập</a></li>
		</div>