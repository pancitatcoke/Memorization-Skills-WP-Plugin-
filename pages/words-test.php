
<div class="wrapper">
	<h1 id="text"><br >Time limit: <b id="demo">10</b>s</h1>
	<div id="words-container">
		
		<!-- insert content here -->

	</div>

	<input type="number" id="how_many" name="how_many" placeholder="How Many?" style="visibility:hidden">
	<button id="gen_words">Generate</button>
	<input type="text" id="answers" style="visibility:hidden">
	<button id="submit">Submit</button>
	
	<input id="answer-container" onkeyup="lettersOnly(this)">

</div>

<script>
	
	var myVar;
	var temp;

	jQuery('#answer-container').hide();
	jQuery('#submit').hide();

	jQuery('#gen_words').click(function() {
		jQuery('#gen_words').hide();
		myVar = setInterval(function(){ myTimer() }, 1000);
		var how_many = jQuery('#how_many').val();

		// This will get random words from the database~
		jQuery.post('<?= get_site_url() ?>/wp-json/mem-skills/v1/random_words/', { 'how_many': how_many + 1}, function(data) {

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

	temp = el;

	var temp = null;
		$.get(url, function(d){
   		if(temp == null){
     		temp = el;
   		}
   		if(temp.something > el.something){
      		//do something else
   		}
		});	
	
	var counter= 9;

        function myTimer() {
            document.getElementById("demo").innerHTML = counter;
                        
            counter -= 1;
                        
            if (counter == -1)
                myStopFunction();
        }

        function myStopFunction() {
			jQuery('#answer-container').show();
			jQuery('#submit').show();
            clearInterval(myVar);
			jQuery('#words-container').hide();
			jQuery('#answers').css(style="visibility:visible");
        }

		jQuery('#submit').click(function() {
            if ( temp == jQuery('#answer-container').val()) {
				alert("Nice"); 

			} else 
				alert("not nice")
            //     jQuery('#alert').html('Correct Answer').css({color:'green'}).show();
            //     jQuery('#answer-container').fadeToggle(2000);
            //     jQuery('#preview').fadeToggle(2000);
            //     jQuery('.btn').fadeToggle(2000);
            //     jQuery('#demo').html('10');
            //     counter = 9;
            // } else
            //     jQuery('#alert').html('Wrong Answer').css({color:'red'}).show();
                           
            // if (digit >= 10) {
            //     jQuery('#demo').html('20');
            //     counter =19;
            // }

        });




</script>