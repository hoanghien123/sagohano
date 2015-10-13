<?php 
class Home extends Admin_Controller { 
 
    public function __construct() { 
        parent::__construct();   
        // Load library template 
        $this->load->library('template'); 
        // Set template 
        $this->template->set_template('admin');  
 
        // Add CSS and JS 
        $this->template->add_css('public/admin/css/style.css'); 
        $this->template->add_js('public/admin/js/jquery-1.7.2.min.js');
		$this->template->add_js('public/admin/js/script_admin.js');
        // Add DocType 
        $this->template->add_doctype(); 
    }

    public $limit = 30;
	
	public function index(){
		$this->template->add_title('Setting');
		$data=array(
			'data'=>''
		);
		$this->template->write_view('content','admin/home',$data); 
		$this->template->render();
	}

	public function account(){
		$page = $this->uri->segment(5);
		$start = is_numeric($page) ? $page : 0 ;
        if(!is_numeric($start)) $start=0;
        $limit_str = "limit $start,$this->limit";
		$this->template->add_title('Administrator Account');
		$nav = $this->db->query("select count(*) as nav from authentication")->row();
        $nav = $nav ? $nav->nav : 0 ;
		$data=array(
			'data'=>$this->db->query("select * from authentication order by ID ASC $limit_str")->result(),
			'limit'=>$this->limit,
            'nav'=>$this->lib->nav(base_url().'admin/home/home/account',5,$nav,$this->limit)
		);
		$this->template->write_view('content','admin/account_home',$data); 
		$this->template->render();
	}
	
	public function add_account(){
		$this->template->add_title('Add Administrator Account'); 
		$this->template->write_view('content','admin/account_add_new');
		$this->template->render();
	}
	
	public function account_add_new(){
		$accept = array('Username','Password','Published');
		if(!isset($_POST)) return;
		if(count($_POST)!= count($accept)) return;
		$data = array(
			'UserName'=>mysql_real_escape_string($_POST['Username']),
			'PassWord'=>mysql_real_escape_string($_POST['Password']),
			'Published'=>mysql_real_escape_string($_POST['Published'])
		);
		if($data['UserName']!='' && $data['PassWord']){
			$this->db->insert('authentication', $data);
		}
		redirect('admin/home/home/account');
	}
	
	public function account_update(){
		$accept = array('ID','Username','Password','Published');
		if(!isset($_POST)) return;
		if(count($_POST)!= count($accept)) return;
		$ID = $this->security->xss_clean($this->input->post('ID'));
		if(!is_numeric($ID)) return ;
		$data = array(
			'UserName'=>mysql_real_escape_string($_POST['Username']),
			'PassWord'=>mysql_real_escape_string($_POST['Password']),
			'Published'=>mysql_real_escape_string($_POST['Published'])
		);
		
		$this->db->where("ID",$ID);
        $this->db->update("authentication",$data);
        redirect('admin/home/home/account');
	}
	
	public function delete_account($id){
		if(isset($id)){
			if(is_numeric($id)){
				$this->db->query("delete from authentication where ID=$id");
			}
		}
		redirect('admin/home/home/account');
	}
	
	public function edit_account($id){
		if(isset($id)){
			if(is_numeric($id)){
				$this->template->add_title('Chỉnh sửa thông tin'); 
				$object = $this->db->query("select * from authentication where ID = $id")->row();
				if(!$object) return;
				$data = array(
					'data'=>$object
				);
				$this->template->write_view('content','admin/account_edit',$data); 
				$this->template->render();
				return;
			}
		}
		redirect('admin');
	}
	
	
	public function search_account(){
		if(isset($_POST['keyword'])){
			$keyword = $_POST['keyword'];
			$str = "select * from authentication";
			$str = $keyword != '' ? $str." where UserName like '%".urldecode($keyword)."%'" : $str ;
			$this->template->add_title('List Account');
			$data=array(
				'data'=>$this->db->query($str)->result()
			);
			$this->template->write_view('content','admin/account_home',$data); 
			$this->template->render();
		}
	}
	
}
?>