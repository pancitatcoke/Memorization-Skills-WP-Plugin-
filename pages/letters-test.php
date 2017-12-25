    
<div class="wrapper">
		<div class="container">
			<div class="grid">
				<p>When you click the start button, you will be presented with a series of letters and you will have 10 seconds to review them. After the time has elapsed you will be quizzed to see if you remember them. Do not worry about capitalization. It will take several tries to zero in on your limit.
					
						<br >Time limit: <b id="demo">10</b> seconds </p>
			</div>
		
            <button class="btn">Show Letters</button>

                <div id="">
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


