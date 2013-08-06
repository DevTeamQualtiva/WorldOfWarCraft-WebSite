<div id="layout-middle">
  <div class="wrapper">
    <div id="content">    
      <div class="add-game">
        <div class="section-left"> 
          <div class="section-title">
            <h2 class="subcategory">Game Management</h2>
            <h3 class="headline">Activate a Game</h3>
          </div>
          <div class="introduction">
            <p>Enter a realm game account name and password.</p>
          </div> 
          <div class="section-box border-5"> 
            <form method="post" action="/account/management/add-game.html" id="add-game"> 
              <p class="caption">
                <label for="gameAcountName">Enter Game Account Name</label>
              </p>
              <p class="simple-input required">       
                <input type="text" id="gameAcountName" name="gameAcountName" value="" class="input border-5 glow-shadow-2 inline-input" maxlength="320" tabindex="1" /> 
              </p>
              <p class="caption">
                <label for="gameAcountPass">Enter Game Account Password</label>
              </p>
              <p class="simple-input required">       
                <input type="password" id="gameAcountPass" name="gameAcountPass" value="" class="input border-5 glow-shadow-2 inline-input" maxlength="320" tabindex="1" /> 
              </p>    
              <fieldset class="ui-controls"> 
                <button class="ui-button button1 disabled" type="submit" disabled="disabled" id="add-game-submit">
                  <span>
                    <span>Create Game Account</span>
                  </span>
                </button>
                </fieldset> 
            </form> 
          </div>
        </div> 
        <div class="section-right">
          <div class="section-title">
            <h2 class="subcategory"></h2>
            <h3 class="headline">Purchase a Digital Game</h3>
          </div> 
          <div class="introduction">
            <p>If you don’t already have a game key (included with every game copy), you can purchase one by clicking the button below.</p>
          </div> 
          <div class="section-box border-5"> 
            <p class="caption">Purchase Digital Games for Immediate Download Here!</p> 
            <div class="section-buttons"> 
              <a class="ui-button button1" href="/account/management/get-a-game.html">
                <span>
                  <span>View Available Games</span>
                </span></a>
            </div> 
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>
