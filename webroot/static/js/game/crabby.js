
$(function() {
	var crabNest = $('#crabby-home')
	if(crabNest.length > 0)
		Crabby.init('#crabby-home')
	else 
		Crabby.init()
});

var Crabby = {
	/* This isn't going to be annoying AT ALL */

	DATE : {},
	knownLocations : ['homepage','blog','forum','media','game','services','item','character','dungeonHelper','community'],

	init : function(target) {
		
		
		var locArray = window.location.href.replace(/http(s?):\/\//,"").split('/'),
			location = locArray[3];
			
		if(location == '')
			location = 'homepage';
		else if(locArray[4] == "dungeon-helper") 
			location = "dungeonHelper"
			
		var crabbySeen = Cookie.read('crabbySeen')
		if(!crabbySeen){
			return // Dungeon Helper page not visited
		}
		
		$(target||'body').append($("<div id='crabby-shell' data-idx='0'><div id='crabby-swf'><span class='png-fix'><img src='/wow/static/images/game/crabby/crabby.png'/></span></div></div>"))
		$('#crabby-shell').append("<div id='crabby-bubble'><div id='crabby-text-close'><a href='javascript:;' onclick='Crabby.textClose()'>x</a></div><div id='crabby-arrow'/><div id='crabby-text'/><div id='crabby-opt'/></div>").children(':first').hide()
		
		if( $.inArray(location,Crabby.knownLocations) > -1 ) { // Recognized page
			if(CrabbyText[location]) { // Haz dialog
				Crabby.speech = CrabbyText[location]
				if(location != 'dungeonHelper'){ // Only use original dialog for dungeonHelper page
					var additionalSpeech = []
					
					if (!Crabby.user.loggedIn) 
						additionalSpeech.push(CrabbyText.loggedOut)
					
					if (Crabby.DATE.weekday == 5) 
						additionalSpeech.push(CrabbyText.weekDay.d5)
					
					$.each(additionalSpeech, function(idx,val){ 
						Crabby.speech[0] = Crabby.speech[0].concat(val)
					})
					
					
					$.each(CrabbyText.generic, function(idx,val){  // Add in generic text for all levels available
						if(Crabby.speech[idx])
							Crabby.speech[idx] = Crabby.speech[idx].concat(val)
						else 
							Crabby.speech[idx] = val
						
					})
					if(crabbySeen == 'init'){
						if(CrabbyText.follow)
							Crabby.speech[0] = CrabbyText.follow[0]
						Cookie.create('crabbySeen','oldpals',{path:Core.baseUrl, expires: 8760})
					}
				}

				Crabby.timer(0,1000)
			}
		}
		
		

		
		swfobject.embedSWF("/wow/static/images/game/crabby/crabby.swf", "crabby-swf", "370", "250", "9", Flash.expressInstall, {}, { menu: false, wmode: "transparent" });
		$('#crabby-swf').bind("contextmenu", function(e) {
			$('#crabby-swf')[0].playAnim('sorry')
			alert("You can't close me.")
			
			return false;		
		});

		var postField = $('#post-edit textarea')
		if(postField.length > 0 && !Crabby.newThread){
			postField.bind('click',function(){ Crabby.say(Crabby.rand(CrabbyText.post[0])) })
		}
		if(postField.length > 0 && Crabby.newThread){
			postField.bind('click',function(){ Crabby.say(Crabby.rand(CrabbyText.newThread[0])) })
		}
		//$('#crabby-swf')[0].playAnim('inquisitive')
	},
	
	randRange : function(min, max) {
	    var randomNum = Math.floor(Math.random() * (max - min + 1)) + min;
    	return randomNum;
	},
	
	rand : function(someArray) {
    	var randomElement = Crabby.randRange(0,someArray.length-1)
	    return someArray[randomElement];
	},
	
	textClose : function(){
		$('#crabby-bubble').slideUp('fast');
		$('#crabby-swf')[0].playAnim('normal');

		Crabby.timer($("#crabby-shell").data('idx'))
		if (typeof _gaq != "undefined") {
			_gaq.push([
				'_trackEvent',
				Core.project +' - Crabby',
				'Close',
				'action'
			]);
		}
	},
	
	timer : function(idx,time){

		var time = time||Crabby.randRange(2000,4000)
		var crabTimeout = setTimeout( function() { Crabby.getSaying(idx) }, time )
	},
	
	getSaying : function(idx){
		var next = (idx+1 >= Crabby.speech.length)?0:idx+1
		$("#crabby-shell").data('idx',next)
		Crabby.say( Crabby.rand(Crabby.speech[idx]))
		//, { next : "javascript:Crabby.getSaying("+next+")" }
	},
	
	speech : [
		//Placeholder speech
	],
	
	say : function( text, option ){
		var mood, speech,
			crabby = $('#crabby-swf')[0],
			option = option||{};
				
		if (typeof text == "string") {
			mood = "normal";
			speech = text;
		}
		else if (typeof text == "object") {
			mood = text.mood;
			speech = text.text
			if(text.option){
				if(option) { $.extend( option, text.option ); }
				else { option = text.option; }
			}
		}
		
		$('#crabby-text').html(speech)
		
		
		
		if( option.list ){
			Crabby.listText = [];
			
			var list = $('<ul/>'),
				idx = 0;
				
			for(key in option.list){
				Crabby.listText.push(option.list[key])
				var anchr = $('<a href="javascript:;"></a>').attr({ onclick : "Crabby.say(Crabby.listText["+ idx++ +"])", href : "javascript:;" }).html(key)
				list.append($('<li/>').append(anchr))
			}
			
			$('#crabby-text').append(list)
			
		}

		$('#crabby-opt').empty();		
		
		if(option){
			for(x in option){
				if(x == 'next')
					$('<a class="next"/>').text('Next >').attr('href',option.next).appendTo('#crabby-opt')
			}
		}
		
		if(crabby.playAnim){
			crabby.playAnim(mood);
			crabby.playSound();
			
		}
			
		$('#crabby-bubble').slideDown('fast');
	}
};