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
$obj=gettermid($val);
$dat[]=$obj;
wp_insert_category($obj);
}

echo json_encode($dat);

function gettermid($val)
{
global $wpdb;
$row = $wpdb->get_row("SELECT wpt.term_id FROM wp_terms wpt inner join wp_term_taxonomy wptt on wpt.term_id=wptt.term_id  WHERE  wptt.description='Airport' and wpt.slug='$val[category_parent]'", ARRAY_A );

$val[category_parent]=$row['term_id'];

return $val;
}
