<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  <html lang="zh-cn">    <head>      <title>后台管理系统 V1.0</title>  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />      <meta http-equiv="X-UA-Compatible" content="IE=edge" />      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">      <meta name="renderer" content="webkit">  	  	<link href="_PUBLIC__/Script/zui/css/zui.css" rel="stylesheet" />  	      <!--[if lt IE 9]>        <script src="/Public/Script/zui/lib/ieonly/html5shiv.js"></script>        <script src="/Public/Script/zui/lib/ieonly/respond.js"></script>        <script src="/Public/Script/zui/lib/ieonly/excanvas.js"></script>      <![endif]-->    	<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->      <script src="/Public/Script/jQuery/1.11.3/jquery.js"></script>      <!-- ZUI Javascript组件 -->      <script src="/Public/Script/zui/js/zui.min.js"></script>      <script src="/Public/Script/jstree/jstree.js"></script>    </head>    <body>      <div id="top_contain"></div>      <div id="middle_contain">          <div id="middle_left_contain">  			<nav class="menu" data-toggle="menu" style="width: 200px">  			  <ul class="nav nav-primary">  			    <li><a href="#"><i class="icon-th"></i> Dashboard</a></li>  			    <li><a href="#"><i class="icon-user"></i> Me</a></li>  			    <li><a href="#"><i class="icon-list-ul"></i> All</a></li>  			  </ul>  			</nav>          </div>          <div id="middle_right_contain"></div>          <div id="middle_contain_toggle"></div>          <div class="clear"></div>      </div>      <div id="bottom_contain"></div>      <div id="login_contain"></div>      <div id="modal_contain"></div>      <div id="alert_contain"></div>      <div id="confirm_contain"></div>      <div id="popover_contain"></div>      <div id="download_contain"></div>      <div class="ci-contain">          <div class="ci-item-contain"></div>      </div>      <div class="ld-contain">          <div class="ld-content-contain">              <img src="../Themes/Default/Images/loading.gif" />              <span>加载中，请稍候…</span>          </div>      </div>      <div class="iz-contain" title="点击关闭">          <div class="iz-content-contain">              <img class="iz-item" src="" />          </div>      </div>    </body>  </html>