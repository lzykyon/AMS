<?php
namespace Admin\Controller;
//use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $this->display();
    }

    public function test(){
    	//echo "test";
    	print_r(getDir('./App/Admin/View'));
    	//$this->ajaxret(array('errcode'=>0, 'msg'=>'ddffsd', 'data'=>array()));
    }
}