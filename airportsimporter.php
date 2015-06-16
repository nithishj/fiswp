<?php

require( dirname(__FILE__) . '/wp-load.php' );
require_once(ABSPATH . 'wp-admin/includes/taxonomy.php'); 

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('content-type: application/json;charset=utf-8');

nocache_headers();
$data = json_decode(trim(file_get_contents('php://input')),true);
//$arr=array("text"=>"hello world");
foreach($data as $val)
{
$dat[]=$val;
wp_insert_category($val);
}

echo json_encode($dat);
