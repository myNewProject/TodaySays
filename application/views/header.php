<!DOCTYPE html>

<html lang="en">

<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Today Says</title>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?=site_url('/static/plugins')?>/bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<style>
html {
	height:100%;
}
body {
	height:100%;
}
#body-container {
	height: 100%;
	min-height: 100%;
 }
 .navbar-margin-top{
 	margin-top: 50px;
 }
 #footer {
 	padding-top: -40px;
 }
.margin-top {
	margin-top:100px;
}
.comment-top {
	margin-top: 16px;
}
.com-font {
	color: rgb(51, 51, 51);
	cursor: default;
	display: inline-block;
	font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
	font-size: 14px;
	font-weight: bold
}
.comment {
	padding: 10px;
}
#by {
	font-style: italic; 
	text-align: right;
	font-family: Bodoni Bd BT;
}
.bg-com {
	margin-bottom: 5px;
	border: solid;
	border-spacing: 1%;
	border-color: #99CCFF;
}
</style>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<!-- BEGIN VIEW FLASHDATA -->
	
<!-- END VIEW FLASHDATA -->
<!-- BEGIN BODY -->
<body>
<!-- BEGIN HEADER -->
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
			<a class="navbar-brand collapsed" style="floast: left;" data-toggle="collapse" data-target="#menu-1" href="#">
				<span class="glyphicon glyphicon-menu-hamburger"></span>
			</a>
			<?php 
			if ($this->session->userdata('is_login')) {	?>
				<a class="navbar-brand" style=" float: right!important;" href="<?=site_url('/')?>auth/logout">
					<span class="glyphicon glyphicon-remove-sign" data-toggle="tooltip" data-placement="bottom" title="로그아웃"></span>
				</a>
				<a class="navbar-brand" style=" float: right;" data-toggle="popover" data-placement="bottom" title="Dismissible popover" data-html="true" data-content="<a href='#'>첫번째 알림</a><br><a href='#'>두번째 알림</a>" href="#">
					<span class="glyphicon glyphicon-bell" data-toggle="tooltip" data-placement="bottom" title="알림"></span>
				</a>
			<?php
			} else {	?>
				<a class="navbar-brand" style=" float: right;" href="<?=site_url('/Auth/register')?>">
					<span class="glyphicon glyphicon-ok-sign" data-toggle="tooltip" data-placement="bottom" title="회원가입"></span>
				</a>
				<a class="navbar-brand" style=" float: right;" data-toggle="modal" href="#login_form">
					<span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="bottom" title="로그인"></span>
				</a>	
			<?php
			}
			?>
		</div>
	</div><!-- /.container-fluid -->
</div>

<!-- END HEADER -->

<!-- BEGIN BODY CONTAINER -->
<div class="container" id="body-container">