
<div class="wrapper">
	<h1 id="text"><br >Time limit: <b id="demo">10</b>s</h1>
	<div id="words-container">
		
		<!-- insert content here -->

	</div>

	<input type="number" id="how_many" name="how_many" placeholder="How Many?" style="visibility:hidden">
	<button id="gen_words">Generate</button>
	<input type="text" id="answers" style="visibility:hidden">
	<button id="submit">Submit</button>
	
	<input id="answer-container">

</div>

<script>
	
	var myVar;
	var temp;



	jQuery('#answer-container').hide();
	jQuery('#submit').hide();

	jQuery('#gen_words').click(function() {
		jQuery('#words-container').show();
		jQuery('#gen_words').hide();
		myVar = setInterval(function(){ myTimer() }, 1000);
		var how_many = jQuery('#how_many').val();

		// This will get random words from the database~
		jQuery.post('<?= get_site_url() ?>/wp-json/mem-skills/v1/random_words/', { 'how_many': how_many + 1}, function(data) {
			
			// variable 'data' is an object type variable, this is where the random words stored
			console.log(data);
			var el = '';
			var temp = data;
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

	function check_answer(answer) {
		for (var i = 0; i < digit; i++) {

			if (answer == temp[i])
				return true;

                }
	} 
	
	var counter= 9;

        function myTimer() {
            document.getElementById("demo").innerHTML = counter;
                        
            counter -= 1;
                        
            if (counter == -1)
				myStopFunction();
				
			if (counter <= 4)
				jQuery("#demo").css("color", "red");
        }

        function myStopFunction() {
			
			jQuery('#answer-container').show();
			jQuery('#submit').show();
            clearInterval(myVar);
			jQuery('#words-container').hide();
			jQuery('#answers').css(style="visibility:visible");
			
        }

		jQuery('#submit').click(function() {
            if (check_answer(jQuery('#words-container').val())) {
				alert("Nice"); 

			} else 
				alert("not nice");

        });




</script>