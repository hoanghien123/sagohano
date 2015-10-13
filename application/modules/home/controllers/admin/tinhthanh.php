<?php 
class Tinhthanh extends Admin_Controller { 
 
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

    public $limit = 50;
	
	public function index(){
		$page = $this->uri->segment(5);
		$start = is_numeric($page) ? $page : 0 ;
        if(!is_numeric($start)) $start=0;
        $limit_str = "limit $start,$this->limit";
		$this->template->add_title('Danh sách tỉnh thành');
		$nav = $this->db->query("select count(*) as nav from tinhthanh")->row();
        $nav = $nav ? $nav->nav : 0 ;
		$data=array(
			'data'=>$this->db->query("select * from tinhthanh order by Title ASC $limit_str")->result(),
			'start'=>$start,
            'nav'=>$this->lib->nav(base_url().'admin/home/tinhthanh/index',5,$nav,$this->limit)
		);
		$this->template->write_view('content','admin/tinhthanh_home',$data); 
		$this->template->render();
	}
	
	public function add_tinhthanh(){
		$this->template->add_title('Thêm Tỉnh Thành'); 
		$this->template->write_view('content','admin/tinhthanh_add_new');
		$this->template->render();
	}
	
	public function tinhthanh_add_new(){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$accept = array('Title','ParentID');
		if(!isset($_POST)) return;
		if(count($_POST)!= count($accept)) return;
		$new_object = $this->db->query("select max(ID) as ID from tinhthanh")->row();
		$new_id = $new_object->ID !='' ? $new_object->ID + 1 : 1 ;
		$parent = $this->security->xss_clean($this->input->post('ParentID'));
		$parent = is_numeric($parent) ? $parent : 0 ;
		$Path = '0';
		$Parent_Object = $this->db->query("select Path from tinhthanh where ID=$parent")->row();
		if($Parent_Object){
			$Path = $Parent_Object->Path;
		}
		$data = array(
			'ID'=>$new_id,
			'Path'=>$Path.'/'.$new_id,
			'ParentID'=>$parent,
			'Title'=>$this->security->xss_clean($this->input->post('Title')),
			'Created'=>date('Y-m-d H:i:m',time()),
			'LastEdited'=>date('Y-m-d H:i:m',time())
		);
		$this->db->insert('tinhthanh', $data);
		redirect('admin/home/tinhthanh');
	}
	
	public function tinhthanh_update(){
		$accept = array('ID','Title','ParentID');
		if(!isset($_POST)) return;
		if(count($_POST)!= count($accept)) return;
		$ID = $this->security->xss_clean($this->input->post('ID'));
		if(!is_numeric($ID)) return ;
		$parent = $this->security->xss_clean($this->input->post('ParentID'));
		$parent = is_numeric($parent) ? $parent : 0 ;
		$Path = '0';
		$Parent_Object = $this->db->query("select Path from tinhthanh where ID=$parent")->row();
		if($Parent_Object){
			$Path = $Parent_Object->Path;
		}
		$data = array(
			'Path'=>$Path.'/'.$ID,
			'ParentID'=>$parent,
			'Title'=>$this->security->xss_clean($this->input->post('Title')),
			'Created'=>date('Y-m-d H:i:m',time()),
			'LastEdited'=>date('Y-m-d H:i:m',time())
		);
		$this->db->where("ID",$ID);
        $this->db->update("tinhthanh",$data);
        redirect('admin/home/tinhthanh');
	}
	
	public function delete_tinhthanh($id){
		if(isset($id)){
			if(is_numeric($id)){
				$this->db->query("delete from tinhthanh where ID=$id");
			}
		}
		redirect('admin/home/tinhthanh');
	}
	
	public function edit_tinhthanh($id){
		if(isset($id)){
			if(is_numeric($id)){
				$this->template->add_title('Chỉnh sửa thông tin'); 
				$object = $this->db->query("select * from tinhthanh where ID = $id")->row();
				if(!$object) return;
				$data = array(
					'data'=>$object
				);
				$this->template->write_view('content','admin/tinhthanh_edit',$data); 
				$this->template->render();
				return;
			}
		}
		redirect('admin');
	}
	
	
	public function search_tinhthanh(){
		if(isset($_POST['keyword'])){
			$keyword = $_POST['keyword'];
			$str = "select * from tinhthanh";
			$str = $keyword != '' ? $str." where Title like '%".urldecode($keyword)."%'" : $str ;
			$this->template->add_title('List Account');
			$data=array(
				'data'=>$this->db->query($str)->result()
			);
			$this->template->write_view('content','admin/tinhthanh_home',$data); 
			$this->template->render();
		}
	}
	
}
?>