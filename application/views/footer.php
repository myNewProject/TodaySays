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
	function like (id) {
		$.ajax({
			type: 'POST',
			url: "<?=site_url('/Collection')?>/likeComment", 
			data: { index: id },
			cache: false,
			async: false
		})
		.done(function () {
			alert("좋아요를 눌렀습니다.");
		});
		/*$.ajax({
			url: "
			success: function(){ alert("좋아요를 눌렀습니다."); }
		});*/
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