<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route[ADMINPATH] = "authentication";
$route[ADMINPATH . '/check-login'] = "authentication/login_now";
$route[ADMINPATH . '/login'] = "authentication/login";
$route[ADMINPATH . '/logout'] = "authentication/logout";
$route[ADMINPATH . '/([a-zA-Z_-]+)/(:any)'] = "$1/admin/$2";
$route[ADMINPATH . '/([a-zA-Z_-]+)'] = "$1/admin/$1";
$route['([a-zA-Z_-]+)/admin/([a-zA-Z_-]+)'] = "";
$route['default_controller'] = "home";

/*---- Site ----*/
$route['dang-nhap'] = "site/login";
$route['dang-xuat'] = "site/logout";
$route['login'] = "site/check_login";
$route['dang-ky'] = "site/register";
$route['cap-nhat-thong-tin'] = "site/update_information";
$route['save-information'] = "site/save_information";
$route['get-password-from-email'] = "site/send_mail_get_password";
$route['userpage'] = "userpage";
$route['userpage/(:any)'] = "userpage/$1";
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */