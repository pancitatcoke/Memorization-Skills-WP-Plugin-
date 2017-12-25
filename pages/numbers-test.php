 <div class="wrapper">
		<div class="container">
			<div class="grid">
				<p>When you click the start button, you will be presented with a series of numbers and you will have 10 seconds to review them. After the time has elapsed you will be quizzed to see if you remember them. Do not worry about capitalization. It will take several tries to zero in on your limit.
					
						<br >Time limit: <b id="demo">10</b> seconds </p>
			</div>
		
            <button class="btn">Show Numbers</button>

                <div id="">
                      <input id="preview" disabled>
                </div>
                
                
                <div id="answer-container" style="display: none;">
                      <input id="answer" style="text-transform: uppercase" onkeyup="numbersOnly(this)">

                        <button id="btn2">Submit</button>
                        <button id="btn3">Give-up</button>
                        <br>
                        <div id="alert">
                             
                        </div>

                </div>

			</div>
			</div>

		<style>

            #answer-container {
                margin: 0 auto;
                padding: 10px;
            }

			.wrapper {
				background: #eee;
				
			}

			body {
				background: gray;
				text-align: center;
			}

			.container>div {
				background: #eee;
				padding: 1em;
			}

			.container {

				display: grid;
				grid-template-columns: 100%;
				grid-column-gap: 10px;

			}

			.container>div:nth-child(odd) {
				background: #eee;
			}

			.btn {
				display: inline-block;
				background: gray;
				color: black;
				text-decoration: none;
				padding: 0.5em 2em;
				border: 1px solid white;
				margin: .5em 0;

			}

			.btn:hover {
				background: #333;
				color: black;
			}
		</style>


            <script>
                //  jQuery(function() {

                //     jQuery('.btn').on('click', function() {
                //         jQuery('#answer').html(Math.floor((Math.random() * 900) + 100));
                //       }); 
                //   });


                // NUMBERS TEST-------------------------------------------------------
                // jQuery('.btn').click(function() {
                //     jQuery('#answer').val(
                //         gen_num(jQuery(this).val().length)
                //     );
                // });

                // var digit = 0;
                // function gen_num(len = 0) {
                //     digit += 1;
                //     var nums = '1234567890';

                //     var ret = '';
                //     for (var i = 0; i < digit; i++) {
                //         rndm = Math.floor((Math.random() * 10));
                //         ret = ret + nums[rndm];
                //         // console.log(nums, rndm, ret);
                //     }
                //     console.log(nums, rndm, ret);
                //     return ret;
                // }

                function numbersOnly(input) {
                    var regex = /[^0-9]/g;
                    input.value = input.value.replace(regex, "");

                }

                jQuery('#preview').bind("cut copy paste",function(e) {
                    e.preventDefault();
                });
                var myVar;
                var temp;

                // NUMBERS TEST----------------------------------------------------
                jQuery('.btn').click(function() {
                    jQuery('#alert').hide();
                     jQuery(this).hide();
                     myVar = setInterval(function(){ myTimer() }, 1000);
                    jQuery('#preview').val(
                        gen_num(jQuery(this).val().length)
                    );
                });

                var digit = 3;
                function gen_num(len = 0) {
                    digit += 1;
                    var nums = '1234567890';

                    var ret = '';
                    for (var i = 0; i < digit; i++) {
                        rndm = Math.floor((Math.random() * 10));
                        ret = ret + nums[rndm];

                    }
                    console.log(nums, rndm, ret);
                    temp = ret;
                    return ret;


                }

                    var counter= 9;

                    function myTimer() {
                        document.getElementById("demo").innerHTML = counter;
                        
                        counter -= 1;
                        
                        if (counter == -1)
                            myStopFunction();
                    }

                    function myStopFunction() {
                        clearInterval(myVar);
                        jQuery('#preview').hide();
                        jQuery('#answer-container').fadeToggle();
                        jQuery('#answer').val('');
                    }


                    jQuery('#btn2').click(function() {
                        if (temp.toUpperCase() == jQuery('#answer').val().toUpperCase()) {
                            jQuery('#alert').html('Correct Answer').css({color:'green'}).show();
                            jQuery('#answer-container').fadeToggle(2000);
                            jQuery('#preview').fadeToggle(2000);
                            jQuery('.btn').fadeToggle(2000);
                            jQuery('#demo').html('10');
                            counter = 9;
                        } else
                            jQuery('#alert').html('Wrong Answer').css({color:'red'}).show();
                           
                        if (digit == 14) {
                            jQuery('#demo').html('20');
                            counter =19;
                        }

                    });


                    jQuery('#btn3').click(function() {
                        jQuery('#answer-container').fadeToggle();
                        jQuery('#preview').fadeToggle();
                        jQuery('.btn').fadeToggle();
                        jQuery('#demo').html('10');
                        counter = 9;
                        digit = 3;



                    });

                
                
            </script>
