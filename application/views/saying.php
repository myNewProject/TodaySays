<div class="jumbotron margin-top">
	<p>
		<?=$say?>
	</p>
	<p>
		<?=$trans?>
	</p>
	<p class="by"><small><?=$by?></small></p>
	<div id="<?=$coll_id?>">
	<? if ($this->session->userdata('is_login')) {	
		if ($keeping === NULL) { // 담겨있지 않다면?>
			<button type="button" class="btn btn-primary" onclick="keepSays(<?=$coll_id?>)"><span class="glyphicon glyphicon-plus"></span> 담아두기</button>
		<? } else { ?>
			<button type="button" class="btn btn-success" onclick="removeSays(<?=$coll_id?>)"><span class="glyphicon glyphicon-ok"></span> 담겨있음</button>
		<? }
	} 
	if ($each_url != null) { 
		echo $each_url;
	}?>
	</div>
</div>

<!-- BEGIN COMMENTS -->