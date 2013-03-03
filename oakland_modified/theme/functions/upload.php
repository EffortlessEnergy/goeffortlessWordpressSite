<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Images Uploader
 * Created by CMSMasters
 * 
 */


if ($_POST['url']) { 
	$uploaddir = $_POST['url']; 
}

$first_filename = $_FILES['uploadfile']['name'];
$filename = md5($first_filename);
$ext = substr($first_filename, 1 + strrpos($first_filename, '.'));
$file = $uploaddir . basename($filename . '.' . $ext); 

if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
	echo basename($filename . '.' . $ext);
} else {
	echo 'error';
}

?>