<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{
	public $upload_to = '';
	public $folder_path_upload_image = "";
    public $folder_url_upload_image = "";
    
    
    function __construct()
    {
        parent::__construct(); 
        //Lấy đường dẫn url của thư mục chứa hình ảnh được upload
        $this->folder_url_upload_image = base_url()."assets/";
        //Lấy đường dẫn vật lý của thư mục chứa hình ảnh đươc upload
        $this->folder_path_upload_image = "./assets/";
		$user = $this->session->userdata('admin');
		if($user==''){
			redirect('admin/login');
		}
    }
    
    // Hàm tạo folder
    public function make_folder($str,$folder='assets/'){
    	if($str!=''){
	        if(!file_exists($folder.$str)){
		        mkdir("./$folder".$str, 0777, true);
	        }
    	}
    }

    
    // upload image
    public function upload_image($table_file='files'){
	    $this->make_folder($this->upload_to,'assets/');
        $config = array('upload_path'   => $this->folder_path_upload_image.$this->upload_to,
                        'allowed_types' => 'gif|jpg|png',
                        'max_size'      => '2000',
                        'encrypt_name' => TRUE
                        );
        $this->load->library("upload",$config);
        if(!$this->upload->do_upload("Image_upload")){
            $error = array($this->upload->display_errors());
			return false;
        }else{
            $image_data = $this->upload->data();
        }
		$this->db->select_max('ID');
        $query = $this->db->get("$table_file")->row_array();
        $data = array(
            'FileName'=>$image_data['file_name'],
            'Path'=>"assets/".$this->upload_to.'/'.$image_data['file_name'],
            'ID'=>$query['ID']+1
        );
        $this->db->insert($table_file, $data);
        $this->created_thumb_image("assets/".$this->upload_to.'/'.$image_data['file_name'],200,200,$table_file);
        $this->resize_image("assets/".$this->upload_to.'/'.$image_data['file_name'],600,600);
        return $query['ID']+1;
    }


    // upload image
    public function upload_image_url($update='Image_upload'){
        $this->make_folder($this->upload_to,'assets/');
        $config = array('upload_path'   => $this->folder_path_upload_image.$this->upload_to,
                        'allowed_types' => 'gif|jpg|png',
                        'max_size'      => '2000',
                        'encrypt_name' => TRUE
                        );
        $this->load->library("upload",$config);
        if(!$this->upload->do_upload($update)){
            $error = array($this->upload->display_errors());
            return false;
        }else{
            $image_data = $this->upload->data();
        }

        $Path = "assets/".$this->upload_to.'/'.$image_data['file_name'];
        $this->resize_image("assets/".$this->upload_to.'/'.$image_data['file_name'],600,600);
        return $Path;
    }
	
	// upload multiImages
    public function UploadMultiImages($productsID='',$table_file='files',$relationship='real_news_images'){
        $this->make_folder($this->upload_to,'assets/Uploads/',$table_file);
        //Configure upload.
        $this->load->library("upload");
        $this->upload->initialize(array(
            "upload_path"   => $this->folder_path_upload_image.$this->upload_to,
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '2000',
			'encrypt_name' => TRUE
        ));
        if($this->upload->do_multi_upload("Images_upload")){
			$data_file = $this->upload->get_multi_upload_data();
        	for($i=0; $i<count($_FILES['Images_upload']["name"]); $i++){
		        $data = array(
		            'Filename'=>$data_file[$i]['file_name'],
		            'Path'=>"assets/".$this->upload_to.'/'.$data_file[$i]['file_name'],
		        );
		        $this->db->insert($table_file, $data);
		        $IDmax = $this->db->query("select max(ID) as maxID from $table_file")->row();
		        if($productsID!='' && is_numeric($productsID)){
		        	$this->db->query("insert into $relationship(ImageID,NewsID) value($IDmax->maxID,$productsID)");
		        }
		        $url_array[] = "assets/".$this->upload_to.'/'.$data_file[$i]['file_name'];
        	}
            $this->created_thumb_image($url_array,200,200,$table_file);
        	$this->resize_image($url_array,600,600);
        }
    }
    
    // delete file by ID record base table
    public function delete_file_by_id_record($table='',$idrecord,$table_file='files'){
    	if($table!=''){
            $list_id = $this->db->query("select * from $table where ID in($idrecord)")->result();
            if($list_id){ 
                foreach($list_id as $row){
                    $this->delete_file_by_id_file($row->ImageID,$table_file);
                }
            }
    	}
    }
    // resize image 
    public function resize_image($path,$width=200,$height=300){
    	if(is_array($path)){
    		$this->load->library('image_lib');
			foreach($path as $row){
				$config['image_library'] = 'gd2';
				$config['create_thumb'] = false;
				$config['maintain_ratio'] = true;
				$config['width'] = $width;
				$config['height'] = $height;
				$config['source_image'] = $row;
				$this->image_lib->clear();
			    $this->image_lib->initialize($config);
			    if ( ! $this->image_lib->resize()){
				    echo $this->image_lib->display_errors();
				}

			}
		}else{
			$config['image_library'] = 'gd2';
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = true;
			$config['width'] = $width;
			$config['height'] = $height;
			$config['source_image'] = $path;
			$this->load->library('image_lib', $config);
			if ( ! $this->image_lib->resize()){
			    echo $this->image_lib->display_errors();
			}		
		}
    }
    
    // created thumb images 
    public function created_thumb_image($path,$width=100,$height=80,$table_file='files'){
        if(is_array($path)){
            $this->load->library('image_lib');
            foreach($path as $row){
                $config['image_library'] = 'gd2';
                $config['create_thumb'] = true;
                $config['maintain_ratio'] = true;
                $config['width'] = $width;
                $config['height'] = $height;
                $config['source_image'] = $row;
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if ( ! $this->image_lib->resize()){
                    echo $this->image_lib->display_errors();
                }else{
                    $thumb_image = $this->get_thumb($row);
                    $this->db->query("update $table_file set Thumb = '$thumb_image' where Path = '$row'");
                }

            }
        }else{
            $config['image_library'] = 'gd2';
            $config['create_thumb'] = true;
            $config['maintain_ratio'] = true;
            $config['width'] = $width;
            $config['height'] = $height;
            $config['source_image'] = $path;
            $this->load->library('image_lib', $config);
            if ( ! $this->image_lib->resize()){
                echo $this->image_lib->display_errors();
            }else{
                $thumb_image = $this->get_thumb($path);
                $this->db->query("update $table_file set Thumb = '$thumb_image' where Path = '$path'");
            }           
        }
    }

    // lấy tên thumb images 
    public function get_thumb($path=''){
        if($path!=''){
            $str = strlen($path);
            $name = $str-4;
            $start = $str-4;
            $str_name = substr($path,0,$name);
            $str_extend = substr($path,$start,4);
            $name_thumb = $str_name.'_thumb'.$str_extend;
            return $name_thumb;
        }
    }

    // delete file by id file
    public function delete_file_by_id_file($id,$table_file='files'){
    	if($id!=''){
	        $this->load->helper("file");
	        $path = $this->db->query("select * from $table_file where ID = $id")->row_array();
	        if($path){
	        	if(file_exists($path['Path'])){
                    unlink("./".$path['Path']);    
                }
                if(file_exists($path['Thumb'])){
                    unlink("./".$path['Thumb']);    
                }
	            $this->db->query("delete from $table_file where ID=$id");
	        }
    	}
    }
}
