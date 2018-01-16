<div class="wrapper">
<div class="container">
    <div class="grid">
                <h1 id="text"><br >Time limit: <b id="demo">10</b>s</h1>
                <h4 id="score-text">The numbers you have remembered: </h1> <h3 id="score"></h3>
    </div>

    <button class="btn">Show Numbers</button>

    <div id"preview-container">
          <input id="preview" disabled>
    </div>
    
    <div id="answer-container" style="display: none;">
          <input id="answer" style="text-transform: uppercase" onkeyup="lettersOnly(this)">
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
    background: #dfc15e;
    display: grid;
    
}

#score-text {
    display: none;
}

.grid {
    background: #dfc15e !important;
}

body {
    text-align: center;
}

.container>div {
    background: #dfc15e;
    padding: 1em;
}

#text{
    padding: 0px 0px 120px 0px;
}
.container {
    display: grid;
    grid-template-columns: 100%;
    grid-column-gap: 10px;

}

h1 {
    font-weight: bold;
    color: #f5f5f5;
    font-size: 70px;
  }

.container>div:nth-child(odd) {
    background: #dfc15e;
}

.btn, #btn2, #btn3 {
    width: 300px;
    background: #3a3a3a;
    color: #f5f5f5;
    text-decoration: none;
    padding: 12px;
    border: 1px solid white;
    margin: 0 auto;
}

#btn2, #btn3 {
    width: 150px; 
    margin: 0 auto;
}

.btn, #btn2, #btn3 {border-radius: 12px;}

.btn:hover {
    border: 1px solid white;
    background: #dfc15e;
    color: white;
}

#btn2:hover {
    background: #dfc15e;
    color: white;
}

#btn3:hover {
    background: #dfc15e;
    color: white;
}
		</style>


            <script>
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
                    jQuery('#score-text').hide();
                    jQuery('#score').hide();
                    jQuery('#alert').hide();
                     jQuery(this).hide();
                     myVar = setInterval(function(){ myTimer() }, 1000);
                    jQuery('#preview').val(
                        gen_num(jQuery(this).val().length)
                    );
                });

                var digit = 3;
                var fd = digit + 1;
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
                        jQuery('#answer-container').toggle();
                        jQuery('#answer').val('');
                    }


                    jQuery('#btn2').click(function() {
                        if (temp.toUpperCase() == jQuery('#answer').val().toUpperCase()) {
                            jQuery('#alert').html('Correct Answer').css({color:'green'}).show();
                            jQuery('#answer-container').toggle();
                            jQuery('#preview').toggle();
                            jQuery('.btn').toggle();
                            jQuery('#demo').html('10');
                            counter = 9;
                        } else
                        jQuery('#alert').html('Wrong Answer').css({color:'red'}).show();

                        if (digit >= 4) {
                            jQuery('.btn').html('Next Level');
                        }

                        if (digit >= 10) {
                        jQuery('#demo').html('20');
                        counter =19;
                        }
                    });


                    jQuery('#btn3').click(function() {
                        var score = jQuery('#preview').val().length;

                        
                        if (score == fd)
                            alert("You didn't even try!");
                        jQuery('#score').html(score).show();
                        jQuery('#score-text').show();
                        jQuery('#answer-container').toggle();
                        jQuery('#preview').toggle();
                        jQuery('.btn').html('Show Letters').toggle();
                        jQuery('#demo').html('10');
                        counter = 9;
                        digit = 3;



                    });

                
                
            </script>
