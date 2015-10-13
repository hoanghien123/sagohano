<?php 
class Categories extends Admin_Controller { 
 
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
		$this->template->add_title('Danh sách danh mục sản phẩm');
		$nav = $this->db->query("select count(*) as nav from site_categories")->row();
        $nav = $nav ? $nav->nav : 0 ;
		$data=array(
			'data'=>$this->db->query("select * from site_categories order by ParentID ASC $limit_str")->result(),
			'start'=>$start,
            'nav'=>$this->lib->nav(base_url().'admin/site/categories/index',5,$nav,$this->limit)
		);
		$this->template->write_view('content','admin/categories_home',$data); 
		$this->template->render();
	}
	
	public function add_categories(){
		$this->template->add_title('Thêm danh mục sản phẩm'); 
		$this->template->write_view('content','admin/categories_add_new');
		$this->template->render();
	}
	
	public function categories_add_new(){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$accept = array('Title','ParentID','MetaTitle','MetaKeywords','MetaDescription','Published');
		if(!isset($_POST)) return;
		if(count($_POST)!= count($accept)) return;
		$new_object = $this->db->query("select max(ID) as ID from site_categories")->row();
		$new_id = $new_object->ID !='' ? $new_object->ID + 1 : 1 ;
		$parent = mysql_real_escape_string($this->input->post('ParentID'));
		$parent = is_numeric($parent) ? $parent : 0 ;
		$Path = '0';
		$Parent_Object = $this->db->query("select Path from site_categories where ID=$parent")->row();
		if($Parent_Object){
			$Path = $Parent_Object->Path;
		}
		$data = array(
			'ID'=>$new_id,
			'Path'=>$Path.'/'.$new_id,
			'ParentID'=>$parent,
			'Title'=>mysql_real_escape_string($this->input->post('Title')),
			'MetaTitle'=>mysql_real_escape_string($this->input->post('MetaTitle')),
			'MetaKeywords'=>mysql_real_escape_string($this->input->post('MetaKeywords')),
			'MetaDescription'=>mysql_real_escape_string($this->input->post('MetaDescription')),
			'Published'=>mysql_real_escape_string($this->input->post('Published'))
		);
		$this->db->insert('site_categories', $data);
		redirect('admin/site/categories');
	}
	
	public function categories_update(){
		$accept = array('ID','Title','ParentID','MetaTitle','MetaKeywords','MetaDescription','Published');
		if(!isset($_POST)) return;
		if(count($_POST)!= count($accept)) return;
		$ID = $this->security->xss_clean($this->input->post('ID'));
		if(!is_numeric($ID)) return ;
		$parent = $this->security->xss_clean($this->input->post('ParentID'));
		$parent = is_numeric($parent) ? $parent : 0 ;
		$Path = '0';
		$Parent_Object = $this->db->query("select Path from site_categories where ID=$parent")->row();
		if($Parent_Object){
			$Path = $Parent_Object->Path;
		}
		$data = array(
			'Path'=>$Path.'/'.$ID,
			'ParentID'=>$parent,
			'Title'=>mysql_real_escape_string($this->input->post('Title')),
			'MetaTitle'=>mysql_real_escape_string($this->input->post('MetaTitle')),
			'MetaKeywords'=>mysql_real_escape_string($this->input->post('MetaKeywords')),
			'MetaDescription'=>mysql_real_escape_string($this->input->post('MetaDescription')),
			'Published'=>mysql_real_escape_string($this->input->post('Published'))
		);
		$this->db->where("ID",$ID);
        $this->db->update("site_categories",$data);
        redirect('admin/site/categories');
	}
	
	public function delete_categories($id){
		if(isset($id)){
			if(is_numeric($id)){
				$this->db->query("delete from site_categories where ID=$id");
			}
		}
		redirect('admin/site/categories');
	}
	
	public function edit_categories($id){
		if(isset($id)){
			if(is_numeric($id)){
				$this->template->add_title('Chỉnh sửa thông tin'); 
				$object = $this->db->query("select * from site_categories where ID = $id")->row();
				if(!$object) return;
				$data = array(
					'data'=>$object
				);
				$this->template->write_view('content','admin/categories_edit',$data); 
				$this->template->render();
				return;
			}
		}
		redirect('admin');
	}
	
	
	public function search_categories(){
		if(isset($_POST['keyword'])){
			$keyword = $_POST['keyword'];
			$str = "select * from site_categories";
			$str = $keyword != '' ? $str." where Title like '%".urldecode($keyword)."%'" : $str ;
			$this->template->add_title('Tìm kiếm danh mục');
			$data=array(
				'data'=>$this->db->query($str)->result()
			);
			$this->template->write_view('content','admin/categories_home',$data); 
			$this->template->render();
		}
	}
	
}
?>