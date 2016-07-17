<?php
function searchDir($path,&$data){
	if(is_dir($path)){
		$dp=dir($path);
		while($file=$dp->read()){
			if($file!='.'&& $file!='..'){
				searchDir($path.'/'.$file,$data);
			}
		}
		$dp->close();
	}
	$filetype = substr($path, strripos($path, ".") + 1);
	if($filetype =='html' && is_file($path)){
		$data[]=$path;
	}
}

function getDir($dir){
	$data=array();
	searchDir($dir,$data);
	return $data;
}