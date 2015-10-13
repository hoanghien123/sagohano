<?php
#****************************************#
# * @Author: Mr.Hiếu                     #
# * @Email: votrunghieu007@gmail.com     #
#****************************************#

class Lib{
    public $CI;

    /* -------- end var -----------------*/
    
    public function __construct() {
    	// khai báo mặc định
        $this->CI = & get_instance();
    }

	public function get_times_remains($times){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $remain = strtotime(date('Y-m-d H:i:m',time())) - strtotime($times);
        $remain_change = $remain/(60*60*24);
        if($remain_change>=1){
            if($remain_change>=365){
                $remain_change = $remain/(60*60*24*365);
                $temp = round($remain_change,0);
                $remain_change = $temp.' năm trước';
            }else{
                $temp = round($remain_change,0);
                $remain_change = $temp.' ngày trước';
            }
        }else{
            $remain_change = $remain/(60*60);
            if($remain_change>=1){
                $remain_change = round($remain_change).' giờ trước';
            }else{
                $remain_change = $remain/60;
                if(round($remain_change,0)>0){
                    $remain_change = round($remain_change,0).' phút trước';
                }else{
                    $remain_change = '1 phút trước';
                }
            }
        }
        return $remain_change;
    }
	
    public function replace_data_get($key='',$value='',$data=array(),$status='replace',$reciver='string'){
        if(is_array($data)){
            if(count($data)>0){
                $arr_reciver = array();
                $arr = array();
                if(array_key_exists($key, $data)){
                    foreach ($data as $key_item => $value_item) {
                        if($status=='remove'){
                            if($key!=$key_item){
                                if($reciver!='string')
                                $arr_reciver[$key_item] =  $value_item;
                                $arr[] = $key_item.'='.urlencode($value_item);
                            }
                        }else{
                            if($key==$key_item){
                                if($reciver!='string')
                                $arr_reciver[$key_item] =  $value_item;
                                $arr[] = $key.'='.urlencode($value);
                            }else{
                                if($reciver!='string')
                                $arr_reciver[$key_item] =  $value_item;
                                $arr[] = $key_item.'='.urlencode($value_item);
                            }
                        }
                    }
                    if($reciver!='string') return $arr_reciver;
                    $arr = implode('&',$arr);
                    $arr = $arr!='' ? '?'.$arr : $arr ;
                    return $arr;
                }else{
                    foreach ($data as $key_item => $value_item) {
                        if($reciver!='string')
                        $arr_reciver[$key_item] =  $value_item;
                        $arr[] = $key_item.'='.urlencode($value_item);
                    }
                    if($status=='replace'){
                        if($reciver!='string')
                        $arr_reciver[$key_item] =  $value_item;
                        $arr[] = $key.'='.urlencode($value);    
                    }
                    if($reciver!='string') return $arr_reciver;
                    $arr = implode('&',$arr);
                    $arr = $arr!='' ? '?'.$arr : $arr ;
                    return $arr;
                }
            }else{
                if($status=='remove'){
                    if($reciver!='string') return array();
                    return '';
                }else{
                    if($reciver!='string') return array($key=>$value);
                    return '?'.$key.'='.urlencode($value);
                }
            }
        }
        return '';
    }
    
	public function useronline(){
		$tg=time();
		$tgout=60;
		$tgnew=$tg - $tgout;
		/************ user online ************/
		$sql="insert into useronline(tgtmp,ip,local) values($tg,'{$_SERVER['REMOTE_ADDR']}','".current_url()."')";
		$this->CI->db->query($sql);
		$sql="delete from useronline where (tgtmp<$tg and ip='".$_SERVER['REMOTE_ADDR']."') or tgtmp<$tgnew";
		$this->CI->db->query($sql);
		$sql="SELECT count(ip) as record FROM useronline";
		$data['useronline'] = $this->CI->db->query($sql)->row()->record;
		/************ Luot truy cap ************/
		$check = $this->CI->db->query("select * from luottruycap where ip='{$_SERVER['REMOTE_ADDR']}' and day(Created)=day(curdate()) and month(Created)=month(curdate()) and year(Created)=year(curdate())")->row();
		if(!$check){
			$sql="insert into luottruycap(ip,Created) values('{$_SERVER['REMOTE_ADDR']}','".date('Y-m-d H:i:s',time())."')";
			$this->CI->db->query($sql);
		}
		$data['luottruycap'] = $this->CI->db->query("select count(*) as record from luottruycap")->row()->record;
		return $data;
	}
	
	// Lấy ngày hiện tại active tin rao vặt
    public function get_active_times(){
        $timezone = +8;
		return gmdate("Y-m-d H:i:s", time() - 3600 + 3600*($timezone+date("I")));
    }
	
    
    // hàm lấy đường dẫn đến module
    public function getURLSegmentByClassName($ClassName=''){
    	if($ClassName!=''){
            $result = $this->CI->db->query("select * from sitetree where ClassName='$ClassName'")->row();
	        if($result){
                return base_url().$result->URL;	            
	        }
    	}
    	return '';
    }
    
    // hàm chuyên tất cả ký tự có dấu thành không dấu
    public function asciiCharacter($string = null) {
        $string = trim($string);
        $string = rawurldecode($string);
        $string = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $string);
        $string = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $string);
        $string = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $string);
        $string = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $string);
        $string = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $string);
        $string = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $string);
        $string = preg_replace("/(đ)/", 'd', $string);
        $string = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $string);
        $string = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $string);
        $string = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $string);
        $string = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $string);
        $string = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $string);
        $string = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $string);
        $string = preg_replace("/(Đ)/", 'D', $string);
        $string = str_replace("--", '-', $string);
        $string = str_replace("--", '-', $string);
        $string = str_replace("--", '-', $string);
        $string = str_replace(" ", ' ', $string);
        return $string;
    }

    // hàm chèn dấu - vào giữa các ký tự
    private function toSlug($string, $space = "-") {
        $string = trim($string);
        $string = rawurldecode($string);
        $string = preg_replace("/[^a-zA-Z0-9 -]/", "", $string);
        $string = strtolower($string);
        $string = str_replace(" ", $space, $string);
        $string = str_replace("--", $space, $string);
        return $string;
    }

    // hàm convert string thành dạng alias 
    public function alias($text) {
        $text = $this->asciiCharacter($text);
        $text = $this->toSlug($text);         
        return $text;
    }

    // cắt chuối giới hạn rồi thêm vào ký tự
	function splitString($string, $count,$symbol='...'){
		if($string){
			preg_match_all('`.`u', $string, $arr);
			$arr = array_chunk($arr[0], count($string));
			$arr = array_map('implode', $arr);
			$kq = '';
			if(count($arr)<$count)
				return $kq.=$string;
			for($i=0; $i<$count; $i++){
				$kq .= $arr[$i];
			}
			if($kq)
				return $kq.$symbol;
		}else return false;
	}
	
	public function nav($url,$segment=3,$total=10,$perpage=20,$numlink = 5){
		$this->CI->load->library('pagination');
		$config['uri_segment'] = $segment;
		$config['num_links'] = $numlink;
		$config['base_url'] = $url;
		$config['total_rows'] = $total;
		$config['per_page'] = $perpage; 
		$this->CI->pagination->initialize($config); 

		return "<div class='list_page'><ul>".$this->CI->pagination->create_links()."</ul></div>";
	}
	
     // lấy dữ liệu phân trang dạng link
    function get_data_phantrang_link($Table='',$where='',$limit=10,$show=5){
        $url = str_replace("/index.php", '', current_url());
        $start=0;
        if(isset($_GET['start'])){
            $start=$_GET['start'];
        }
        if(!is_numeric($Table)){
            if($where!='' && $Table!=''){
                $result = $this->CI->db->query("select count(*) as row from $Table where $where")->row();
            }else if($where=='' && $Table!=''){
                $result = $this->CI->db->query("select count(*) as row from $Table")->row();
            }
            if($result){
                $data = $result->row/$limit;
                $text = '<div class="list_page"><ul>';
                $prev = $start-$show;
                $next = $start+$show;
                if($prev<=0){
                    for ($i=0; $i<$start ; $i++) { 
                        $temp_prev = $i+1;
                        $text=$text."<a style='margin:0px 2px' href='".$url."?start=$i'>$temp_prev</a>";
                    }
                }else{
                    $text=$text."<a style='margin:0px 2px' href='".$url."?start=0'><< First </a>";
                    for ($i=$prev; $i<$start ; $i++) {
                        $temp_prev = $i+1; 
                        $text=$text."<a style='margin:0px 2px' href='".$url."?start=$i'>$temp_prev</a>";
                    }
                }
                $curr = $start+1;
                $text=$text."<a class='current_page' style='color:#F00; font-weight:bold;margin:0px 2px'>[ $curr ]</a>";
                if($next>=$data){
                    for ($i=$start+1; $i<$data; $i++) { 
                        $temp_next = $i+1;
                        $text=$text."<a style='margin:0px 2px' href='".$url."?start=$i'>$temp_next</a>";
                    }
                }else{

                    for ($i=$start+1; $i<$next; $i++) {
                        $temp_prev = $i+1; 
                        $text=$text."<a style='margin:0px 2px' href='".$url."?start=$i'>$temp_prev</a>";
                    }
                    $data = $data > round($data,0) ? round($data) : round($data,0)-1;
                    $text=$text."<a style='margin:0px 2px' href='".$url."?start=$data'> Last >></a>";
                }
                $text=$text."</ul></div>";
            }else{
                $text = '';
            }    
        }else{
            $data = $Table/$limit;
            $text = '<div class="list_page"><ul>';
                $prev = $start-$show;
                $next = $start+$show;
                if($prev<=0){
                    for ($i=0; $i<$start ; $i++) { 
                        $temp_prev = $i+1;
                        $text=$text."<a style='margin:0px 2px' href='".$url."?start=$i'>$temp_prev</a>";
                    }
                }else{
                    $text=$text."<a style='margin:0px 2px' href='".$url."?start=0'><< First </a>";
                    for ($i=$prev; $i<$start ; $i++) {
                        $temp_prev = $i+1; 
                        $text=$text."<a style='margin:0px 2px' href='".$url."?start=$i'>$temp_prev</a>";
                    }
                }
                $curr = $start+1;
                $text=$text."<a class='current_page' style='color:#F00; font-weight:bold;margin:0px 2px'>[ $curr ]</a>";
                if($next>=$data){
                    for ($i=$start+1; $i<$data; $i++) { 
                        $temp_next = $i+1;
                        $text=$text."<a style='margin:0px 2px' href='".$url."?start=$i'>$temp_next</a>";
                    }
                }else{
                    for ($i=$start+1; $i<$next; $i++) {
                        $temp_prev = $i+1; 
                        $text=$text."<a style='margin:0px 2px' href='".$url."?start=$i'>$temp_prev</a>";
                    }
                    $data = $data > round($data,0) ? round($data) : round($data,0)-1;
                    $text=$text."<a style='margin:0px 2px' href='".$url."?start=$data'> Last >></a>";
                }
            $text=$text."</ul></div>";
        }
        
        return $text;
    }

    public function get_catpchas(){
        $this->CI->load->library('session');
        $word_1 = chr(rand(97, 122));
        $word_2 = chr(rand(48, 57));
        $word_3 = chr(rand(97, 122));
        $word_4 = chr(rand(48, 57));
        $word_5 = chr(rand(97, 122));
        $word_6 = chr(rand(97, 122));
        $word_7 = chr(rand(97, 122));
        $filename=$word_1.$word_2.$word_3.$word_4.$word_5.$word_6.$word_7;
        $dir = 'public/font/';
        $image = imagecreatetruecolor(115, 25);
        $font = "recaptchaFont.ttf"; // font style
        $color = imagecolorallocate($image, 0, 0, 0);// color
        $white = imagecolorallocate($image, 241, 241, 241); // background color white
        imagefilledrectangle($image, 0,0, 709, 99, $white);
        imagettftext ($image, 14, 0, 10, 18, $color, $dir.$font, $filename);
        $this->CI->session->set_userdata('captchars',$filename);
        header("Content-type: image/png");
        imagepng($image);
        imagedestroy($image);
    }

    /*
    *   CURL
    */
    function crawler($proxy, $url, $referer, $agent, $header, $timeout) {
        $proxyinfo=explode(':',$proxy);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXY, $proxyinfo[0]);
        curl_setopt($ch, CURLOPT_PROXYPORT, $proxyinfo[1]);
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
     
        $result['EXE'] = curl_exec($ch);
        $result['INF'] = curl_getinfo($ch);
        $result['ERR'] = curl_error($ch);
     
        curl_close($ch);
        return $result;
    }

	/* 
	*	Lấy ID ở cuối chuỗi	
	*/
	function getIDFromURL($url){
		$params = explode("-", $url);
		return (int)$params[count($params)-1];
	}
	
    /*
    *   CURL get data
    */
    public function get_data_login_curl($url_login='',$url_getdata='',$data="",$file='cookie.txt'){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_login);
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/32.0.1700.107 Chrome/32.0.1700.107 Safari/537.36');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $file);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $file);
        $answer = curl_exec($ch);
        if (curl_error($ch)) {
            return curl_error($ch);
        }
        //another request preserving the session
        curl_setopt($ch, CURLOPT_URL, $url_getdata);
        $answer = curl_exec($ch);
        if (curl_error($ch)) {
            return curl_error($ch);
        }else{
            return curl_getinfo($ch);
        }
    }
}