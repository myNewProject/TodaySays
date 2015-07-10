</div>
<!-- END BODY CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="container" id="footer">
	<div class="row">
		<div class="col-md-12">
		 2015 &copy; Today Says. GD's Work.
		</div>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script src="<?=site_url('/static/plugins')?>/jquery/1.11.2/jquery.js" type="text/javascript"></script>
<script src="<?=site_url('/static/plugins')?>/bootstrap-3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
	// 댓글 좋아요
	function likeComment (id) {
		$.post("<?=site_url('/Collection')?>/likeComment", 
			{ index: id }, 
			function(result) {
				alert("좋아요를 눌렀습니다.");
				$("#co_id"+id).html(result);
		});
	}
	// 명언 담기
	function keepSays (id) {
		$.post("<?=site_url('/Collection')?>/keepSays", 
			{ coll_id: id }, 
			function(result) {
				alert("담았습니다.");
				$("#"+id).html(result);
		});
	}
	// 명언 담기 취소
	function removeSays (id) {
		$.post("<?=site_url('/Collection')?>/removeSays", 
			{ coll_id: id }, 
			function(result) {
				alert("취소했습니다.");
				$("#"+id).html(result);
		});
	}
	// bootstrap 툴팁 초기화
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	// bootstrap 팝오버 초기화
	$(function () {
		$('[data-toggle="popover"]').popover()
	});
</script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>