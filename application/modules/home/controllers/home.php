<?php 
class Home extends CI_Controller { 
    public function __construct() { 
        parent::__construct();
		// Load library template 
        $this->load->library('template'); 
        // Set template 
        $this->template->set_template('site');
	}
	
	public function index()
    {
		/*
		$page = $this->db->query("select * from sitetree where ClassName='HomePage'")->row();
		if(!$page) return;
        $this->template->add_title($page->MetaTitle);
		$this->template->write('MetaKeywords',$page->MetaKeywords);
		$this->template->write('MetaDescription',$page->MetaDescription);
		$this->template->write_view('content','home'); 
		$this->template->render();
		*/
		$this->template->add_title('Shagohano | Home Page');
		$this->template->write('MetaKeywords','');
		$this->template->write('MetaDescription','');
		$this->template->write_view('content','home'); 
		$this->template->render();
    }
}
?>