    
<div class="wrapper">
	<div class="container">
		<div class="grid">
                    <h1 id="text"><br >Time limit: <b id="demo">10</b>s</h1>
                    <h4 id="score-text">Your score is</h1> <h3 id="score"></h3>
		</div>
	
        <button class="btn">Show Letters</button>

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


