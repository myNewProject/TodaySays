
<div class="row margin-top">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<? echo Validation_errors(); ?>
		 
		<form class="form-horizontal" action="<?=site_url('/')?>Auth/register" method="post">
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">이메일</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="example@gmail.com">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="nickname">닉네임</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nickname" name="nickname"  value="<?php echo set_value('nickname'); ?>" placeholder="닉네임">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password">비밀번호</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="비밀번호">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="re_password">비밀번호 확인</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="re_password" name="re_password" value="<?php echo set_value('re_password'); ?>" placeholder="비밀번호 확인">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-12">
					<button type="submit" class="btn btn-primary">회원가입</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-sm-1"></div>  
</div>
