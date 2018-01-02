             function lettersOnly(input) {
                    var regex = /[^a-z]/gi;
                    input.value = input.value.replace(regex, "");

                }

                jQuery('#preview').bind("cut copy paste",function(e) {
                    e.preventDefault();
                });
                var myVar;
                var temp;

                // LETTERS TEST----------------------------------------------------
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
                    var nums = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                    var ret = '';
                    for (var i = 0; i < digit; i++) {
                        rndm = Math.floor((Math.random() * 26));
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

                
                