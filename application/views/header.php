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
	height: :100%;
	min-height: 100%;
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
		<div class="navbar-header">
			<a class="navbar-brand collapsed " data-toggle="collapse" data-target="#menu-1" href="#">
				<span class="glyphicon glyphicon-menu-hamburger"></span>
			</a>
		</div>
		<div id="menu-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
				<li><a href="#">Link</a></li>
			</ul>
		</div>
		<div>
			<ul class="nav navbar-nav navbar-right">
			<?php 
			if ($this->session->userdata('is_login')) {	?>
				<li>
					<a href="#">
					<span class="glyphicon glyphicon-bell" data-toggle="tooltip" data-placement="bottom" title="알림"></span></a>
				</li>
				<li>
					<a href="<?=site_url('/')?>auth/logout">
					<span class="glyphicon glyphicon-remove-sign" data-toggle="tooltip" data-placement="bottom" title="로그아웃"></span></a>
				</li>

			<?php
			} else {	?>
				<li>
					<a href="#login_form" data-toggle="modal">
					<span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="bottom" title="로그인"></span></a>
				</li>
				<li><a href="<?=site_url('/Auth/register')?>">
					<span class="glyphicon glyphicon-ok-sign" data-toggle="tooltip" data-placement="bottom" title="회원가입"></span></a>
				</li>
				
			<?php
			}
			?>
			</ul>
		</div>
	</div><!-- /.container-fluid -->
</div>
					
<div class="modal fade" id="login_form" role="dialog" aria-labelledby="login_title" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-title" id="login_title">
					<h3>로그인</h3>
				</div>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
					<form class="form-horizontal" method="post" action="<?=site_url('/')?>auth/authentication<?=empty($returnURL) ? '' : '?returnURL='.rawurlencode($returnURL) ?>">	
						<div class="form-group">
							<label class="control-label col-sm-2" for="inputEmail">아이디</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" id="email" name="email" placeholder="이메일">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="inputPassword">비밀번호</label>
							<div class="col-sm-10">
								<input class="form-control" type="password" id="password" name="password" placeholder="비밀번호">
							</div>
						</div>
					
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">로그인</button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
<!-- END HEADER -->

<!-- BEGIN BODY CONTAINER -->
<div class="container" id="body-container">