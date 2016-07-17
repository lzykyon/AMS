<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <title>后台管理系统 V1.0</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
	
	<link href="/Public/Script/zui/css/zui.css" rel="stylesheet" />

	<link href="/Public/Themes/Default/default.css" rel="stylesheet" />

    <!--[if lt IE 9]>
      <script src="/Public/Script/zui/lib/ieonly/html5shiv.js"></script>
      <script src="/Public/Script/zui/lib/ieonly/respond.js"></script>
      <script src="/Public/Script/zui/lib/ieonly/excanvas.js"></script>
    <![endif]-->

	<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
    <script src="/Public/Script/jQuery/1.11.3/jquery.js"></script>
    <!-- ZUI Javascript组件 -->
    <script src="/Public/Script/zui/js/zui.min.js"></script>
    <script src="/Public/Script/jstree/jstree.js"></script>
    <script src="/Public/Script/jkbms.js"></script>
  </head>
  <body>
    <div id="top_contain">
		<div id="header">
		    <div id="caption_contain">
		        <div id="caption">
		            <img class="sys-logo" src="/Public/Themes/default/images/logo_2.png" />
		        </div>
		    </div>
		    <div id="user_menu">
				<ul id="option">
				    <li>
				        <a id="option_info">
				            <div><i class="icon-user"></i>管理员，欢迎您！</div>
				            <div>总公司</div>
				        </a>
				    </li>
				    <li><a id="option_help" title="帮助" href="../Software/使用说明.pdf" target="_blank">帮助</a></li>
				    <li><a id="option_logout" title="退出登录">退出</a></li>
				</ul>
		    </div>
		</div>
    </div>
    <div id="middle_contain">
        <div id="middle_left_contain">
			<nav class="menu" data-toggle="menu" style="width: 190px">
			  <ul class="nav nav-primary">
			  	<li perms_map="内容管理"><a href="#" onclick="test()"><i class="icon-th"></i> 内容管理</a></li>
			    <li perms_map="系统管理" class="active"><a href="#"><i class="icon-cogs"></i> 系统管理</a></li>
			  </ul>
			</nav>
        </div>
        <div id="middle_right_contain">
			<!-- <ul class="nav nav-tabs">
			  <li class="active"><a href="#">首页</a></li>
			  <li><a href="#">动态 <span class="label label-badge label-success">4</span></a></li>
			  <li><a href="#">项目 </a></li>
			  <li>
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#">更多 <span class="caret"></span></a>
			    <ul class="dropdown-menu">
			      <li><a href="#">任务</a></li>
			      <li><a href="#">bug</a></li>
			      <li><a href="#">需求</a></li>
			      <li><a href="#">用例</a></li>
			    </ul>
			  </li>
			</ul> -->
			<ul class="nav nav-tabs">
			  <li class="active" perms_map="系统管理/用户管理"><a href="#">用户管理</a></li>
			  <li perms_map="系统管理/角色管理"><a href="#">角色管理</a></li>
			  <li perms_map="系统管理/权限管理"><a href="#">权限管理</a></li>
			  <li perms_map="系统管理/数据字典" perms-url="<?php echo U('/Admin/System/','','');?>"><a href="#">数据字典</a></li>
			</ul>
			<div class="frame-body">
				<div class="panel">
				  <div class="panel-heading">
				    标题
				  </div>
				  <div class="panel-body" id="user_list">
				    内容
				  </div>
				</div>
			</div>
        </div>
        <div id="middle_contain_toggle"></div>
        <div class="clear"></div>
    </div>
    <div id="bottom_contain">
		<div class="footer">
        <p class="text-muted"><small>后台管理系统<span class="doc-version"> V1.0</span></small></p>
		</div>
    </div>
    <div id="login_contain"></div>
    <div id="modal_contain"></div>
    <div id="alert_contain"></div>
    <div id="confirm_contain"></div>
    <div id="popover_contain"></div>
    <div id="download_contain"></div>
    <div class="ci-contain">
        <div class="ci-item-contain"></div>
    </div>
    <div class="ld-contain">
        <div class="ld-content-contain">
            <img src="/Public/Themes/Default/Images/loading.gif" />
            <span>加载中，请稍候…</span>
        </div>
    </div>
    <div class="iz-contain" title="点击关闭">
        <div class="iz-content-contain">
            <img class="iz-item" src="" />
        </div>
    </div>
  </body>
  <script type="text/javascript">
  	jkbms.ajaxload.requestcallbacks.before = function (args) {
        jkbms.loading.show();
        console.log("before");
    };
    jkbms.ajaxload.requestcallbacks.after = function (args) {
    	if(args.exception){
    		jkbms.alert(args.exception);
    		return false;
    	}
    	jkbms.alert(args.viewResults);
    	if(args.eleID){
    		$(args.eleID).html(args.viewResults);
    	}
        jkbms.loading.hide();
        console.log("after");
    };
  	$(document).ready(function () {
  		reposMiddleContain();
  		jkbms.loading.init($('.ld-contain'));
        $(window).on('resize', reposMiddleContain);
    });
    window.reposMiddleContain = function () {
        var leftWidth = $('#middle_left_contain').width();
        $('#middle_right_contain').width($('#middle_contain').width() - leftWidth - 24);
    };
    function test(){
    	jkbms.r('#user_list','<?php echo U('/Admin/Index/test','','');?>');
    }
  </script>
</html>