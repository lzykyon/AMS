<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  <html lang="zh-cn">    <head>      <title>后台管理系统 V1.0</title>  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />      <meta http-equiv="X-UA-Compatible" content="IE=edge" />      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">      <meta name="renderer" content="webkit">  	  	<link href="/Public/Script/zui/css/zui.css" rel="stylesheet" />    	<link href="/Public/Themes/Default/default.css" rel="stylesheet" />        <!--[if lt IE 9]>        <script src="/Public/Script/zui/lib/ieonly/html5shiv.js"></script>        <script src="/Public/Script/zui/lib/ieonly/respond.js"></script>        <script src="/Public/Script/zui/lib/ieonly/excanvas.js"></script>      <![endif]-->    	<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->      <script src="/Public/Script/jQuery/1.11.3/jquery.js"></script>      <!-- ZUI Javascript组件 -->      <script src="/Public/Script/zui/js/zui.min.js"></script>      <script src="/Public/Script/jstree/jstree.js"></script>    </head>    <body>      <div id="top_contain">  		<div id="header">  		    <div id="caption_contain">  		        <div id="caption">  		            <img class="sys-logo" src="/Public/Themes/default/images/logo.png" />  		            <img class="sys-name" src="/Public/Themes/default/images/sys-name.png" />  		            <img class="sys-version" src="/Public/Themes/default/images/sys-version.png" />  		        </div>  		    </div>  		    <div id="user_menu"></div>  		    <div id="system_contain"></div>  		</div>      </div>      <div id="middle_contain">          <div id="middle_left_contain">  			<nav class="menu" data-toggle="menu" style="width: 150px">  			  <ul class="nav nav-primary">  			    <li class="active"><a href="#"><i class="icon-th"></i> Dashboard</a></li>  			    <li><a href="#"><i class="icon-user"></i> Me</a></li>  			    <li><a href="#"><i class="icon-list-ul"></i> All</a></li>  			  </ul>  			</nav>          </div>          <div id="middle_right_contain">  			<nav class="navbar navbar-default" role="navigation">  		        <!-- 导航头部 -->  		        <div class="navbar-header">  		          <!-- 移动设备上的导航切换按钮 -->  		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-example">  		            <span class="sr-only">切换导航</span>  		            <span class="icon-bar"></span>  		            <span class="icon-bar"></span>  		            <span class="icon-bar"></span>  		          </button>  		          <!-- 品牌名称或logo -->  		          <a class="navbar-brand" href="#">ZUI</a>  		        </div>    		        <!-- 导航项目 -->  		        <div class="collapse navbar-collapse navbar-collapse-example">  		          <!-- 一般导航项目 -->  		          <ul class="nav navbar-nav">  		            <li class="active"><a href="#">项目</a></li>  		            <li><a href="#">需求</a></li>  		            <!-- 导航中的下拉菜单 -->  		            <li class="dropdown">  		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">管理 <b class="caret"></b></a>  		              <ul class="dropdown-menu" role="menu">  		                <li><a href="#">任务</a></li>  		                <li><a href="#">待办</a></li>  		                <li><a href="#">Bug</a></li>  		                <li class="divider"></li>  		                <li><a href="#">测试</a></li>  		                <li><a href="#">用例</a></li>  		              </ul>  		            </li>  		          </ul>  		          <!-- 右侧的导航项目 -->  		          <ul class="nav navbar-nav navbar-right">  		            <li><a href="#">帮助</a></li>  		            <li class="dropdown">  		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">探索 <b class="caret"></b></a>  		              <ul class="dropdown-menu" role="menu">  		                <li><a href="#">敏捷开发</a></li>  		                <li><a href="#">HTML5</a></li>  		                <li><a href="#">Javascript</a></li>  		                <li class="divider"></li>  		                <li><a href="#">探索宇宙</a></li>  		              </ul>  		            </li>  		          </ul>  		        </div><!-- END .navbar-collapse -->  		      </nav>          </div>          <div id="middle_contain_toggle"></div>          <div class="clear"></div>      </div>      <div id="bottom_contain">  		<div class="footer">  		    <div class="footer-contain">  		        <img class="footer-company-logo" src="/Public/Themes/Default/Images/logo.png" />  		        <div class="foonter-contact-item footer-company-name">广东环天电子技术发展有限公司</div>  		    </div>  		</div>      </div>      <div id="login_contain"></div>      <div id="modal_contain"></div>      <div id="alert_contain"></div>      <div id="confirm_contain"></div>      <div id="popover_contain"></div>      <div id="download_contain"></div>      <div class="ci-contain">          <div class="ci-item-contain"></div>      </div>      <div class="ld-contain">          <div class="ld-content-contain hide">              <img src="../Themes/Default/Images/loading.gif" />              <span>加载中，请稍候…</span>          </div>      </div>      <div class="iz-contain" title="点击关闭">          <div class="iz-content-contain">              <img class="iz-item" src="" />          </div>      </div>    </body>    <script type="text/javascript">    	$(document).ready(function () {          $(window).on('resize', reposMiddleContain);      });      window.reposMiddleContain = function () {      	alert("2222");          var leftWidth = $('#middle_left_contain').is(':visible') ? $('#middle_left_contain').width() : -20;          $('#middle_right_contain').width($('#middle_contain').width() - leftWidth);      };    </script>  </html>