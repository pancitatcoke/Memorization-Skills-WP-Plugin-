
<div>

	<div id="words-container">
		


	</div>

	<input type="number" id="how_many" name="how_many" placeholder="How Many?">
	<button id="gen_words">Generate</button>

</div>


<script>

	jQuery('#gen_words').click(function() {
		var how_many = jQuery('#how_many').val();
		jQuery.post('<?= get_site_url() ?>/wp-json/mem-skills/v1/random_words/', { 'how_many': how_many }, function(data) {
			console.log(data);
			var el = '';
			jQuery.each(data, function( key, value ) {
				el += '<h5>' + value.words + '</h5>';
			});
				jQuery('#words-container').html(el);
		});
	});


</script>