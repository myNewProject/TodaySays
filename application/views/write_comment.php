<? if ($this->session->userdata('is_login')) {	?>
<form action="<?=site_url('/Collection/addComment')?>/<?=$index?><?=empty($returnURL) ? '' : '?returnURL='.rawurlencode($returnURL) ?>" method="post">
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
	<button type="submit" class="btn btn-primary comment-top">리뷰작성</button>
</div>
</form>
<? } ?>
	
<!-- END COMMENTS -->