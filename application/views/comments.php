<div class="row comment bg-info"><!-- each comments -->
	<? if ($re_id != 0) { ?>	<!-- 대댓이 있는경우 -->
	<div class="col-xs-1">
		<span class="glyphicon glyphicon-minus"></span>
	</div>
	<div class="col-xs-11 padding-bottom bg-com">
	<? } else { ?>		<!-- 대댓이 없는경우 -->
	<div class="col-xs-12 padding-bottom bg-com">
	<? } ?>
			<div class="col-sm-3 comment-top com-font">
				<span class="glyphicon glyphicon-user"></span> <a href="javascript:"><?=$nickname?></a>
			</div>
			<div class="col-sm-9 comment-top com-font">
				<span class="glyphicon glyphicon-calendar"></span> <?=$postdate?>
			</div>
			<div class="col-sm-12 comment-top com-font">
				<span class="glyphicon glyphicon-comment"></span> comment<br>
				<?=$comment?>
			</div>
		<div class="col-xs-12">
			<button type="button" class="btn btn-primary comment-top" onclick="likeComment(<?=$co_id?>)">좋아요 <span class="badge"><?=$liker?></span></button>
			<? if ($this->session->userdata('is_login') && $re_id == 0) {	?>
			<button type="button" class="btn btn-warning comment-top" data-toggle="collapse" data-target="#com<?=$co_id?>" aria-expanded="false" aria-controls="collapseExample">댓글달기</button>
			<div class="col-sm-12 collapse" aria-hidden="true" id="com<?=$co_id?>">
				<form action="<?=site_url('/Collection/addComment')?>/<?=$index?>/<?=$co_id?><?=empty($returnURL) ? '' : '?returnURL='.rawurlencode($returnURL) ?>" method="post">
				<div class="row comment bg-info">
					<div class="form-group comment-top">
						<label for="nickname"><span class="glyphicon glyphicon-user"></span> writer</label>
						<input type="text" class="form-control" id="nickname" name="nickname" value="<?=$this->session->userdata('username')?>" readonly>
						</input>
					</div>
					<div class="form-group">
						<label for="comment"><span class="glyphicon glyphicon-comment"></span> comment</label>
						<textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
					</div>
					<button type="submit" class="btn btn-warning comment-top">댓글달기</button>
				</div>
				</form>
			</div>
			<? } ?>
		</div>
	</div>
</div>