
<div class="wrapper">

	<div id="words-container">
		
		<!-- insert content here -->

	</div>

	<input type="number" id="how_many" name="how_many" placeholder="How Many?">
	<button id="gen_words">Generate</button>

</div>


<script>
	
	jQuery('#gen_words').click(function() {
		var how_many = jQuery('#how_many').val();

		// This will get random words from the database~
		jQuery.post('<?= get_site_url() ?>/wp-json/mem-skills/v1/random_words/', { 'how_many': how_many }, function(data) {

			// variable 'data' is an object type variable, this is where the random words stored
			console.log(data);
			var el = '';
			jQuery.each(data, function( key, value ) {
				// variable 'key' is the index of an array inside an the object 'data' inside the current loop
				// variable 'value' is the value inside the current loop
				el += '<h5>' + value.words + '</h5>';

				// try logging this to the console~
				console.log(key);
				console.log(value.words); //words is from the database
			});
			jQuery('#words-container').html(el);
		});
	});




</script>