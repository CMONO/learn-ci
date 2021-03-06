<?php
/**
 * 框架主入口文件，所有的页面请求均定为到该页面，并根据 url 地址来确定调用合适的方法并显示输出
 */

define('APPPATH', '');



require('core/Common.php');

$URI =& load_class('URI');
$RTR =& load_class('Router');

$RTR->set_routing();


$class = $RTR->fetch_class();
$method = $RTR->fetch_method();

require('core/Controller.php');

function &get_instance() {
	return CI_Controller::get_instance();
}



require('controllers/'.$class.'.php');


$CI = new $class();

call_user_func_array(array(&$CI, $method), array_slice($URI->rsegments, 2));


