<?php 
class Site extends CI_Controller { 
    public function __construct() { 
        parent::__construct();
		// Load library template 
        $this->load->library('template'); 
        // Set template 
        $this->template->set_template('site');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	
	public function login()
    {
    	$sess = $this->session->userdata("user_email");
		if($sess!='') redirect("userpage");
		$this->template->add_title('Shagohano | Login');
		$this->template->write('MetaKeywords','');
		$this->template->write('MetaDescription','');
		$this->template->write_view('content','site_login'); 
		$this->template->render();
    }

    public function send_mail_get_password(){
    	$Email = isset($_POST['Email']) ? $_POST['Email'] : "" ;
    	$this->check_email_valid($Email);
    	$check = $this->db->query("select * from site_user where Email='$Email'")->row();
    	if($check){
    		$message = "Thông tin tài khoản thành viên $check->Email :<br>Tên đăng nhập : $check->Email <br> Mật khẩu : $check->Password . <br> Nếu yêu cầu này không phải do bạn gửi vui lòng báo cho ban quản trị Sagohano để tránh thiệt hại cho bạn .";
	        $mail = array(
	            "to_receiver"   => $check->Email,
	            "message"       => $message
	        );
	        $this->load->library('email');
	        $this->load->library("my_email");
	        $this->my_email->config($mail);
	        $this->my_email->sendmail();

	        echo '<meta charset="utf-8">';
			echo "<script>alert('Chúng tôi đã thực hiện gửi thông tin tài khoản qua email bạn đã nhập . Vui lòng kiểm tra lại thông tin trong hộp thư .');</script>";
			echo "<script>window.location='".base_url()."dang-nhap';</script>";
    	}
    }

    public function update_information(){
    	$sess = $this->session->userdata("user_email");
		if($sess=='') redirect("dang-nhap");
		$result = $this->db->query("select b.* from site_user a,site_user_shop b where a.ID=b.UserID")->row();
		if($result){
			$this->template->add_title('Shagohano | Cập nhật thông tin công ty');
			$this->template->write('MetaKeywords','');
			$this->template->write('MetaDescription','');
			$data = array(
				"data"=>$result
			);
			$this->template->write_view('content','site_update_information',$data); 
			$this->template->render();
		}
    }

    public function save_information(){
    	$sess = $this->session->userdata("user_email");
		if($sess=='') redirect("dang-nhap");
		$result = $this->db->query("select b.* from site_user a,site_user_shop b where a.ID=b.UserID")->row();
		if($result){
			$Name_congty = isset($_POST['Name_congty']) ? mysql_real_escape_string($_POST['Name_congty']) : "" ;
			$Name_congty = strip_tags($Name_congty);
			$CategoriesID = isset($_POST['CategoriesID']) ? $_POST['CategoriesID'] : 0 ;
			$CategoriesID = is_numeric($CategoriesID) ? $CategoriesID : 0 ;
			$LoaihinhkinhdoanhID = isset($_POST['LoaihinhkinhdoanhID']) ? $_POST['LoaihinhkinhdoanhID'] : 0 ;
			$LoaihinhkinhdoanhID = is_numeric($LoaihinhkinhdoanhID) ? $LoaihinhkinhdoanhID : 0 ;
			$Masothue = isset($_POST['Masothue']) ? mysql_real_escape_string($_POST['Masothue']) : "" ;
			$Masothue = strip_tags($Masothue);
			$Name_nguoiquanly = isset($_POST['Name_nguoiquanly']) ? mysql_real_escape_string($_POST['Name_nguoiquanly']) : "" ;
			$Name_nguoiquanly = strip_tags($Name_nguoiquanly);
			$Chucvu = isset($_POST['Chucvu']) ? mysql_real_escape_string($_POST['Chucvu']) : "" ;
			$Chucvu = strip_tags($Chucvu);
			$Email = isset($_POST['Email']) ? mysql_real_escape_string($_POST['Email']) : "" ;
			$Email = strip_tags($Email);
			$Phone = isset($_POST['Phone']) ? mysql_real_escape_string($_POST['Phone']) : "" ;
			$Phone = strip_tags($Phone);
			if($Name_congty!='' && $CategoriesID>0 && $LoaihinhkinhdoanhID>0 && $Masothue!='' && $Name_nguoiquanly!='' && $Phone!=''){
				$this->db->query("insert into gianhang_shop(Title,CategoriesID,LoaihinhkinhdoanhID,Masothue,Tennguoiquanly,Chucvu,Email,Phone) value(
					'$Name_congty',$CategoriesID,$LoaihinhkinhdoanhID,'$Masothue','$Tennguoiquanly','$Chucvu','$Email','Phone')");
			}
			redirect("userpage");
		}
    }
	
	public function check_login(){
		$sess = $this->session->userdata("user_email");
		if($sess!='') redirect("userpage");
		if(isset($_POST['login'])){
			$email = isset($_POST['Email']) ? mysql_real_escape_string($_POST['Email']) : '' ;
			$email = str_replace("<script","",$email);
			$password = isset($_POST['Password']) ? mysql_real_escape_string($_POST['Password']) : '' ;
			$password = str_replace("<script","",$password);
			if($email!='' && $password !=''){
				$check = $this->db->query("select * from site_user where Email='$email' and Password='$password'")->row();
				if($check){
					$time = date('Y-m-d H:i:s');
					$this->db->query("update site_user set Lastlogin='$time' where ID=$check->ID");
					$this->session->set_userdata("user_email",$email);
					redirect("userpage");
				}
			}
		}
		redirect("dang-nhap/?error=4");
	}

	public function logout(){
		$this->session->set_userdata("user_email","");
		redirect("dang-nhap");
	}

	public function register(){
		$Email = isset($_POST['Email']) ? mysql_real_escape_string($_POST['Email']) : "" ;
		$Email = strip_tags($Email);
		$this->check_email_valid($Email);
		$Password = isset($_POST['Password']) ? mysql_real_escape_string($_POST['Password']) : "" ;
		$Re_password = isset($_POST['Re_Password']) ? mysql_real_escape_string($_POST['Re_Password']) : "" ;
		$Level = isset($_POST['Level']) ? mysql_real_escape_string($_POST['Level']) : "" ;
		if($Password=='' || $Re_password==''){
			redirect("dang-nhap/?error=1");
		}
		if($Password!=$Re_password){
			redirect("dang-nhap/?error=2");
		}
		$check = $this->db->query("select * from site_user where Email='$Email'")->row();
		if($check){
			redirect("dang-nhap/?error=3");
		}
		$time = date('Y-m-d H:i:s');
		$this->db->query("insert into site_user(Created,Email,Password,Level) value('$time','$Email','$Password','$Level')");
		$this->session->set_userdata("user_email",$Email);
		$this->db->query("insert into gianhang_shop(Created) value('$time')");
		$UserID = $this->db->query("select max(ID) as ID from site_user")->row();
		$ShopID = $this->db->query("select max(ID) as ID from gianhang_shop")->row();
		$this->db->query("insert into site_user_shop(UserID,ShopID) value($UserID->ID,$ShopID->ID)");
		$this->db->query("insert into gianhang_sanphamquantam(Title,ShopID,CategoriesID) values('',$ShopID->ID,0),('',$ShopID->ID,0),('',$ShopID->ID,0)");
		$_POST=array();
		redirect("cap-nhat-thong-tin");
	}

	public function check_email_valid($email=''){
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SERVER['HTTP_REFERER'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '' ;
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
?>