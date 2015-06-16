<?php

require( dirname(__FILE__) . '/wp-load.php' );
require_once(ABSPATH . 'wp-admin/includes/taxonomy.php'); 

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('content-type: application/json;charset=utf-8');

$data = json_decode(trim(file_get_contents('php://input')),true);


 $my_post=array(
  'post_title'    => $data['title'],
  'post_content'  =>  $data['content'],
  'post_status'   =>  $data['status'],
  'post_author'   =>  $data['author'],
  'post_category' =>  airportidgrabber($data['AirIds'])
); 
// Insert the post into the database
$post_id = wp_insert_post( $my_post );

if(!empty($data['image']))
{
//********** attaching image from an external source *******//
$upload_dir = wp_upload_dir();
$image_data = file_get_contents($data['image']);
$filename = basename($data['image']);

if(wp_mkdir_p($upload_dir['path']))
    $file = $upload_dir['path'] . '/' . $filename;
else
    $file = $upload_dir['basedir'] . '/' . $filename;
file_put_contents($file, $image_data);

$wp_filetype = wp_check_filetype($filename, null );

$attachment = array(
    'post_mime_type' => $wp_filetype['type'],
    'post_title' => sanitize_file_name($filename),
    'post_content' => '',
    'post_status' => 'inherit'
);
$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
require_once(ABSPATH . 'wp-admin/includes/image.php');
$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
wp_update_attachment_metadata( $attach_id, $attach_data );

set_post_thumbnail( $post_id, $attach_id );

//******** END ****************//
}


function airportidgrabber($airids)
{
global $wpdb;
$ids="";
/*
foreach($airids as $val)
{
$result = $wpdb->get_row("SELECT wpt.term_id FROM wp_terms wpt inner join wp_term_taxonomy wptt on wpt.term_id=wptt.term_id  WHERE  wptt.description='Airport' and wpt.slug='$val[AirportId]'", ARRAY_A );

$ids.= ",".$row[term_id];
}
$ids=trim(trim($ids),','); */
$row = $wpdb->get_row("SELECT GROUP_CONCAT(wpt.term_id) as termids FROM wp_terms wpt inner join wp_term_taxonomy wptt on wpt.term_id=wptt.term_id  WHERE  wptt.description='Airport' and wpt.slug IN ($airids)", ARRAY_A );
$ids =$row[termids];
return explode(",",$ids);

} 