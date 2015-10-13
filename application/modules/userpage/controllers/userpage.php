<?php 
class Userpage extends Site_Controller { 
    public $user;
    public $shop;
    public function __construct() { 
        parent::__construct();
		// Load library template 
        $this->load->library('template'); 
        // Set template 
        $this->template->set_template('site');
        // Add CSS and JS 
        $this->template->add_css('public/site/css/font-awesome.min.css');
        $this->template->add_css('public/site/css/style_userpage.css');

        $this->template->add_js('public/site/js/jquery.ad-gallery.js');

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sess = $this->session->userdata("user_email");
		if($sess=='') redirect("dang-nhap");
        $this->user = $this->db->query("select * from site_user where Email='$sess'")->row();
        $this->shop = $this->db->query("select b.* from site_user c,site_user_shop a,gianhang_shop b where c.Email='$sess' and a.UserID=c.ID and a.ShopID=b.ID")->row();
	}
	
	public function index()
    {
    	$this->template->add_title('Shagohano | User Page');
		$this->template->write_view('content','home'); 
		$this->template->render();
    }
    
    /*  
    *******************************
    *                             *
    *     Thông tin cá nhân       *
    *                             *
    *******************************
    */
    public function thongtincanhan(){
        $this->template->add_title('Thông tin cá nhân | User Page');
        $this->template->write_view('content','qltk_thongtincanhan'); 
        $this->template->render();
    }

    public function save_danhthiep(){
        $Hoten= isset($_POST["Hoten"]) ? mysql_real_escape_string($_POST["Hoten"]) : "" ;
        $Hoten = strip_tags($Hoten);
        $Gioitinh= isset($_POST["Gioitinh"]) ? (int)$_POST["Gioitinh"] : 0 ;
        $Chucvu= isset($_POST["Chucvu"]) ? mysql_real_escape_string($_POST["Chucvu"]) : "" ;
        $Chucvu = strip_tags($Chucvu);
        $this->db->query("update site_user set NameUser='$Hoten',Chucvu='$Chucvu',Gioitinh=$Gioitinh where ID=".$this->user->ID);

        $Email= isset($_POST["Email"]) ? mysql_real_escape_string($_POST["Email"]) : "" ;
        $Email =strip_tags($Email);
        $Duong= isset($_POST["Duong"]) ? mysql_real_escape_string($_POST["Duong"]) : "" ;
        $Duong = strip_tags($Duong);
        $CityID= isset($_POST["CityID"]) ? (int)$_POST["CityID"] : 0 ;
        $Mabuuchinh= isset($_POST["Mabuuchinh"]) ? mysql_real_escape_string($_POST["Mabuuchinh"]) : "" ;
        $Mabuuchinh = strip_tags($Mabuuchinh);
        $Phone= isset($_POST["Phone"]) ? mysql_real_escape_string($_POST["Phone"]) : "" ;
        $Phone = strip_tags($Phone);
        $Fax= isset($_POST["Fax"]) ? mysql_real_escape_string($_POST["Fax"]) : "" ;
        $Fax = strip_tags($Fax);
        $Tencongty= isset($_POST["Tencongty"]) ? mysql_real_escape_string($_POST["Tencongty"]) : "" ;
        $Tencongty = strip_tags($Tencongty);
        $Loaihinhkinhdoanh= isset($_POST["Loaihinhkinhdoanh"]) ? (int)$_POST["Loaihinhkinhdoanh"] : 0 ;
        $Website= isset($_POST["Website"]) ? mysql_real_escape_string($_POST["Website"]) : "" ;
        $Website = strip_tags($Website);
        $this->db->query("update gianhang_shop set Email='$Email',Duong='$Duong',CityID=$CityID,Mabuuchinh='$Mabuuchinh',
            Phone='$Phone',Fax='$Fax',Tencongty='$Tencongty',LoaihinhkinhdoanhID=$Loaihinhkinhdoanh,Website='$Website' where ID=".$this->shop->ID);
        $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
        redirect($link);
    }

    public function save_thongtinmuahang(){
        $Linhvuccongnghiep= isset($_POST["Linhvuccongnghiep"]) ? mysql_real_escape_string($_POST["Linhvuccongnghiep"]) : "" ;
        $Linhvuccongnghiep = strip_tags($Linhvuccongnghiep);
        $Chukymuahang= isset($_POST["Chukymuahang"]) ? (int)$_POST["Chukymuahang"] : 0 ;
        $Chukymuahang = strip_tags($Chukymuahang);
        $Giatrimuahangmoinam= isset($_POST["Giatrimuahangmoinam"]) ? (int)$_POST["Giatrimuahangmoinam"] : 0 ;
        $Giatrimuahangmoinam = strip_tags($Giatrimuahangmoinam);
        $this->db->query("update gianhang_shop set Linhvuccongnghiep='$Linhvuccongnghiep',GiatrimuahangmoinamID=$Giatrimuahangmoinam,ChukymuahangID=$Chukymuahang where ID=".$this->shop->ID);
        $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
        redirect($link);
    }

    public function change_uutien_vungmien(){
        $uutien = isset($_POST['uutien']) ? $_POST['uutien'] : 0 ;
        $id = isset($_POST['ID']) ? $_POST['ID'] : 0 ;
        $this->db->query("update gianhang_uutiennhacungcap set CityID=$id where ID=$uutien and ShopID=".$this->shop->ID);
        echo "ok";
    }

    public function add_uutiennhacungcap(){
        $result = $this->db->query("select * from gianhang_uutiennhacungcap where ShopID=".$this->shop->ID)->result();
        if(count($result)<5){
            $this->db->query("insert into gianhang_uutiennhacungcap(ShopID,CityID) value(".$this->shop->ID.",26)");
        }
        $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
        redirect($link);
    }

    public function change_title_sanphamquantam(){
        $ID = isset($_POST['ID']) ? (int)$_POST['ID'] : 0 ;
        $title = isset($_POST['title']) ? mysql_real_escape_string($_POST['title']) : '' ;
        $title = strip_tags($title);
        if($ID!=0){
            $this->db->query("update gianhang_sanphamquantam set Title='$title' where ID=$ID and ShopID=".$this->shop->ID);
        }
        echo "ok";
    }

    public function change_categories_sanphamquantam(){
        $ID = isset($_POST['ID']) ? (int)$_POST['ID'] : 0 ;
        $Categories = isset($_POST['Categories']) ? (int)$_POST['Categories'] : 0 ;
        if($ID!=0){
            $this->db->query("update gianhang_sanphamquantam set CategoriesID=$Categories where ID=$ID and ShopID=".$this->shop->ID);
        }
        echo "ok";
    }

    /*  
    *******************************
    *                             *
    *     Quản lý thành viên      *
    *                             *
    *******************************
    */
    public function quanlythanhvien(){
        $this->template->add_title('Quản lý thành viên | User Page');
        $this->template->write_view('content','qltk_quanlythanhvien'); 
        $this->template->render();
    }

    public function save_permission(){
        $check = $this->db->query("select * from site_user_shop where ShopID=".$this->shop->ID." order by ID ASC limit 0,1")->row();
        if($check->UserID==$this->user->ID){
            $value = $_POST;
            $ID = isset($_POST['ID']) ? $_POST['ID'] : 0 ;
            if(is_numeric($ID) && $ID>0){
                if(count($value)>0){
                    $arr = array();
                    foreach ($value as $key=>$row) {
                        $key = explode("_",$key);
                        if(isset($key[0]) && $key[0]=="permission" && isset($key[1])){
                            if(is_numeric($key[1])){
                                $arr[] = "(".$key[1].",$ID)";
                            }
                        }
                    }
                    $arr = implode(",",$arr);
                    if($arr!=''){
                        $sql = "insert into site_user_permission(PermissionID,UserID) values".$arr;
                        $this->db->query("delete from site_user_permission where UserID=$ID");
                        $this->db->query($sql);
                    }
                }
            }
        }
        redirect(base_url()."userpage/quanlythanhvien");
    }

    public function search_quanlythanhvien(){
        $keywords = isset($_GET['keywords']) ? mysql_real_escape_string($_GET['keywords']) : "" ;
        $keywords = $keywords!='' ? " and b.NameUser like'%$keywords%'" : "" ;
        $this->template->add_title('Quản lý thành viên | User Page');
        $data=array('keywords'=>$keywords);
        $this->template->write_view('content','qltk_quanlythanhvien',$data); 
        $this->template->render();
    }

    /* Thiếu phần giao diện thêm xóa sửa thành viên */

    /*  
    *******************************
    *                             *
    *     Thiết lập riêng tư      *
    *                             *
    *******************************
    */

    public function thietlapriengtu(){
        $this->template->add_title('Thiết lập riêng tư | User Page');
        $this->template->write_view('content','qltk_thietlapriengtu'); 
        $this->template->render();
    }

    /*  
    *******************************
    *                             *
    *  Thay đổi hình đại diện     *
    *                             *
    *******************************
    */

    public function change_picture(){
        $this->template->add_title('Thay đổi ảnh đại diện | User Page');
        $this->template->write_view('content','qltk_changepicture'); 
        $this->template->render();
    }

    /*  
    *******************************
    *                             *
    *  Thay đổi email tài khoản   *
    *                             *
    *******************************
    */

    public function change_email(){
        $this->template->add_title('Thay đổi email tài khoản | User Page');
        $this->template->write_view('content','qltk_changeemail'); 
        $this->template->render();
    }

    /*  
    *******************************
    *                             *
    * Thay đổi password tài khoản *
    *                             *
    *******************************
    */

    public function change_password(){
        $this->template->add_title('Thay đổi mật khẩu tài khoản | User Page');
        $this->template->write_view('content','qltk_changepassword'); 
        $this->template->render();
    }

    /*  
    *******************************
    *                             *
    * Thay đổi password tài khoản *
    *                             *
    *******************************
    */

    public function cauhoibaomat(){
        $this->template->add_title('Thiết lập câu hỏi bảo mật | User Page');
        $this->template->write_view('content','qltk_cauhoibaomat'); 
        $this->template->render();
    }

    /*  
    *******************************
    *                             *
    * Thiết lập ip đăng nhập      *
    *                             *
    *******************************
    */

    public function settingip(){
        $this->template->add_title('Thiết lập IP đăng nhập | User Page');
        $this->template->write_view('content','qltk_settingip'); 
        $this->template->render();
    }

    /*  
    ********************************************************************************************
    *                             *                                                            *
    *     Hòm thư liên lạc      *   *                                                          * 
    *                             *                                                            *
    ********************************************************************************************
    */

    public function homthulienlac(){
        $this->template->add_title('Hòm thư liên lạc | User Page');
        $this->template->write_view('content','mailbox_home'); 
        $this->template->render();
    }

    /*  
    *******************************
    *                             *
    * Hộp thư đến                 *
    *                             *
    *******************************
    */
    public function hopthuden_hopthuchung(){
        $this->load->view("mailbox_hopthuden_hopthuchung");
    }
    

    public function hopthuden_thubaogia(){
        $this->load->view("mailbox_hopthuden_thubaogia");
    }


    public function hopthuden_thuyeucaubaogia(){
        $this->load->view("mailbox_hopthuden_thuyeucaubaogia");
    }
    

    /*  
    *******************************
    *                             *
    * Thư xem lại                 *
    *                             *
    *******************************
    */
    public function thuxemlai(){
        $this->template->add_title('Thư xem lại | User Page');
        $this->template->write_view('content','mailbox_thuxemlai_home'); 
        $this->template->render();
    }

    public function thuxemlai_hopthuchung(){
        $this->load->view("mailbox_thuxemlai_hopthuchung");
    }
    

    public function thuxemlai_thubaogia(){
        $this->load->view("mailbox_thuxemlai_thubaogia");
    }


    public function thuxemlai_thuyeucaubaogia(){
        $this->load->view("mailbox_thuxemlai_thuyeucaubaogia");
    }

    /*  
    *******************************
    *                             *
    * Thư đã gửi                  *
    *                             *
    *******************************
    */
    public function thudagui(){
        $this->template->add_title('Thư đã gửi | User Page');
        $this->template->write_view('content','mailbox_thudagui_home'); 
        $this->template->render();
    }

    public function thudagui_hopthuchung(){
        $this->load->view("mailbox_thudagui_hopthuchung");
    }

    public function thudagui_thubaogia(){
        $this->load->view("mailbox_thudagui_thubaogia");
    }


    public function thudagui_thuyeucaubaogia(){
        $this->load->view("mailbox_thudagui_thuyeucaubaogia");
    }

    /*  
    *******************************
    *                             *
    * Thư nháp                    *
    *                             *
    *******************************
    */
    public function thunhap(){
        $this->template->add_title('Thư nháp | User Page');
        $this->template->write_view('content','mailbox_thunhap_home'); 
        $this->template->render();
    }

    public function thunhap_hopthuchung(){
        $this->load->view("mailbox_thunhap_hopthuchung");
    }

    public function thunhap_thubaogia(){
        $this->load->view("mailbox_thunhap_thubaogia");
    }


    public function thunhap_thuyeucaubaogia(){
        $this->load->view("mailbox_thunhap_thuyeucaubaogia");
    }

    /*  
    *******************************
    *                             *
    * Thư spam                    *
    *                             *
    *******************************
    */
    public function thuspam(){
        $this->template->add_title('Thư spam | User Page');
        $this->template->write_view('content','mailbox_thuspam_home'); 
        $this->template->render();
    }

    public function thuspam_hopthuchung(){
        $this->load->view("mailbox_thuspam_hopthuchung");
    }

    /*  
    *******************************
    *                             *
    * Thùng rác                   *
    *                             *
    *******************************
    */
    public function thungrac(){
        $this->template->add_title('Thùng rác | User Page');
        $this->template->write_view('content','mailbox_thungrac_home'); 
        $this->template->render();
    }

    public function thungrac_hopthuchung(){
        $this->load->view("mailbox_thungrac_hopthuchung");
    }

    /*  
    *******************************
    *                             *
    * Load view sendmail          *
    *                             *
    *******************************
    */

    public function load_sendmail_message(){
        $this->load->view("mailbox_sendmail_normal");
    }

    /*  
    ********************************************************************************************
    *                                                                                          *
    * Menu thông tin cơ bản                                                                    *
    *                                                                                          *
    ********************************************************************************************
    */
    

    /*  
    *******************************
    *                             *
    * Thông tin cơ bản            *
    *                             *
    *******************************
    */   

    public function thongtincoban(){
        $this->template->add_title('Website & Thông tin công ty | User Page');
		$ShopID = $this->shop->ID;
		$dataShop = $this->db->query("select * from gianhang_thongtincoban where ShopID = $ShopID")->row();
		if(count($dataShop)==0){
			$Duong = $this->shop->Duong;
			$Masothue = $this->shop->Masothue;
			$Website = $this->shop->Website;
			$dataInsert = array(
				'ShopID' => $this->shop->ID,
				'Tencongty' => $this->shop->Tencongty,
				'TinhthanhID' => $this->shop->CityID,
				'Duong' => "$Duong",
				'QuanHuyen' => '',
				'Mabuuchinh' => $this->shop->Mabuuchinh,
				'SiteCategoriesID' => $this->shop->CategoriesID,
				'LoaihinhkinhdoanhID' => $this->shop->LoaihinhkinhdoanhID,
				'Sanphamchinh' => '/////',
				'Masothue' => "$Masothue",
				'Namthanhlap' => '',
				'TongnhanlucID' => '',
				'Website' => "$Website",
				'Chusohuu' => '',
				'DientichvanphongID' => '',
				'Themanhcongty' => ''
			);
			$this->db->insert('gianhang_thongtincoban',$dataInsert);
		}
		
		$dataShop2 = $this->db->query("select * from gianhang_thongtincoban where ShopID = $ShopID")->row();
		$data=array(
			'ShopID' => $this->shop->ID,
            'data_thongtincoban'=>$dataShop2
        );
		
        $this->template->write_view('content','ttct_thongtincoban',$data); 
        $this->template->render();
    }

    public function update_thongtincoban($id){
        $ID = $id;

        $Tencongty= isset($_POST["Tencongty"]) ? mysql_real_escape_string($_POST["Tencongty"]) : "" ;
        $Tencongty = strip_tags($Tencongty);
        $Vungmien= isset($_POST["vungmien"]) ? mysql_real_escape_string($_POST["vungmien"]) : "" ;
        $Vungmien = strip_tags($Vungmien);
        $Duong= isset($_POST["duong"]) ? mysql_real_escape_string($_POST["duong"]) : "" ;
        $Duong = strip_tags($Duong);
        $Quanhuyen= isset($_POST["quanhuyen"]) ? mysql_real_escape_string($_POST["quanhuyen"]) : "" ;
        $Quanhuyen = strip_tags($Quanhuyen);
        $Nganhnghe= isset($_POST["nganhnghe"]) ? mysql_real_escape_string($_POST["nganhnghe"]) : "" ;
        $Nganhnghe = strip_tags($Nganhnghe);
        $Loaihinhkinhdoanh= isset($_POST["loaihinhkinhdoanh"]) ? mysql_real_escape_string($_POST["loaihinhkinhdoanh"]) : "" ;
        $Loaihinhkinhdoanh = strip_tags($Loaihinhkinhdoanh);

        $Sanphamchinh0 = isset($_POST["sanphamchinh0"]) ? mysql_real_escape_string($_POST["sanphamchinh0"]) : "" ;
        $Sanphamchinh0 = strip_tags($Sanphamchinh0);
        $Sanphamchinh1 = isset($_POST["sanphamchinh1"]) ? mysql_real_escape_string($_POST["sanphamchinh1"]) : "" ;
        $Sanphamchinh1 = strip_tags($Sanphamchinh1);
        $Sanphamchinh2 = isset($_POST["sanphamchinh2"]) ? mysql_real_escape_string($_POST["sanphamchinh2"]) : "" ;
        $Sanphamchinh2 = strip_tags($Sanphamchinh2);
        $Sanphamchinh3 = isset($_POST["sanphamchinh3"]) ? mysql_real_escape_string($_POST["sanphamchinh3"]) : "" ;
        $Sanphamchinh3 = strip_tags($Sanphamchinh3);
        $Sanphamchinh4 = isset($_POST["sanphamchinh4"]) ? mysql_real_escape_string($_POST["sanphamchinh4"]) : "" ;
        $Sanphamchinh4 = strip_tags($Sanphamchinh4);
        $Sanphamchinh5 = isset($_POST["sanphamchinh5"]) ? mysql_real_escape_string($_POST["sanphamchinh5"]) : "" ;
        $Sanphamchinh5 = strip_tags($Sanphamchinh5);

        $Sanphamchinh = $Sanphamchinh0."/".$Sanphamchinh1."/".$Sanphamchinh2."/".$Sanphamchinh3."/".$Sanphamchinh4."/".$Sanphamchinh5;

        $Masothue = isset($_POST["masothue"]) ? mysql_real_escape_string($_POST["masothue"]) : "" ;
        $Masothue = strip_tags($Masothue);
        $Nam = isset($_POST["nam"]) ? mysql_real_escape_string($_POST["nam"]) : "" ;
        $Nam = strip_tags($Nam);
        $Tongnhanluc = isset($_POST["tongnhanluc"]) ? mysql_real_escape_string($_POST["tongnhanluc"]) : "" ;
        $Tongnhanluc = strip_tags($Tongnhanluc);
        $Website = isset($_POST["website"]) ? mysql_real_escape_string($_POST["website"]) : "" ;
        $Website = strip_tags($Website);
        $Chusohuu = isset($_POST["chusohuu"]) ? mysql_real_escape_string($_POST["chusohuu"]) : "" ;
        $Chusohuu = strip_tags($Chusohuu);
        $Dientichvanphong = isset($_POST["dientichvanphong"]) ? mysql_real_escape_string($_POST["dientichvanphong"]) : "" ;
        $Dientichvanphong = strip_tags($Dientichvanphong);
        $Themanh = isset($_POST["themanh"]) ? mysql_real_escape_string($_POST["themanh"]) : "" ;
        $Themanh = strip_tags($Themanh);

        $data = array(
            'Tencongty'=>$Tencongty,
            'TinhthanhID'=>$Vungmien,
            'Duong'=>$Duong,
            'QuanHuyen'=>$Quanhuyen,
            'SiteCategoriesID'=>$Nganhnghe,
            'LoaihinhkinhdoanhID'=>$Loaihinhkinhdoanh,
            'Sanphamchinh'=>$Sanphamchinh,
            'Masothue'=>$Masothue,
            'Namthanhlap'=>$Nam,
            'TongnhanlucID'=>$Tongnhanluc,
            'Website'=>$Website,
            'Chusohuu'=>$Chusohuu,
            'DientichvanphongID'=>$Dientichvanphong,
            'Themanhcongty'=>$Themanh
        );
        $active = $this->db->where("ID",$ID);
        $active = $this->db->update("gianhang_thongtincoban",$data);
        $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
        redirect($link);
    }

    /*  
    *******************************
    *                             *
    * Thông tin nhà máy           *
    *                             *
    *******************************
    */

    public function thongtinnhamay(){
        $this->template->add_title('Thông tin nhà máy | User Page');
        $ShopID = $this->shop->ID;
        $dataShop = $this->db->query("select * from gianhang_thongtinnhamay where ShopID = $ShopID")->row();
        if(count($dataShop)==0){
            $dataInsert = array(
                'ShopID' => $this->shop->ID,
                'Diachinhamay' => '',
                'DientichnhamayID' => '',
                'CachcungcapID' => "",
                'Kinhnghiem' => '',
                'NhansudambaochatluongID' => '',
                'NhansunghiencuuvaphattrienID' => '',
                'SoluongdaychuyenID' => '',
                'TonggiatrisanxuatID' => ''
            );
            $this->db->insert('gianhang_thongtinnhamay',$dataInsert);
        }
        
        $dataShop2 = $this->db->query("select * from gianhang_thongtinnhamay where ShopID = $ShopID")->row();
        $data=array(
			'ShopID' => $this->shop->ID,
            'data_thongtinnhamay'=>$dataShop2
        );

        $this->template->write_view('content','ttct_thongtinnhamay',$data); 
        $this->template->render();
    }

    public function update_thongtinnhamay($id){
        $ID = $id;

        $Nhamaydattai= isset($_POST["nhamaydattai"]) ? mysql_real_escape_string($_POST["nhamaydattai"]) : "" ;
        $Nhamaydattai = strip_tags($Nhamaydattai);
        $Dientichnhamay= isset($_POST["dientichnhamay"]) ? mysql_real_escape_string($_POST["dientichnhamay"]) : "" ;
        $Dientichnhamay = strip_tags($Dientichnhamay);
        $Cachcungcap= isset($_POST["cachcungcap"]) ? mysql_real_escape_string($_POST["cachcungcap"]) : "" ;
        $Cachcungcap = strip_tags($Cachcungcap);
        $Kinhnghiem= isset($_POST["kinhnghiem"]) ? mysql_real_escape_string($_POST["kinhnghiem"]) : "" ;
        $Kinhnghiem = strip_tags($Kinhnghiem);
        $Nhansu_dambaochatluong= isset($_POST["nhansu_dambaochatluong"]) ? mysql_real_escape_string($_POST["nhansu_dambaochatluong"]) : "" ;
        $Nhansu_dambaochatluong = strip_tags($Nhansu_dambaochatluong);
        $Nhansu_nghiencuu= isset($_POST["nhansu_nghiencuu"]) ? mysql_real_escape_string($_POST["nhansu_nghiencuu"]) : "" ;
        $Nhansu_nghiencuu = strip_tags($Nhansu_nghiencuu);
        $Soluong_daychuyensanxuat= isset($_POST["soluong_daychuyensanxuat"]) ? mysql_real_escape_string($_POST["soluong_daychuyensanxuat"]) : "" ;
        $Soluong_daychuyensanxuat = strip_tags($Soluong_daychuyensanxuat);
        $Tong_giatrisanxuat_hangnam= isset($_POST["tong_giatrisanxuat_hangnam"]) ? mysql_real_escape_string($_POST["tong_giatrisanxuat_hangnam"]) : "" ;
        $Tong_giatrisanxuat_hangnam = strip_tags($Tong_giatrisanxuat_hangnam);
        
        $data = array(
            'Diachinhamay'=>$Nhamaydattai,
            'DientichnhamayID'=>$Dientichnhamay,
            'CachcungcapID'=>$Cachcungcap,
            'Kinhnghiem'=>$Kinhnghiem,
            'NhansudambaochatluongID'=>$Nhansu_dambaochatluong,
            'NhansunghiencuuvaphattrienID'=>$Nhansu_nghiencuu,
            'SoluongdaychuyenID'=>$Soluong_daychuyensanxuat,
            'TonggiatrisanxuatID'=>$Tong_giatrisanxuat_hangnam
        );
        $active = $this->db->where("ID",$ID);
        $active = $this->db->update("gianhang_thongtinnhamay",$data);
        $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
        redirect($link);
    }
    
    /*  
    *******************************
    *                             *
    * Thông tin giao dịch         *
    *                             *
    *******************************
    */

    public function thongtingiaodich(){
        $this->template->add_title('Thông tin giao dịch | User Page');

        $ShopID = $this->shop->ID;
        $dataShop = $this->db->query("select * from gianhang_thongtingiaodich where ShopID = $ShopID")->row();
        if(count($dataShop)==0){
            $dataInsert = array(
                'ShopID'=>$ShopID,
                'TongdoanhthuhangnamID' => '',
                'Thitruongchinh' => '',
                'NhansuphongkinhdoanhID' => '',
                'ThoigiansanxuattrungbinhID' => "",
                'PhuongthucthanhtoanuutienID' => ''
            );
            $this->db->insert('gianhang_thongtingiaodich',$dataInsert);
        }
        
        $dataShop2 = $this->db->query("select * from gianhang_thongtingiaodich where ShopID = $ShopID")->row();
        $data=array(
			'ShopID'=>$ShopID,
            'data_thongtingiaodich'=>$dataShop2
        );

        $this->template->write_view('content','ttct_thongtingiaodich',$data); 
        $this->template->render();
    }
    
    public function update_thongtingiaodich($id){
        $ID = $id;

        $TongdoanhthuhangnamID= isset($_POST["Tongdoanhthuhangnam"]) ? mysql_real_escape_string($_POST["Tongdoanhthuhangnam"]) : "" ;
        $TongdoanhthuhangnamID = strip_tags($TongdoanhthuhangnamID);
        $Thitruongchinh= isset($_POST["Nhansuphongkinhdoanh"]) ? mysql_real_escape_string($_POST["Nhansuphongkinhdoanh"]) : "" ;
        $Thitruongchinh = strip_tags($Thitruongchinh);
        $NhansuphongkinhdoanhID= isset($_POST["Nhansuphongkinhdoanh"]) ? mysql_real_escape_string($_POST["Nhansuphongkinhdoanh"]) : "" ;
        $NhansuphongkinhdoanhID = strip_tags($NhansuphongkinhdoanhID);
        $ThoigiansanxuattrungbinhID= isset($_POST["Thoigiansanxuatcungcaptrungbinh"]) ? mysql_real_escape_string($_POST["Thoigiansanxuatcungcaptrungbinh"]) : "" ;
        $ThoigiansanxuattrungbinhID = strip_tags($ThoigiansanxuattrungbinhID);
        $PhuongthucthanhtoanuutienID= isset($_POST["phuongthuc_thanhtoan_uutien"]) ? mysql_real_escape_string($_POST["phuongthuc_thanhtoan_uutien"]) : "" ;
        $PhuongthucthanhtoanuutienID = strip_tags($PhuongthucthanhtoanuutienID);

        $data = array(
            'TongdoanhthuhangnamID'=>$TongdoanhthuhangnamID,
            'Thitruongchinh'=>'',
            'NhansuphongkinhdoanhID'=>$NhansuphongkinhdoanhID,
            'ThoigiansanxuattrungbinhID'=>$ThoigiansanxuattrungbinhID,
            'PhuongthucthanhtoanuutienID'=>$PhuongthucthanhtoanuutienID
        );
        $active = $this->db->where("ID",$ID);
        $active = $this->db->update("gianhang_thongtingiaodich",$data);
        $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
        redirect($link);
    }

    /*  
    *******************************
    *                             *
    * Giới thiệu công ty          *
    *                             *
    *******************************
    */

    public function gioithieucongty(){
        $this->template->add_title('Giới thiệu công ty | User Page');

        $ShopID = $this->shop->ID;
        $dataShop = $this->db->query("select * from gianhang_gioithieucongty where ShopID = $ShopID")->row();
        if(count($dataShop)==0){
            $dataInsert = array(
                'ShopID'=>$ShopID,
                'Logo' => '',
                'Gioithieuchitiet' => '',
                'Trangthaithamgiatrienlam' => ''
            );
            $this->db->insert('gianhang_gioithieucongty',$dataInsert);
        }

        $dataHoichotrienlam = $this->db->query("select * from gianhang_hoichotrienlam where ShopID = $ShopID")->row();
        if(count($dataHoichotrienlam)==0){
            $dataHoichotrienlamIs = array(
                'ShopID'=>$ShopID,
                'Thoidiem_thang' => '',
                'Thoidiem_nam' => '',
                'TinhthanhID' => '',
                'Gioithieutomtat' => '',
                'Image1' => '',
                'Image2' => '',
                'Image3' => '',
                'Tenhoichotrienlam' => ''
            );
            $this->db->insert('gianhang_hoichotrienlam',$dataHoichotrienlamIs);
        }

        $dataHoichotrienlam2 = $this->db->query("select * from gianhang_hoichotrienlam where ShopID = $ShopID")->row();
        $dataShop2 = $this->db->query("select * from gianhang_gioithieucongty where ShopID = $ShopID")->row();
        $data=array(
			'ShopID'=>$ShopID,
            'data_gioithieucongty'=>$dataShop2,
            'data_hoichotrienlam'=>$dataHoichotrienlam2
        );

        $this->template->write_view('content','ttct_gioithieucongty',$data); 
        $this->template->render();
    }

    public function update_gioithieucongty($id){
        $ID = $id;
		$ShopID = $this->shop->ID;
        //Update gianhang_gioithieucongty
        $Gioithieuchitiet= isset($_POST["themanh"]) ? mysql_real_escape_string($_POST["themanh"]) : "" ;
        $Gioithieuchitiet = strip_tags($Gioithieuchitiet);
        $Trangthaithamgiatrienlam= isset($_POST["trienlam"]) ? mysql_real_escape_string($_POST["trienlam"]) : "" ;
        $Trangthaithamgiatrienlam = strip_tags($Trangthaithamgiatrienlam);

        $data = array(
			'ShopID'=>$ShopID,
            'Gioithieuchitiet'=>$Gioithieuchitiet,
            'Trangthaithamgiatrienlam'=>$Trangthaithamgiatrienlam
        );
        if(isset($_FILES['Image_upload'])){
            if($_FILES['Image_upload']['error']==0){
                $data_gtct = $this->db->query("select * from gianhang_gioithieucongty where ShopID = $ID")->row();
                $this->delete_file_by_id_file($data_gtct->Logo);
                $this->upload_to = "userpage_gioithieucongty/".$ID;
                $id_files = $this->upload_image();
                $data['Logo'] = $id_files;
            }
        }

        $active = $this->db->where("ShopID",$ID);
        $active = $this->db->update("gianhang_gioithieucongty",$data);

        //Update gianhang_hoichotrienlam
        $Tenhoichotrienlam= isset($_POST["tenhoicho"]) ? mysql_real_escape_string($_POST["tenhoicho"]) : "" ;
        $Tenhoichotrienlam = strip_tags($Tenhoichotrienlam);
        $Thoidiem_thang= isset($_POST["thang"]) ? mysql_real_escape_string($_POST["thang"]) : "" ;
        $Thoidiem_thang = strip_tags($Thoidiem_thang);
        $Thoidiem_nam= isset($_POST["nam"]) ? mysql_real_escape_string($_POST["nam"]) : "" ;
        $Thoidiem_nam = strip_tags($Thoidiem_nam);
        $TinhthanhID= isset($_POST["tinh_thanh"]) ? mysql_real_escape_string($_POST["tinh_thanh"]) : "" ;
        $TinhthanhID = strip_tags($TinhthanhID);
        $Gioithieutomtat= isset($_POST["tomtat_trienlam"]) ? mysql_real_escape_string($_POST["tomtat_trienlam"]) : "" ;
        $Gioithieutomtat = strip_tags($Gioithieutomtat);

        $data2 = array(
			'ShopID'=>$ShopID,
            'Thoidiem_thang'=>$Thoidiem_thang,
            'Thoidiem_nam'=>$Thoidiem_nam,
            'TinhthanhID'=>$TinhthanhID,
            'Gioithieutomtat'=>$Gioithieutomtat,
            'Tenhoichotrienlam'=>$Tenhoichotrienlam
        );

        if(isset($_FILES['hinhtrienlam_img1'])){
            if($_FILES['hinhtrienlam_img1']['error']==0){
                $this->upload_to = "userpage_gioithieucongty/".$ID;
                $url_files1 = $this->upload_image_url('hinhtrienlam_img1');
                $data2['Image1'] = $url_files1;
            }
        }

        if(isset($_FILES['hinhtrienlam_img2'])){
            if($_FILES['hinhtrienlam_img2']['error']==0){
                $this->upload_to = "userpage_gioithieucongty/".$ID;
                $url_files2 = $this->upload_image_url('hinhtrienlam_img2');
                $data2['Image2'] = $url_files2;
            }
        }

        if(isset($_FILES['hinhtrienlam_img3'])){
            if($_FILES['hinhtrienlam_img3']['error']==0){
                $this->upload_to = "userpage_gioithieucongty/".$ID;
                $url_files3 = $this->upload_image_url('hinhtrienlam_img3');
                $data2['Image3'] = $url_files3;
            }
        }

        $active2 = $this->db->where("ShopID",$ID);
        $active2 = $this->db->update("gianhang_hoichotrienlam",$data2);


        $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
        redirect($link);
    }

    /*  
    *******************************
    *                             *
    * Chứng nhận và bảo hộ        *
    *                             *
    *******************************
    */

    public function chungnhanvabaoho(){
		$ShopID = $this->shop->ID;
        $this->template->add_title('Chứng nhận và báo cáo thử nghiệm | User Page');
        $ShopID = $this->shop->ID;
        $data_baocaothunghiem = $this->db->query("select * from gianhang_chungnhan_chungnhanvabaocaothunghiem where ShopID = $ShopID")->result();
        $data_baocaothunghiem2 = $this->db->query("select * from gianhang_chungnhan_chungnhanvabaocaothunghiem where ShopID = $ShopID")->row();
        $data = array(
			'ShopID'=>$ShopID,
            'data_baocaothunghiem' => $data_baocaothunghiem,
            'data_baocaothunghiem2' => $data_baocaothunghiem2,
        );

        $this->template->write_view('content','ttct_chungnhanvabaoho',$data); 
        $this->template->render();
    }

    public function add_chungnhanvabaoho($id){
        $ShopID = $id;

        $loaichungnhan = isset($_POST["loaichungnhan"]) ? mysql_real_escape_string($_POST["loaichungnhan"]) : "" ;
        $loaichungnhan = strip_tags($loaichungnhan);
        $sochungnhan = isset($_POST["sochungnhan"]) ? mysql_real_escape_string($_POST["sochungnhan"]) : "" ;
        $sochungnhan = strip_tags($sochungnhan);
        $tenchungnhan = isset($_POST["tenchungnhan"]) ? mysql_real_escape_string($_POST["tenchungnhan"]) : "" ;
        $tenchungnhan = strip_tags($tenchungnhan);
        $duoccapboi = isset($_POST["duoccapboi"]) ? mysql_real_escape_string($_POST["duoccapboi"]) : "" ;
        $duoccapboi = strip_tags($duoccapboi);

        $ngaycap = isset($_POST["ngaycap"]) ? mysql_real_escape_string($_POST["ngaycap"]) : "" ;
        $ngaycap = strip_tags($ngaycap);
        $thangcap = isset($_POST["thangcap"]) ? mysql_real_escape_string($_POST["thangcap"]) : "" ;
        $thangcap = strip_tags($thangcap);
        $namcap = isset($_POST["namcap"]) ? mysql_real_escape_string($_POST["namcap"]) : "" ;
        $namcap = strip_tags($namcap);
        $ngaycapAll = $ngaycap."/".$thangcap."/".$namcap;

        $ngayhethan = isset($_POST["ngaycap"]) ? mysql_real_escape_string($_POST["ngaycap"]) : "" ;
        $ngayhethan = strip_tags($ngayhethan);
        $thanghethan = isset($_POST["thanghethan"]) ? mysql_real_escape_string($_POST["thanghethan"]) : "" ;
        $thanghethan = strip_tags($thanghethan);
        $namhethan = isset($_POST["namhethan"]) ? mysql_real_escape_string($_POST["namhethan"]) : "" ;
        $namhethan = strip_tags($namhethan);
        $ngayhethanAll = $ngayhethan."/".$thanghethan."/".$namhethan;
        
        $tomtat = isset($_POST["tomtat"]) ? mysql_real_escape_string($_POST["tomtat"]) : "" ;
        $tomtat = strip_tags($tomtat);

        $data2 = array(
            'ShopID'=>$id,
            'LoaichungnhanID'=>$loaichungnhan,
            'Sochungnhan'=>$sochungnhan,
            'Donvicapchungnhan'=>$duoccapboi,
            'TenchungnhanID'=>$tenchungnhan,
            'Ngaycap'=>$ngaycapAll,
            'Ngayhethan'=>$ngayhethanAll,
            'Tomtat'=>$tomtat
        );
        $active2 = $this->db->insert("gianhang_chungnhan_chungnhanvabaocaothunghiem",$data2);

        $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
        redirect($link);
    }

    /*  
    *******************************
    *                             *
    * Giải thưởng                 *
    *                             *
    *******************************
    */
    public function giaithuong(){
		$ShopID = $this->shop->ID;
        $this->template->add_title('Giải thưởng | User Page');
        $ShopID = $this->shop->ID;
        $data_baocaothunghiem = $this->db->query("select * from gianhang_chungnhan_giaithuong where ShopID = $ShopID")->result();
        $data = array(
			'ShopID'=>$ShopID,
            'data_giaithuong' => $data_baocaothunghiem 
        );

        $this->template->write_view('content','ttct_giaithuong',$data); 
        $this->template->render();
    }

    public function add_giaithuong($id){
        $ShopID = $id;

        $tengiaithuong = isset($_POST["sochungnhan"]) ? mysql_real_escape_string($_POST["sochungnhan"]) : "" ;
        $tengiaithuong = strip_tags($tengiaithuong);
        $duoccapboi = isset($_POST["duoccapboi"]) ? mysql_real_escape_string($_POST["duoccapboi"]) : "" ;
        $duoccapboi = strip_tags($duoccapboi);

        $ngaycap = isset($_POST["ngaycap"]) ? mysql_real_escape_string($_POST["ngaycap"]) : "" ;
        $ngaycap = strip_tags($ngaycap);
        $thangcap = isset($_POST["thangcap"]) ? mysql_real_escape_string($_POST["thangcap"]) : "" ;
        $thangcap = strip_tags($thangcap);
        $namcap = isset($_POST["namcap"]) ? mysql_real_escape_string($_POST["namcap"]) : "" ;
        $namcap = strip_tags($namcap);
        $ngaycapAll = $ngaycap."/".$thangcap."/".$namcap;
        
        $tomtat = isset($_POST["tomtat"]) ? mysql_real_escape_string($_POST["tomtat"]) : "" ;
        $tomtat = strip_tags($tomtat);

        $data2 = array(
            'ShopID'=>$id,
            'Tengiaithuong'=>$tengiaithuong,
            'Donvicapgiaithuong'=>$duoccapboi,
            'Ngaycap'=>$ngaycapAll,
            'Tomtat'=>$tomtat
        );
        $active2 = $this->db->insert("gianhang_chungnhan_giaithuong",$data2);

         $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
        redirect($link);
    }

    /*  
    *******************************
    *                             *
    * Bằng sáng chế               *
    *                             *
    *******************************
    */
    public function bangsangche(){
		$ShopID = $this->shop->ID;
        $this->template->add_title('Bằng sáng chế | User Page');
        $ShopID = $this->shop->ID;
        $data_baocaothunghiem = $this->db->query("select * from gianhang_chungnhan_bangsangche where ShopID = $ShopID")->result();
        $data = array(
			'ShopID'=>$ShopID,
            'data_bangsangche' => $data_baocaothunghiem 
        );

        $this->template->write_view('content','ttct_bangsangche',$data); 
        $this->template->render();
    }

    public function add_bangsangche($id){
        $ShopID = $id;

        $masobangsangche = isset($_POST["sochungnhan"]) ? mysql_real_escape_string($_POST["sochungnhan"]) : "" ;
        $masobangsangche = strip_tags($masobangsangche);
        $ten = isset($_POST["duoccapboi"]) ? mysql_real_escape_string($_POST["duoccapboi"]) : "" ;
        $ten = strip_tags($ten);
        $loai = isset($_POST["tenchungnhan"]) ? mysql_real_escape_string($_POST["tenchungnhan"]) : "" ;
        $loai = strip_tags($loai);

        $ngaycap = isset($_POST["ngaycap"]) ? mysql_real_escape_string($_POST["ngaycap"]) : "" ;
        $ngaycap = strip_tags($ngaycap);
        $thangcap = isset($_POST["thangcap"]) ? mysql_real_escape_string($_POST["thangcap"]) : "" ;
        $thangcap = strip_tags($thangcap);
        $namcap = isset($_POST["namcap"]) ? mysql_real_escape_string($_POST["namcap"]) : "" ;
        $namcap = strip_tags($namcap);
        $ngaycapAll = $ngaycap."/".$thangcap."/".$namcap;
        
        $tomtat = isset($_POST["tomtat"]) ? mysql_real_escape_string($_POST["tomtat"]) : "" ;
        $tomtat = strip_tags($tomtat);

        $data2 = array(
            'ShopID'=>$id,
            'Masobangsangche'=>$masobangsangche,
            'Tenbangsangche'=>$ten,
            'LoaibangsangcheID'=>$loai,
            'Ngaycap'=>$ngaycapAll
        );

        if(isset($_FILES['hinhtrienlam_img1'])){
            if($_FILES['hinhtrienlam_img1']['error']==0){
                $this->upload_to = "userpage_gioithieucongty/".$ID;
                $url_files1 = $this->upload_image_url('hinhtrienlam_img1');
                $data2['Image1'] = $url_files1;
            }
        }

        if(isset($_FILES['hinhtrienlam_img2'])){
            if($_FILES['hinhtrienlam_img2']['error']==0){
                $this->upload_to = "userpage_gioithieucongty/".$ID;
                $url_files2 = $this->upload_image_url('hinhtrienlam_img2');
                $data2['Image2'] = $url_files2;
            }
        }

        if(isset($_FILES['hinhtrienlam_img3'])){
            if($_FILES['hinhtrienlam_img3']['error']==0){
                $this->upload_to = "userpage_gioithieucongty/".$ID;
                $url_files3 = $this->upload_image_url('hinhtrienlam_img3');
                $data2['Image3'] = $url_files3;
            }
        }

        $active2 = $this->db->insert("gianhang_chungnhan_bangsangche",$data2);


         $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
        redirect($link);
    }

    /*  
    *******************************
    *                             *
    * Thương hiệu                 *
    *                             *
    *******************************
    */
    public function thuonghieu(){
		$ShopID = $this->shop->ID;
        $this->template->add_title('Thương hiệu | User Page');
        $ShopID = $this->shop->ID;
        $data_baocaothunghiem = $this->db->query("select * from gianhang_chungnhan_thuonghieu where ShopID = $ShopID")->result();
        $data = array(
			'ShopID'=>$ShopID,
            'data_thuonghieu' => $data_baocaothunghiem 
        );
        $this->template->write_view('content','ttct_thuonghieu',$data); 
        $this->template->render();
    }

    public function add_thuonghieu($id){
        $ShopID = $id;

        $sodangky = isset($_POST["sochungnhan"]) ? mysql_real_escape_string($_POST["sochungnhan"]) : "" ;
        $sodangky = strip_tags($sodangky);
        $ten = isset($_POST["tenthuonghieu"]) ? mysql_real_escape_string($_POST["tenthuonghieu"]) : "" ;
        $ten = strip_tags($ten);

        $ngaycap = isset($_POST["ngaycap"]) ? mysql_real_escape_string($_POST["ngaycap"]) : "" ;
        $ngaycap = strip_tags($ngaycap);
        $thangcap = isset($_POST["thangcap"]) ? mysql_real_escape_string($_POST["thangcap"]) : "" ;
        $thangcap = strip_tags($thangcap);
        $namcap = isset($_POST["namcap"]) ? mysql_real_escape_string($_POST["namcap"]) : "" ;
        $namcap = strip_tags($namcap);
        $ngaycapAll = $ngaycap."/".$thangcap."/".$namcap;

        $ngayhethan = isset($_POST["ngayhethan"]) ? mysql_real_escape_string($_POST["ngayhethan"]) : "" ;
        $ngayhethan = strip_tags($ngayhethan);
        $thanghethan = isset($_POST["thanghethan"]) ? mysql_real_escape_string($_POST["thanghethan"]) : "" ;
        $thanghethan = strip_tags($thanghethan);
        $namhethan = isset($_POST["namhethan"]) ? mysql_real_escape_string($_POST["namhethan"]) : "" ;
        $namhethan = strip_tags($namhethan);
        $ngayhethanAll = $ngayhethan."/".$thanghethan."/".$namhethan;
        
        $tomtat = isset($_POST["tomtat"]) ? mysql_real_escape_string($_POST["tomtat"]) : "" ;

        $data2 = array(
            'ShopID'=>$id,
            'Sodangky'=>$sodangky,
            'Tenthuonghieu'=>$ten,
            'Ngaycap'=>$ngaycapAll,
            'Ngayhethan'=> $ngayhethanAll,
            'Tomtat'=> $tomtat
        );
        $active2 = $this->db->insert("gianhang_chungnhan_thuonghieu",$data2);

        $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
        redirect($link);
    }

    /*  
    ********************************************************************************************
    *                                                                                          *
    * Menu quản lý sản phẩm                                                                    *
    *                                                                                          *
    ********************************************************************************************
    */

    /*  
    *******************************
    *                             *
    * Danh sách sản phẩm        *
    *                             *
    *******************************
    */

    public function danhsachsanpham(){
        $this->template->add_title('Danh sách sản phẩm | User Page');
        $ShopID = $this->shop->ID;

        $limit=20;
        $start=isset($_GET['start']) ? $_GET['start'] : 0;
        $temp=$start==0 ? 'limit 0,'.$limit : 'limit '.$start*$limit.','.$limit;

		$data_sanpham = $this->db->query("select * from gianhang_sanpham where ShopID = $ShopID $temp")->result();
        $total = $this->db->query("select count(*) as tong from gianhang_sanpham where ShopID = $ShopID")->row();
        $data = array(
            'data_sanpham' => $data_sanpham,
            'nav'=>$this->lib->get_data_phantrang_link($total->tong,'',$limit,3)
        );
		
        $this->template->write_view('content','qlsp_danhsachsanpham',$data); 
        $this->template->render();
    }
	
	public function danhsachsanpham2(){
		$this->template->add_js('public/site/js/angular.min.js');
		
        $this->template->add_title('Danh sách sản phẩm 2 | User Page');
        $ShopID = $this->shop->ID;

        $limit=20;
        $start=isset($_GET['start']) ? $_GET['start'] : 0;
        $temp=$start==0 ? 'limit 0,'.$limit : 'limit '.$start*$limit.','.$limit;

		$data_sanpham = $this->db->query("select * from gianhang_sanpham where ShopID = $ShopID $temp")->result();
        $total = $this->db->query("select count(*) as tong from gianhang_sanpham where ShopID = $ShopID")->row();
        $data = array(
            'data_sanpham' => $data_sanpham,
            'nav'=>$this->lib->get_data_phantrang_link($total->tong,'',$limit,3)
        );
		
        $this->template->write_view('content','qlsp_danhsachsanpham2',$data); 
        $this->template->render();
    }
	
	public function sanpham_angular(){
		$ShopID = $this->shop->ID;
		$data_sanpham = $this->db->query("select * from gianhang_sanpham where ShopID = $ShopID")->result();
		if(count($data_sanpham)>0){
			foreach($data_sanpham as $row){
				$PriceStr = explode('_',$row->Price);
				$Price = $PriceStr[0] != " " ? $PriceStr[0] : 0;
				$row->Gia = number_format((int)$Price)." ".$PriceStr[2];
				
				$data_UserPost = $this->db->query("select * from site_user where ID=$row->UserPostID")->row();
				$row->Nguoidang = $data_UserPost->NameUser;
				
				if($row->Image_Url == ""){
					$row->Duongdananh = $Url = base_url()."public/site/images/chonanh.png";
				}
				else{
					$row->Duongdananh = $row->Image_Url;
				}
				
				
				$row->Ngaycapnhat = date("d/m/Y",strtotime($row->LastEdited));
			}
			echo json_encode($data_sanpham);
		}
	}
	
    public function add_sanpham(){
        if (isset($_POST['dangbanvathem']) || isset($_POST['dangban']) || isset($_POST['luunhap'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $now = gmdate("d/m/Y H:i:s", time());
            $now = date('Y-m-d H:i:s');

            $tensanpham = isset($_POST["tensanpham"]) ? mysql_real_escape_string($_POST["tensanpham"]) : "" ;
            $tensanpham = strip_tags($tensanpham);
            $tukhoasanpham = isset($_POST["tukhoasanpham"]) ? mysql_real_escape_string($_POST["tukhoasanpham"]) : "" ;
            $tukhoasanpham = strip_tags($tukhoasanpham);
            $danhmuc = isset($_POST["danhmuc"]) ? mysql_real_escape_string($_POST["danhmuc"]) : "" ;
            $danhmuc = strip_tags($danhmuc);

            $soluongdonhangtoithieu1 = isset($_POST["soluongdonhangtoithieu"]) ? mysql_real_escape_string($_POST["soluongdonhangtoithieu"]) : "" ;
            $soluongdonhangtoithieu1 = strip_tags($soluongdonhangtoithieu1);
            $donvitinh1 = isset($_POST["donvitinh1"]) ? mysql_real_escape_string($_POST["donvitinh1"]) : "" ;
            $donvitinh1 = strip_tags($donvitinh1);
            $soluongdonhangtoithieu = $soluongdonhangtoithieu1." _".$donvitinh1;

            $giathapnhat = isset($_POST["giathapnhat"]) ? mysql_real_escape_string($_POST["giathapnhat"]) : "" ;
            $giathapnhat = strip_tags($giathapnhat);
            $giacaonhat = isset($_POST["giacaonhat"]) ? mysql_real_escape_string($_POST["giacaonhat"]) : "" ;
            $giacaonhat = strip_tags($giacaonhat);
            $donvitinh_gia = isset($_POST["donvitinh_gia"]) ? mysql_real_escape_string($_POST["donvitinh_gia"]) : "" ;
            $price = $giathapnhat." _".$giacaonhat." _".$donvitinh_gia;

            $tinhthanh = isset($_POST["tinhthanh"]) ? mysql_real_escape_string($_POST["tinhthanh"]) : "" ;
            $tinhthanh = strip_tags($tinhthanh);
            $phuongthuc_thanhtoan_uutien = isset($_POST["phuongthuc_thanhtoan_uutien"]) ? mysql_real_escape_string($_POST["phuongthuc_thanhtoan_uutien"]) : "" ;
            $phuongthuc_thanhtoan_uutien = strip_tags($phuongthuc_thanhtoan_uutien);

            $khanangcungung1 = isset($_POST["khanangcungung1"]) ? mysql_real_escape_string($_POST["khanangcungung1"]) : "" ;
            $khanangcungung1 = strip_tags($khanangcungung1);
            $donvitinh2 = isset($_POST["donvitinh2"]) ? mysql_real_escape_string($_POST["donvitinh2"]) : "" ;
            $donvitinh2 = strip_tags($donvitinh2);
            $thoigian2 = isset($_POST["thoigian2"]) ? mysql_real_escape_string($_POST["thoigian2"]) : "" ;
            $thoigian2 = strip_tags($thoigian2);
            $khanangcungung = $khanangcungung1. "_".$donvitinh2." _".$thoigian2;

            $thoigianvanchuyen = isset($_POST["thoigianvanchuyen"]) ? mysql_real_escape_string($_POST["thoigianvanchuyen"]) : "" ;
            $thoigianvanchuyen = strip_tags($thoigianvanchuyen);
            $quycachdonggoi = isset($_POST["quycachdonggoi"]) ? mysql_real_escape_string($_POST["quycachdonggoi"]) : "" ;
            $quycachdonggoi = strip_tags($quycachdonggoi);

            $Introtext = isset($_POST["Introtext"]) ? str_replace('script','remove',$_POST["Introtext"]) : "" ;
            
			$Published = 1;
			if(isset($_POST['luunhap'])){
				$Published = 0;
			}
			
            $new_object = $this->db->query("select max(ID) as ID from gianhang_sanpham")->row();
            $new_id = $new_object->ID !='' ? $new_object->ID + 1 : 1 ;
            $data = array(
                'ID'=>$new_id,
                'Title'=>$tensanpham,
                'Price'=>$price,
                'ShopID'=>$this->shop->ID,
                'Published'=> $Published,
                'UserPostID'=>$this->user->ID,
                'CategoriesID'=> $danhmuc,
                'Soluongdonhangtoithieu'=>$soluongdonhangtoithieu,
                'PhuongthucthanhtoanuutienID'=> $phuongthuc_thanhtoan_uutien,
                'Khanangcungung'=>$khanangcungung,
                'Thoigianvanchuyen'=>$thoigianvanchuyen,
                'Introtext'=>$Introtext,
                'Quycachdonggoi'=>$quycachdonggoi,
                'TinhthanhID'=>$tinhthanh,
                'Created'=>$now,
                'LastEdited'=>$now,
                'MetaTitle'=> $tukhoasanpham
            );

            if(isset($_FILES['Images_upload_daidien'])){
                if($_FILES['Images_upload_daidien']['error']==0){
                    $this->upload_to = "userpage_sanpham/".$new_id;
                    $url_files = $this->upload_image_url('Images_upload_daidien');
                    $data['Image_Url'] = $url_files;
                }
            }

            // upload multiimages 
            if(count($_FILES['Images_upload']['tmp_name'])>=1){
				$this->upload_to = "userpage_sanpham_albumanh/".$new_id;
                    $this->UploadMultiImages_sanpham($new_id);
            }

            $active = $this->db->insert("gianhang_sanpham",$data);
            
			// add gianhang_option
			$dactinh= isset($_POST["dactinh"]) ? mysql_real_escape_string($_POST["dactinh"]) : "" ;
			$dactinh_str = "";
			foreach($dactinh as $key => $value){
				if($key % 2 === 0)
					$dactinh_str .= $value." *";
				else
					$dactinh_str .= $value." _";
			}
			$active = $this->db->query("insert into gianhang_option(Title,SanphamID) values('$dactinh_str',$new_id)");
			
			if(isset($_POST['dangbanvathem'])){
				$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
				redirect($link);
			}
			else{
				redirect(base_url()."userpage/danhsachsanpham");
			}
        }
    }

    public function edit_sanpham($id){
        if(is_numeric($id)){
            if (isset($_POST['edit'])) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $now = gmdate("d/m/Y H:i:s", time());
                $now = date('Y-m-d H:i:s');

                $tensanpham = isset($_POST["tensanpham"]) ? mysql_real_escape_string($_POST["tensanpham"]) : "" ;
                $tensanpham = strip_tags($tensanpham);
                $tukhoasanpham = isset($_POST["tukhoasanpham"]) ? mysql_real_escape_string($_POST["tukhoasanpham"]) : "" ;
                $tukhoasanpham = strip_tags($tukhoasanpham);
                $danhmuc = isset($_POST["danhmuc"]) ? mysql_real_escape_string($_POST["danhmuc"]) : "" ;
                $danhmuc = strip_tags($danhmuc);

                $soluongdonhangtoithieu1 = isset($_POST["soluongdonhangtoithieu"]) ? mysql_real_escape_string($_POST["soluongdonhangtoithieu"]) : "" ;
                $soluongdonhangtoithieu1 = strip_tags($soluongdonhangtoithieu1);
                $donvitinh1 = isset($_POST["donvitinh1"]) ? mysql_real_escape_string($_POST["donvitinh1"]) : "" ;
                $donvitinh1 = strip_tags($donvitinh1);
                $soluongdonhangtoithieu = $soluongdonhangtoithieu1." _".$donvitinh1;

                $giathapnhat = isset($_POST["giathapnhat"]) ? mysql_real_escape_string($_POST["giathapnhat"]) : "" ;
                $giathapnhat = strip_tags($giathapnhat);
                $giacaonhat = isset($_POST["giacaonhat"]) ? mysql_real_escape_string($_POST["giacaonhat"]) : "" ;
                $giacaonhat = strip_tags($giacaonhat);
                $donvitinh_gia = isset($_POST["donvitinh_gia"]) ? mysql_real_escape_string($_POST["donvitinh_gia"]) : "" ;
                $price = $giathapnhat." _".$giacaonhat." _".$donvitinh_gia;

                $tinhthanh = isset($_POST["tinhthanh"]) ? mysql_real_escape_string($_POST["tinhthanh"]) : "" ;
                $tinhthanh = strip_tags($tinhthanh);
                $phuongthuc_thanhtoan_uutien = isset($_POST["phuongthuc_thanhtoan_uutien"]) ? mysql_real_escape_string($_POST["phuongthuc_thanhtoan_uutien"]) : "" ;
                $phuongthuc_thanhtoan_uutien = strip_tags($phuongthuc_thanhtoan_uutien);

                $khanangcungung1 = isset($_POST["khanangcungung1"]) ? mysql_real_escape_string($_POST["khanangcungung1"]) : "" ;
                $khanangcungung1 = strip_tags($khanangcungung1);
                $donvitinh2 = isset($_POST["donvitinh2"]) ? mysql_real_escape_string($_POST["donvitinh2"]) : "" ;
                $donvitinh2 = strip_tags($donvitinh2);
                $thoigian2 = isset($_POST["thoigian2"]) ? mysql_real_escape_string($_POST["thoigian2"]) : "" ;
                $thoigian2 = strip_tags($thoigian2);
                $khanangcungung = $khanangcungung1." _".$donvitinh2." _".$thoigian2;

                $thoigianvanchuyen = isset($_POST["thoigianvanchuyen"]) ? mysql_real_escape_string($_POST["thoigianvanchuyen"]) : "" ;
                $thoigianvanchuyen = strip_tags($thoigianvanchuyen);
                $quycachdonggoi = isset($_POST["quycachdonggoi"]) ? mysql_real_escape_string($_POST["quycachdonggoi"]) : "" ;
                $quycachdonggoi = strip_tags($quycachdonggoi);

                $Introtext = isset($_POST["Introtext"]) ? str_replace('script','remove',$_POST["Introtext"]) : "" ;
                
				$MotaNgan = isset($_POST["motangan"]) ? mysql_real_escape_string($_POST["motangan"]) : "" ;
				
                $data = array(
                    'Title'=>$tensanpham,
                    'Price'=>$price,
                    'ShopID'=>$this->shop->ID,
                    'Published'=> 1,
                    'UserPostID'=>$this->user->ID,
                    'CategoriesID'=> $danhmuc,
                    'Soluongdonhangtoithieu'=>$soluongdonhangtoithieu,
                    'PhuongthucthanhtoanuutienID'=> $phuongthuc_thanhtoan_uutien,
                    'Khanangcungung'=>$khanangcungung,
                    'Thoigianvanchuyen'=>$thoigianvanchuyen,
                    'Introtext'=>$Introtext,
                    'Quycachdonggoi'=>$quycachdonggoi,
                    'TinhthanhID'=>$tinhthanh,
					'MotaNgan'=>$MotaNgan,
                    'Created'=>$now,
                    'LastEdited'=>$now,
                    'MetaTitle'=> $tukhoasanpham
                );

                if(isset($_FILES['Images_upload_daidien'])){
                    if($_FILES['Images_upload_daidien']['error']==0){
                        $this->upload_to = "userpage_sanpham/".$id;
                        $url_files = $this->upload_image_url('Images_upload_daidien');
                        $data['Image_Url'] = $url_files;
                    }
                }

                // upload multiimages 
                if(count($_FILES['Images_upload']['tmp_name'])>=1){
					$this->upload_to = "userpage_sanpham_albumanh/".$id;
                    $this->UploadMultiImages_sanpham($id);
                }

                $active2 = $this->db->where("ID",$id);
                $active2 = $this->db->update("gianhang_sanpham",$data);
                	
				// add gianhang_option
				$dactinh= isset($_POST["dactinh"]) ? str_replace('script','remove',$_POST["dactinh"]) : "" ;
				$dactinh_str = "";
				foreach($dactinh as $key => $value){
					if($value == ""){
						$value = "";
					}
					
					if($key % 2 === 0){
						$dactinh_str .= $value."*";
					}else{
						$dactinh_str .= $value."_";
					}
				}
				$gianhang_option_sp = $this->db->query("select * from gianhang_option where SanphamID = $id")->row();
				if(count($gianhang_option_sp) == 0){
					$active = $this->db->query("insert into gianhang_option(Title,SanphamID) value ('$dactinh_str',$id)");
				}
				else{
					$active = $this->db->query("update gianhang_option set Title='$dactinh_str' where SanphamID = $id");
				}
                
				$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
				redirect($link);
            }
        }
    }

    public function danhsachsanpham_search(){
        $this->template->add_title('Tìm kiếm sản phẩm | User Page');
        $key = isset($_POST["key"]) ? mysql_real_escape_string($_POST["key"]) : "" ;
        $key = strip_tags($key);
        $ShopID = $this->shop->ID;
        
        $limit=20;
        $start=isset($_GET['start']) ? $_GET['start'] : 0;
        $temp=$start==0 ? 'limit 0,'.$limit : 'limit '.$start*$limit.','.$limit;
        $data_sanpham = $this->db->query("select * from gianhang_sanpham where ShopID = $ShopID AND Title like '%$key%' $temp")->result();
        $total = $this->db->query("select count(*) as tong from gianhang_sanpham where ShopID = $ShopID AND Title like '%$key%'")->row();
        $data = array(
            'key'=>$key,
            'data_sanpham' => $data_sanpham,
            'nav'=>$this->lib->get_data_phantrang_link($total->tong,'',$limit,3)
        );
        
        $this->template->write_view('content','qlsp_danhsachsanpham',$data); 
        $this->template->render();
    }
	
	public function update_list_product(){
		$ShopID = $this->shop->ID;
		if (isset($_POST['xoa'])) 
		{
			if (isset($_POST['sanpham_check'])) 
			{
				$check = $_POST['sanpham_check'];
				foreach ($check as $check=>$value) {
					 $active = $this->db->query("delete from gianhang_sanpham where ID=$value AND ShopID=$ShopID");
				}
			}
		}
		else if (isset($_POST['ngungban'])) 
		{
			if (isset($_POST['sanpham_check'])) 
			{	
				echo "132456";
				return;
				$check = $_POST['sanpham_check'];
				foreach ($check as $check=>$value) {
					 $active = $this->db->query("update gianhang_sanpham set Published = 0 WHERE ID=$value AND ShopID=$ShopID");
				}
			}
		}
		else if(isset($_POST['tieptucban'])) 
		{
			if (isset($_POST['sanpham_check'])) 
			{
				$check = $_POST['sanpham_check'];
				foreach ($check as $check=>$value) {
					 $active = $this->db->query("update gianhang_sanpham set Published = 1 WHERE ID=$value AND ShopID=$ShopID");
				}
			}
		}
		$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
		redirect($link);

	}
	
	
	public function update_nhom_sanpham(){
		$ShopID = $this->shop->ID;
		if (isset($_POST['xoa'])) 
		{
			if (isset($_POST['sanpham_check'])) 
			{
				$check = $_POST['sanpham_check'];
				foreach ($check as $check=>$value) {
					 $active = $this->db->query("update gianhang_sanpham set NhomID = 0 WHERE ID=$value AND ShopID=$ShopID");
				}
				$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
				redirect($link);
			}
		}
		
		if (isset($_POST['ngungban'])) 
		{
			if (isset($_POST['sanpham_check'])) 
			{
				$check = $_POST['sanpham_check'];
				foreach ($check as $check=>$value) {
					 $active = $this->db->query("update gianhang_sanpham set Published = 0 WHERE ID=$value AND ShopID=$ShopID");
				}
				$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
				redirect($link);
			}
		}
		
		if (isset($_POST['tieptucban'])) 
		{
			if (isset($_POST['sanpham_check'])) 
			{
				$check = $_POST['sanpham_check'];
				foreach ($check as $check=>$value) {
					 $active = $this->db->query("update gianhang_sanpham set Published = 1 WHERE ID=$value AND ShopID=$ShopID");
				}
				$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
				redirect($link);
			}
		}
	}
	
	public function ngungban_sanpham_x(){
		$ShopID = $this->shop->ID;
		$id = isset($_POST["ID"]) ? $_POST["ID"] : "" ;
		$id = explode(",",$id);
		foreach($id as $row){
			$row = mysql_real_escape_string(strip_tags($row));
			if($row){
				$active = $this->db->query("update gianhang_sanpham set Published = 0 WHERE ID=$row AND ShopID=$ShopID");
			}
		}
		echo "true";
	}
	
	public function tieptucban_sanpham_x(){
		$ShopID = $this->shop->ID;
		$id = isset($_POST["ID"]) ? $_POST["ID"] : "" ;
		$id = explode(",",$id);
		foreach($id as $row){
			$row = mysql_real_escape_string(strip_tags($row));
			if($row){
				$active = $this->db->query("update gianhang_sanpham set Published = 1 WHERE ID=$row AND ShopID=$ShopID");
			}
		}
		echo "true";
	}
	
	public function xoaxoa_sanpham_x(){
		$ShopID = $this->shop->ID;
		$id = isset($_POST["ID"]) ? $_POST["ID"] : "" ;
		$id = explode(",",$id);
		foreach($id as $row){
			$row = mysql_real_escape_string(strip_tags($row));
			if($row){
				$data_sanpham_images = $this->db->query("select * from gianhang_sanpham_images where SanphamID=$row")->result();
				foreach($data_sanpham_images as $row){
					$id_image = $row->ImageID;
					$this->delete_file_by_id_file($id_image,"files");
					$this->db->query("delete from gianhang_sanpham_images where SanphamID=$row");
				}
				$this->db->query("delete from gianhang_sanpham_images where SanphamID=$row");
				$this->db->query("delete from gianhang_option where SanphamID=$row");
				
				$sp = $this->db->query("delete from gianhang_sanpham where ID=$row AND ShopID=$ShopID")->row();
				
				$active = $this->db->query("delete from gianhang_sanpham where ID=$row AND ShopID=$ShopID");
				echo "true";
			}
		}
		echo "true";
	}
	
	public function xoa_sanpham_x(){
		$ShopID = $this->shop->ID;
		$id = isset($_POST["ID"]) ? $_POST["ID"] : "" ;
        $id = strip_tags($id);
		if($id){
			$data_sanpham_images = $this->db->query("select * from gianhang_sanpham_images where SanphamID=$id")->result();
			foreach($data_sanpham_images as $row){
				$id_image = $row->ImageID;
				$this->delete_file_by_id_file($id_image,"files");
				$this->db->query("delete from gianhang_sanpham_images where SanphamID=$id");
			}
			$this->db->query("delete from gianhang_sanpham_images where SanphamID=$id");
			$this->db->query("delete from gianhang_option where SanphamID=$id");
			
			$sp = $this->db->query("delete from gianhang_sanpham where ID=$id AND ShopID=$ShopID")->row();
			
			$active = $this->db->query("delete from gianhang_sanpham where ID=$id AND ShopID=$ShopID");
			echo "true";
		}

	}

    /*  
    *******************************
    *                             *
    * Chi tiết sản phẩm           *
    *                             *
    *******************************
    */
    public function chitietsanpham($id){
		$ShopID = $this->shop->ID;
        if(isset($id) && is_numeric($id)){
            $this->template->add_title('Chi tiết sản phẩm | User Page');
            $data_sanpham = $this->db->query("select * from gianhang_sanpham where ShopID = $ShopID AND ID = $id")->row();
            $data = array(
                'data_sanpham'=> $data_sanpham
            );
            $this->template->write_view('content','qlsp_chitietsanpham',$data); 
            $this->template->render();
        }
    }


    /*  
    *******************************
    *                             *
    * Phân nhóm sản phẩm          *
    *                             *
    *******************************
    */

    public function phannhomsanpham(){
        $this->template->add_title('Phân nhóm sản phẩm | User Page');
       
		$ShopID = $this->shop->ID;
		$dataNhomdanhmuc = $this->db->query("select * from gianhang_nhom_danhmuc where ShopID = $ShopID AND ParentID=0")->result();
		$data = array(
			'data_danhmuc'=>$dataNhomdanhmuc
		);
		$this->template->write_view('content','qlsp_phannhomsanpham',$data); 
        $this->template->render();
    }
	
	public function update_themnhom_sanpham($id){
		$ShopID = $this->shop->ID;
		if (isset($_POST['themvaonhom']) && is_numeric($id)) 
		{
			if (isset($_POST['sanpham_check'])) 
			{
				$check = $_POST['sanpham_check'];
				foreach ($check as $check=>$value) {
					echo $id;
					 $active = $this->db->query("update gianhang_sanpham set NhomID = $id  WHERE ID=$value AND ShopID=$ShopID");
				}
				$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
				redirect($link);
				
			}
			else{
				$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
				redirect($link);
			}
		}
		else{
			$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
			redirect($link);
		}
	}
	
	public function themnhomsanpham(){
		
		$new_object = $this->db->query("select max(ID) as ID from gianhang_nhom_danhmuc")->row();
        $new_id = $new_object->ID !='' ? $new_object->ID + 1 : 1 ;
		
		$tennhom = isset($_POST["tennhommoi"]) ? $_POST["tennhommoi"] : "" ;
        $tennhom = strip_tags($tennhom);
		$ParentID = isset($_POST["danhmuccha"]) ? mysql_real_escape_string($_POST["danhmuccha"]) : "" ;
        $ParentID = strip_tags($ParentID);
		$MetaTitle = isset($_POST["metatitle"]) ? mysql_real_escape_string($_POST["metatitle"]) : "" ;
        $MetaTitle = strip_tags($MetaTitle);
		$MetaKeywords = isset($_POST["metakeywords"]) ? mysql_real_escape_string($_POST["metakeywords"]) : "" ;
        $MetaKeywords = strip_tags($MetaKeywords);
		$MetaDescription = isset($_POST["metadescription"]) ? mysql_real_escape_string($_POST["metadescription"]) : "" ;
        $MetaDescription = strip_tags($MetaDescription);
		if($ParentID == 0){
			$Path = "0/".$new_id;
		}
		else{
			$Parent = $this->db->query("select Path from gianhang_nhom_danhmuc where ID= ".$ParentID."")->row();
			$Path = $Parent->Path."/".$new_id;
		}
		
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$now = gmdate("d/m/Y H:i:s", time());
		$now = date('Y-m-d H:i:s');
		

		$data = array(
			'ID'=>$new_id,
			'Title'=>$tennhom,
			'ParentID'=>$ParentID,
			'Path'=>$Path,
			'MetaTitle'=>$MetaTitle,
			'MetaKeywords'=>$MetaKeywords,
			'MetaDescription'=>$MetaDescription,
			'Published'=>1,
			'ShopID'=>$this->shop->ID,
			'LastEdited'=>$now,
			'Created'=>$now
		);
		$active = $this->db->insert("gianhang_nhom_danhmuc",$data);

		if($active){
			$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
			redirect($link);
		}
	}
	
	public function themnhomsanpham2(){
		
		$new_object = $this->db->query("select max(ID) as ID from gianhang_nhom_danhmuc")->row();
        $new_id = $new_object->ID !='' ? $new_object->ID + 1 : 1 ;
		
		$tennhom = isset($_POST["tennhommoi"]) ? $_POST["tennhommoi"] : "" ;
        $tennhom = strip_tags($tennhom);
		$ParentID = isset($_POST["ParentID"]) ? mysql_real_escape_string($_POST["ParentID"]) : "" ;
        $ParentID = strip_tags($ParentID);
		$MetaTitle = isset($_POST["metatitle"]) ? mysql_real_escape_string($_POST["metatitle"]) : "" ;
        $MetaTitle = strip_tags($MetaTitle);
		$MetaKeywords = isset($_POST["metakeywords"]) ? mysql_real_escape_string($_POST["metakeywords"]) : "" ;
        $MetaKeywords = strip_tags($MetaKeywords);
		$MetaDescription = isset($_POST["metadescription"]) ? mysql_real_escape_string($_POST["metadescription"]) : "" ;
        $MetaDescription = strip_tags($MetaDescription);
		if($ParentID == 0){
			$Path = "0/".$new_id;
		}
		else{
			$Parent = $this->db->query("select Path from gianhang_nhom_danhmuc where ID= ".$ParentID."")->row();
			$Path = $Parent->Path."/".$new_id;
		}
		
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$now = gmdate("d/m/Y H:i:s", time());
		$now = date('Y-m-d H:i:s');
		

		$data = array(
			'ID'=>$new_id,
			'Title'=>$tennhom,
			'ParentID'=>$ParentID,
			'Path'=>$Path,
			'MetaTitle'=>$MetaTitle,
			'MetaKeywords'=>$MetaKeywords,
			'MetaDescription'=>$MetaDescription,
			'Published'=>1,
			'ShopID'=>$this->shop->ID,
			'LastEdited'=>$now,
			'Created'=>$now
		);
		$active = $this->db->insert("gianhang_nhom_danhmuc",$data);

		if($active){
			$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
			redirect($link);
		}
	}
	
	public function show_nhomphu(){
		$ID = isset($_POST["ID"]) ? mysql_real_escape_string($_POST["ID"]) : "" ;
        $ID = strip_tags($ID);
		if($ID){
			$Parent = $this->db->query("select * from gianhang_nhom_danhmuc where ID= ".$ID."")->row();
			$Child = $this->db->query("select * from gianhang_nhom_danhmuc where ParentID= ".$ID."")->result();
			$str_Path = str_replace("/",",","$Parent->Path");
			$listChild = "";
			
			$count = $this->db->query("select count(*) as sum from gianhang_sanpham where NhomID = $ID")->row();
			$sum_product = $count->sum;
			foreach($Child as $row){
				$CountProduct = $this->db->query("select count(*) as sum from gianhang_sanpham where NhomID = $row->ID")->row();
				$sum_product += $CountProduct->sum;
			}
			
			if(count($Child)>0){
				foreach($Child as $row){
					$Child2 = $this->db->query("select * from gianhang_nhom_danhmuc where ParentID= ".$row->ID."")->result();
					$listChild .= "<div class='row2'><a href=''>".$row->Title." (".count($Child2).")</a></div>";
				}
			}
			
			$str =
			"
			<div class='title2'>".$Parent->Title."</div>
			<div class='content2'>
				<div class='row'>".count($Child)." nhóm phụ</div>
				<div class='row'>".$sum_product." sản phẩm</div>
			</div>
			<div class='title3'>Nhóm phụ (".count($Child).")</div>
			<div class='content2'>
				".$listChild."
			</div>
			<div class='title4'>Ngày tạo: ".date("d/m/Y",strtotime($Parent->Created))."</div>";
			echo $str;
		}
		
		
	}
	
	public function show_form_doiten(){
		$ID = isset($_POST["ID"]) ? mysql_real_escape_string($_POST["ID"]) : "" ;
        $ID = strip_tags($ID);
		if($ID){
			$Parent = $this->db->query("select * from gianhang_nhom_danhmuc where ID= ".$ID."")->row();
			$str =
			"
			<div class='row'>
				<span>Tên nhóm cũ:</span><input type='text' class='tennhomcu' name='tennhomcu' value='".$Parent->Title."' readonly/><input type='hidden' name='id' value='".$Parent->ID."' />
			</div>
			<div class='row'>
				<span>Tên nhóm mới:</span><input type='text' class='tennhomcu' name='tennhommoi' required/>
			</div>
			<div class='row'>
				<input type='submit' class='themnhommoi' value='Đổi tên'/>
			</div>";
			echo $str;
		}
	}
	
	public function doiten_nhom_danhmuc(){
		$id = isset($_POST["id"]) ? $_POST["id"] : "" ;
        $id = strip_tags($id);
		
		$tennhom = isset($_POST["tennhommoi"]) ? $_POST["tennhommoi"] : "" ;
        $tennhom = strip_tags($tennhom);

		$data = array(
			'Title'=>$tennhom
		);
		$active = $this->db->where("ID",$id);
        $active = $this->db->update("gianhang_nhom_danhmuc",$data);

		if($active){
			$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "userpage" ;
			redirect($link);
		}
	}
	
	public function xoa_nhom_danhmuc(){
		$id = isset($_POST["ID"]) ? $_POST["ID"] : "" ;
        $id = strip_tags($id);
		if($id){
			$active = $this->db->query("delete from gianhang_nhom_danhmuc where ID=$id");
			echo "true";
		}

	}
	
	
	
    public function phannhomphu($id){
		if(isset($id) && is_numeric($id)){
			$this->template->add_title('Phân nhóm sản phẩm | User Page');
			$ShopID = $this->shop->ID;
			$dataNhomdanhmuc = $this->db->query("select * from gianhang_nhom_danhmuc where ShopID = $ShopID AND ParentID=$id")->result();
			$Parent = $this->db->query("select * from gianhang_nhom_danhmuc where ShopID = $ShopID AND ID=$id")->row();
			$data_sanpham_nhom = $this->db->query("select * from gianhang_sanpham where ShopID = $ShopID AND NhomID=$Parent->ID")->result();
			$data_sanpham = $this->db->query("select * from gianhang_sanpham where ShopID = $ShopID AND NhomID not in ($Parent->ID)")->result();
			if(count($Parent)>0){
				$ParentID = $Parent->ParentID;
			}
			else{
				$ParentID = 0;
			}
			
			$data = array(
				'ParentID'=>$ParentID,
				'ParentTitle'=>$Parent->Title,
				'id'=>$id,
				'data_danhmuc'=>$dataNhomdanhmuc,
				'data_sanpham'=>$data_sanpham,
				'data_sanpham_nhom'=>$data_sanpham_nhom
			);
			
			if(count($dataNhomdanhmuc) > 0){
				$this->template->write_view('content','qlsp_phannhomphu',$data); 
				$this->template->render();
			}
			else{
				$this->template->write_view('content','qlsp_sanphamnhomphu',$data); 
				$this->template->render();
			}
			
		}
    }

    /*  
    *******************************
    *                             *
    * Đăng bán sản phẩm           *
    *                             *
    *******************************
    */
    public function dangbansanpham(){
        $this->template->add_title('Phân nhóm sản phẩm | User Page');
        $this->template->write_view('content','qlsp_dangbansanpham'); 
        $this->template->render();
    }
	
	public function showdanhmuc_child(){
        $id = isset($_POST["id"]) ? mysql_real_escape_string($_POST["id"]) : "" ;
        $id = strip_tags($id);
		if(isset($id)){
			/* LIST DANH MỤC */
			$site_categories = $this->db->query("select * from site_categories where ParentID = $id")->result();
			if(count($site_categories)>0){
				$list_danhmuc = "";
				foreach($site_categories as $row){
					$list_danhmuc .= "<li><span style='display:none'>$row->ID</span>$row->Title</li>";
				}
				echo $list_danhmuc;
			}
			else{
				echo "last";
			}
		}
    }
	
	
	public function showdanhmuc_goiy(){
        $id = isset($_POST["id"]) ? mysql_real_escape_string($_POST["id"]) : "" ;
        $id = strip_tags($id);
		if(isset($id)){
			/* LIST DANH MỤC */
			if($id == ""){
				$site_categories = $this->db->query("select * from site_categories where Title like '%$id%' AND ParentID=0")->result();
			}
			else{
				$site_categories = $this->db->query("select * from site_categories where Title like '%$id%'")->result();
			}
			if(count($site_categories)>0){
				$list_danhmuc = "";
				foreach($site_categories as $row){
					$list_danhmuc .= "<li><span style='display:none'>$row->ID</span>$row->Title</li>";
				}
				echo $list_danhmuc;
			}
		}
    }
	
	public function showdanhmuc_tatcadanhmuc(){
        $id = isset($_POST["id"]) ? mysql_real_escape_string($_POST["id"]) : "" ;
        $id = strip_tags($id);
		if(isset($id)){
			/* LIST DANH MỤC */
			$site_categories = $this->db->query("select * from site_categories where ParentID = $id")->result();
			if(count($site_categories)>0){
				$list_danhmuc = "";
				foreach($site_categories as $row){
					$list_danhmuc .= "<li><span style='display:none'>$row->ID</span>$row->Title</li>";
				}
				echo $list_danhmuc;
			}
		}
    }
	
	public function showdanhmuc_danhmucganday(){
		$ShopID = $this->shop->ID;
        $id = isset($_POST["id"]) ? mysql_real_escape_string($_POST["id"]) : "" ;
        $id = strip_tags($id);
		if(isset($id)){
			/* LIST DANH MỤC */
			$site_categories = $this->db->query("select a.ID as ID,a.Title as Title from site_categories a,gianhang_sanpham b where b.CategoriesID = a.ID AND b.ShopID = $ShopID GROUP BY a.ID")->result();
			if(count($site_categories)>0){
				$list_danhmuc = "";
				foreach($site_categories as $row){
					$list_danhmuc .= "<li><span style='display:none'>$row->ID</span>$row->Title</li>";
				}
				echo $list_danhmuc;
			}
		}
    }
	
	public function showdanhmuc_pre(){
        $id = isset($_POST["id"]) ? mysql_real_escape_string($_POST["id"]) : "" ;
        $id = strip_tags($id);
		if(isset($id)){
			/* LIST DANH MỤC */
			$categories = $this->db->query("select * from site_categories where ID = $id")->row();
			if(count($categories)>0){
				$categories2 = $this->db->query("select * from site_categories where ID = $categories->ID")->row();
				if(count($categories2)>0){
					$site_categories = $this->db->query("select * from site_categories where ParentID = $categories2->ParentID")->result();
					if(count($site_categories)>0){
						$list_danhmuc = "<div class='top'>
											<div class='pre_categories' id='$categories->ParentID'><i class='fa fa-chevron-left'></i></div>
											<div class='tatcadanhmuc'>Tất cả danh mục</div>
											<div class='danhmucgoiy'>Danh mục gợi ý</div>
											<div class='danhmucdachonganday'>Danh mục đã chọn gần đây</div>
										</div>
										<div class='block'>
										<ul>
											<div class=''></div>";
						foreach($site_categories as $row){
							$list_danhmuc .= "<li><span style='display:none'>$row->ID</span>$row->Title</li>";
						}
						$list_danhmuc .= "</ul>
									</div><!-- end .block -->
									<div class='footer'>
									</div>";
						echo $list_danhmuc;
					}
					else{
						echo "last";
					}
				}
				else{
					echo "last";
				}
			}
			else{
				echo "last";
			}
		}
    }
	
    /*  
    *******************************
    *                             *
    * XÓA HÌNH ẢNH                *
    *                             *
    *******************************
    */

    public function delete_images(){
        $id = isset($_POST["id"]) ? mysql_real_escape_string($_POST["id"]) : "" ;
        $id = strip_tags($id);
        $this->delete_file_by_id_file($id,'files');
        echo "true";
    }


}
?>