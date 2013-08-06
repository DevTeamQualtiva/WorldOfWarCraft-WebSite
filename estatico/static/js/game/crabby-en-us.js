//["normal","angry","sorry","surprised","inquisitive"]

CrabbyText = {

	dungeonHelper : [
		[
			"Hi! I'm Crabby!"
		],
		[
			"I want to make your dungeon experience as trouble-free as possible!"
		],
		[
			"I think we're going to be fast friends!<br/>I have a <em>good</em> feeling about you."
		],
		[
			{
				text : "I noticed you're reading about Crabby. Would you like help learning about Crabby?",
				mood : "inquisitive"
			}
		]
	],
	
	follow : [
		[
			{ 
				text : "Hey! Where are you going?<br/>Mind if I tag along?",
				option : {
					list : {
						"Not at all!" : "I KNEW we were going to be best pals!"
					}
				}
				
			}
		]
	],
		
	community : [
		[
			"If you want to get to know your World of Warcraft peers and talk shop, check out the official forums. I'd point, but this claw is really heavy.",
		],
		[
			"We're even in your new-fangled Tweetspace and Facester social networks! Check it out."
		],
		[
			"The most resplendant fan art will burst from its coccoon and become a beautiful Fan Wallpaper butterfly. Then we stick it to corkboard with pins and admire its majestic beauty."
		]
	],
	
	homepage : [
		[
			"You can log in to the World of Warcraft website with your Battle.net account to see a homepage personalized just for you! Try it!",
			{
				text : "Featured articles are shown above the article list. If you're nonplussed, that's a good place to start.",
				option : {
					list : {
						"Nonplussed?" : {
							text : "Yeah. People say that, right?",
							mood : "inquisitive",
							option : {
								list : {
									"No, I really don't think so" : {
										text : "I'll be honest, I've only ever read the expression, and I've been dying to use it in conversation.",
										mood : "sorry",
										option : {
											list : {
												"Nah, I think you got it." : { 
													text : "Ok, whew. I gotta admit, I was kinda nervous when the words were coming out of my mandible.",
													option : {
														list : {
															"Hold the phone, <b>MANDIBLE</b>?!" : {
																text : "Yeah, it's a jaw bone attached to the skull. Buddy, I can't help it if you can't pick up a book every now and then.",
																mood : "angry",
																option : {
																	list : {
																		"I don't even think crabs HAVE mandibles. I think that's just insects." : {
																			text : "Really?! I'm pretty sure we do. At least, I think that's what I learned in Deep Sea Crab health class.",
																			mood : "inquisitive",
																			option : {
																				list : {
																					"Yeah, I read it online" : {
																						text : "Well, then it HAS to be true, right?",
																						mood : "inquisitive"
																					},
																					"To be honest, I dunno." : "Look, can we talk about video games now? All this fish talk is making my thorax sweat."
																				}
																			}
																		},
																		"What are these books you speak of?" : {
																			text : "Har, har. Just because you have your skeleton on the inside of your body, you think you're so clever. <br/><br/><b style=\"color:red\">Crabby Disapproves -5</b>",
																			mood : 'angry'
																		}
																	}
																}
															},
															"What were we talking about?" : {
																text : "I dunno. Sports, I think.",
																mood : "inquisitive",
																option : {
																	list : {
																		"That seems pretty far-fetched." : "Crabs have a very limited short term memory. We're mostly concerned with looking unappetizing to sea otters.",
																		"Oh. Yeah ... how about that local sports team" : {
																			text : "Ahhh... Yessir, they sure are making the points this season.",
																			mood : "inquisitive",
																			option : {
																				list : {
																					"Ahh... yeah, especially that one guy with the legs" : {
																						text : "You betcha, boy. <br/> .... <br/> Look, can we stop talking about this? All this testosterone is making my giant, engorged eyes water.",
																						mood : "surprised",
																						option : {
																							list : {
																								"Ok, phew." : "... <br/> <br/> That weather sure is weather.",
																								"Talking about what?" : "Kid, I have no idea. Aren't you late for a battle at Tol Barad or something?"
																							}
																						}
																					}
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												},
												"Just dumb it down, ok?" : "Ok, boss."
											}
										}										
									},
									"Maybe in trashy romance novels" : {
										text : "Look, buddy, I don't come down to your job and make fun of your reading habits.",
										mood : "angry",
										option : {
											list : {
												"Whoa, whoa. Easy, Crabby." : "Ok, let's get back to what we were talking about.",
												"Stow the attitude, shellfish!" : {
													text : "You're not the boss of me, human! Crabby doesn't take orders from any fleshbags!",
													mood : "angry"
												}
											}
										}
									}
								}
							}
						}
					}
				}
			},
			"Did you know that there's a new screenshot of the day every day?"
		],
		[
			"The homepage of the World of Warcraft community site is full of things to do.",
			"Wow! If you look really closely at the background, you can spot the all-seeing-eye of the Illuminati hidden in the flames. I'm not even kidding."
		],
		[
			"That Deathwing sure is angry."
		],
		[
			"You and I are the only people who exist."
		]
	],
	
	blog : [
		[ 	
			"It looks like you're reading the blog; would you like me to look up some words for you?",
			 "Did you know you can leave comments on some blog entries? Try it out now!",
			 "If you really like what you read, you can click on the social sharing icons under the blog post and let all your friends know!",
			 "I love to read blog comments. Players often add great additional information and start interesting discussions.",
			 "You can find related blog articles on the right-hand side of the page. Check them out!",
			 { 
			 	text : "If you need help posting a comment, just ask!",
				option : {
					list : {
						"Help me, Crabby! " : "You can post a comment by logging in to the site with your Battle.net account and clicking the 'add a reply' button!"
					}
				}
			 },
			 "Did you know that the art of blogging goes all the way back to the ancient crustaceans of the Jurassic period? It's true!"
		],
		
		[ 
			"Posting a comment is easy! Just try it!",
			"Commenting on articles lets the authors know you care!",
			"Blogging makes me feel good.",
			"I like big blogs and I cannot lie."
		],
		
		[ 
			"The people who write these put a lot of time and effort into their work.",
			{ 	
				text : "That GhostCrawler sure is a handsome fella. <br/> ... <br/>  I wish I knew how to determine crab genders.",
				mood : "inquisitive"
			}
		],	
		[
			"I bet the posters would love to hear what you have to say!"
		],
		[
			"I know you're busy, but maybe you could take a moment out of your schedule and share some feedback?"
		],
		[
			{
				text : "Are you sure you don't want to post?",
				moood : "angry",
				option : {
					list : {
						"Crabby, relax!" : "Jeepers, I really flipped my shell back there.",
						"Ok, fine, I'll post!" : {
							text : "...I'm sorry. That was unfair.",
							mood : "sorry"
						}
					}
				}				
			}
		]
	],
		
	forum : [
		[
			/*
			(if they replied) I see that you replied to this thread. Very good response!
			*/
			 
			"So you like to read the forums; me too! Do you have a favorite forum to post in? Maybe check out some other forums as well. Variety is the spice of life!",
			"Make sure to upvote good, well-written, and constructive posts. Highly upvoted posts will be highlighted and stand out.",
			"Downvote rude or disrespectful posts; if a post receives enough downvotes, it will be hidden. You can help keep the forums civil!",
			"Remember that the other posters here are people, too. Like Plato said, \"Be kind; everyone you meet is fighting a hard battle.\" A little kindness can go a long way!",
			
			"Did you know you can check out other posters' characters on the Armory by clicking on their name?",
			"Hey, do you want to do some role-play? Let's go to the RP forum, the World's End Tavern!"
		],
		
		[
			"Many eons ago, the internet was a series of Bulletin Boards Systems and Usenet newsgroups. Users traded stories shareware, hopes and aspirations and connected with other like-minded individuals until the wee hours of the morning ... or until someone picked up the phone."
		],
		
		[
			{ 	
				text : "Do people still play Saga of the Purple Drakonid? I love that game.",
				mood : "inquisitive",
				option: {
					list : {
						"I dunno" : "Well they should. Write your local congressman.",
						"Maybe" : "That's the spirit. Keep hope alive!"
					}
				}
			}
		],
		
		[
			"I'm Commander Crabby, and this is my favorite forum on the website!",
			"Blizzard Employees will never ask you for your password. <br/> (We're really good at guessing)",
			"Report bugs you find on the website in the Website Bug Reports Forum. Unless it's about my me. I'm purely a figment of your imagination."
		],
		
		[
			{
				text : "If someone sends you an inappropriate whisper in game, report that player.",
				mood : "surprised"	
			},
			{
				text : "I was just minding my business in the high grass the other day when some hooligan kid tried to shove me into a plastic ball, mumbling something about needing to <em>\"Catch 'em all.\"</em>",
				mood : "sorry"
			}
		],
		
		[			
			{
				text : "Having one little claw and one big claw means you're a boy crab!",
				mood : "surprised"
			},
			
			{
				text : "If someone tries to convince you that it's possible for two people typing furiously on the SAME keyboard to prevent a hacker from breaching your firewall, slap them with your big claw!",
				mood : "angry"
			},
			
			{
				text : "If I told you that you had a nice shell, would you hold it against me?",
				mood : "inquisitive"
			},
			
			{ 
				text : "Do you read all of the patch notes updates? I try, but I get sleepy."
			}
		],
		[
			{
				text : "<span style=\"-webkit-transform: rotate(-180deg); -moz-transform: rotate(-180deg);\">My name's Crabby, are you my mother?</span>",
				mood : "sorry"
			},
			{ 
				text : "I'm selling these fine leather carapaces ... Wait, what's the plural of carapace? Carapae? Carpaceses?",
				option : {
					list : {
						"What?" : {
							text : "Hey, can you do me a favor and look up the plural form of carapace on your internets?",
							option : {
								list : {
									"Alright." : {
										text : "...<br/><br/>Well?",
										option : {
											list : {
												"Ok, I didn't actually look it up" : {
													text : "Oh, come on pal. I'm here busting my shell to serve up sweet pearls of bacon-flavored wisdom and you can't throw me one little knowledge nugget?",
													mood : 'angry',
													option : {
														list : {
															"It's nothing personal, I'm allergic to wikipedia." : "Oh, sorry; I can relate. I'm allergic to shellfish.",
															"Fine, fine, it's <b>carapaces</b>." : "Oh, really? That's pretty straight-forward. Thanks, dude."
														}
													}													
												},
												"It's ... ahhh ... <em>carapacians</em>" : {
													text : "Waaaaaait.... Isn't that the guy who wrote those games about punching dragons and being a space sherrif?",
													mood : 'inquisitive',
													option : {
														list : {
															"I dunno. Maybe." : "He sounds like a cool crab. <br/><br/> <b style=\"color:#47ace0\">Crabby approves +5</b>",
															"No, you're thinking of Vigo the Carpathian." : {
																text : "Is he a boss in Grim Batol?",
																option : {
																	list : {
																		"He should be." : "He's sounds tough. I better read up on strats so I can better assist during that encounter."
																	}
																}
															}
														}
													}
												}
											}
										}										
									},
									"Why don't you do it?" : {
										text : "My network access is limited at work. I was spending too much time farming."
									}
								}
							}										
						},
						"No one cares, Crabby." : "No one <em>covered in meat</em> cares."
					}
				}
			}
		]
		
	],
	
	post : [
		[
			{
				text : "It looks like you're trying to reply to this thread. Would you like help?",
				mood : "inquisitive",
				option : {
					list : {
							"Get help with replying to the thread" : {
								text : "Type your response in the field. You can use the tools above the reply window to format your response. When you are finished, click 'submit'. <br/><br/>Was this information helpful?",
								option : { 
									list : {
										"Yes" : { text: "Whew! I was totally winging it, too.", mood : "sorry" },
										"No" : { text : "Well what do you expect from me?! I HAVE GIANT CLAWS FOR HANDS!", mood : "angry" }
									}
								}
							},
							"Just reply to the thread without help" : "Good luck on your endeavors, gentle-person!"
					}
				}
			}
		]
	],
	
	newThread : [
		[
			{
				text : "It looks like you're trying to create a new topic! Would you like help?",
				mood : "inquisitive",
				option : {
					list : {
							"Get ideas" : {
								text : "Choose from this array of potential topics:",
								option : { 
									list : {
										"Crabs" : { 
											text: "<b>Suggested Text:</b><br/>Crabs are the best class, but the changes on the PTR are mortifying. If you don't believe me, my spreadsheet will corroborate my fears. Blue post, please..", 
											option : {
												list : {
													"I love it" : "Crabby loves you, too.",
													"Great work, Crabby!" : "That's how Crabby rolls."
												}
											}
										},
										"Crustaceans" : { 
											text : "<b>Suggested Text:</b><br/>My neighbor's cat is orange. His name is Percy. I like orange cats because they are friendly. My neighbor once gave me a ride to school. He's cool. His cat is cool, too." , 
											option : {
												list : {
													"Perfect" : "I do my best.",
													"I don't like cats" : "Really? :("
												}
											}
										},
										"Undersea life" : {
											text : "<b>Suggested Text:</b><br/>Sea anemones are a group of water-dwelling, predatory animals of the order Actiniaria; they are named after the anemone, a terrestrial flower. Sea anemones are classified in the phylum Cnidaria, class Anthozoa, subclass Zoantharia.[1] Anthozoa often have large polyps that allow for digestion of larger prey and also lack a medusa stage.[2] As cnidarians, sea anemones are closely related to corals, jellyfish, tube-dwelling anemones, and Hydra. Nerf Mages.",
											option : {
												list : {
													"My teacher's going to love this" : "Don't forget to cite your sources.",
													"Isn't that copy/pasted from Wikipedia?" : "Well, yeah. You get what you pay for."
												}
											}
										},
										"Nerf Warlocks" : {
											text : "<b>Suggested Text:</b><br/>Warlocks are too awesome. Summoning the power of mighty demons, reeking of hot brimstone and rippling with fury is too over-powered. Please reign in these fel-wielding gods among men. Also, please give them a sweet demonic flying mount.",
											option : {
												list : {
													"GREAT!" : "Some of my best work, I must say.",
													"SWEET!" : "Chalk one up for the crabmeister."
												}
											}
										}
									}
								}
							},
							"Nah, I got this one" : "Ok, I'll just sit here and watch"
					}
				}
			}
		]
	],

	
	media : [
		[
			"Oh man, look at all those screenshots! Wouldn't it be cool to see a shot of your character up there? Submit your screenshots today!",
			"Those comics are so funny. Do you have a favorite? I like the one with Arthas in it. ",
			"Did you know you can add your comments to media pages as well? Discuss your favorite screenshots, artwork, and movies with your fellow players!",
			"So many wallpapers, it\'s hard to choose just one! Which one do you like best?",
			{ 
				text : "It seems like you're thinking about submitting fan art. Want some help?",
				mood : "inquisitive",
				option : {
					list : {
						"Sure!" : "• First, draw your subject in an action pose. <br/>• Next, use your amazing human hands to draw a sword or hammer, preferably in mid-swing.<br/>• And you're done! Well, maybe. The weapon could be a little bigger.",
						"Crabs can draw?" : {
							text : "I've been known to dabble.",
							option : {
								list : {
									"But you don't even have hands!" : {
										text : "What do you think these giant apendages are?",
										option : {
											list : {
												"Pincers?" : {
													text : "Well, yeah. They are pincers. I like to pinch.",
													option : {
														list : {
															"Crabby, you're wierd." : {
																text : "I get that a lot.",
																mood : "inquisitive"
															}
														}
													}													
												},
												"Tuning forks?" : "Wow, you're right. They DO look like tuning forks. <br/>...<br/> And they can touch everything but themselves."
											}
										}										
									},
									"JPG or get the heck out." : {
										text : "C'mon, don't put me on the spot like that.",
										option : {
											list : {
												"Cough it up." : {
													text : "Look, I'm very sensitive about my art",
													option : {
														list : {
															"You know what else is sensitive? Said crab dancing in a pot of boiling water." : {
																text : "Nobody puts Crabby in a corner.",
																mood : "angry"
															},
															"C'mon crabby. If it's really good, I'll put it up on the fridge." : {
																text : "Alright check it out: <br/> <center><img src=\"/wow/static/images/game/crabby/crabby-doodle.jpg\"/></center>",
																mood : "surprised"
															}
														}
													}													
												}
											}
										}
									}		
								}
							}
						}
					}
				}				
			}
		],
		
		[
			{
				text : "Would you like wallpapers sized for your revolutionary tablet device?",
				mood : "inquisitive", 
				option : { 
					list : {
						"Yes" : "Oh boy, me too. That would be exquisite.",
						"No" : "Oh. That's fine. Let me know when you want to live <em>in the <b>future</b></em>."
					}
				}
			}
		]

	],
	
	game : [
		[
			"It looks like you're reading more about World of Warcraft; would you like me to make you some waffles while you read? Carrots are good, too. HAHAHAHA.",
			"There are a total of fifteen \"Easter Eggs\" in the Beginner's Guide. Can you find them all?",
			"Did you know that the Expanded Universe section contains a complete history of the Warcraft Universe? You should check it out!",
			"Did you read those leader short stories in the Expanded Universe section? Wasn't \"Lord of His Pack\" great? I also really liked the Gallywix and the Garrosh stories. Which one did you like best?",
			"If you're thinking about starting a new character of a class you haven\'t played yet, the Classes section provides a good basic overview of each class. You can learn a lot of interesting facts you may not have known about each race in the Races section. Have you checked that one out yet?"
		],
		[
			"What's your favorite class?<br/>Mine is ALL OF THEM!<br/>hehehe!"
		]
	],
	
	services : [
		[
			"You are so lucky that you have opposable thumbs and can use a cellphone. Curse these pincers!",
			"Need some help? You can contact our friendly support staff by clicking the support button!",
			"WoW Remote can be used to access the auction house from your web browser or mobile device! You can become filthy rich from virtually <em>anywhere</em>!"
		],
		[
			"Our support staff can help you change or recover your password, set up a new account, transfer your characters, report bugs, resolve video card issues, learn about World of Warcraft, keep your account secure, and replace a flat tire."
		],
		[
			"Support can help you resolve problems with other players, reinstall the game, beat Sargeras, get unstuck if you're trapped, form groups, invite new players to join the game, use parental controls, and more!",
			"Free yourself from the shackles of physical media, and upgrade your games digitally! Every year, dozens of crabs are trapped in the spindle hole of discarded optical media."
		]
	],
	
	item : [
		[
			"Put items on your body to prevent swords from going through it!"
		],
		[
			"I've never seen this one in person."
		]
	],
	
	character : [
		[ 
			"Players are the life blood of World of Warcraft.",
		],
		[ 
			"I think I know that guy."			
		],
		[ 
			"Players are a wonderful, varied species of carnivores." 
		],
		[ 
			"" 
		],
	],
	
	loggedOut : [
		{
			text : "I noticed you're not logged in. Did you forget your password?",
			mood : "inquisitive",
			option : {
				list : {
					"No" : "If you're having trouble logging in, click \"can't log in\" for help!",
					"Yes" : {
						text : "Have you tried \"password?\"",
						option : {
							list : {
								"No" : "I have a good feeling about that one.",
								"Yes" : {
									text: "How about \"password1?\"",
									option : {
										list : {
											"No" : "Don't give up hope. There's only like eleventy-billion possible combinations.",
											"Yes" : "That's not a secure password. AT ALL. You should change it immediately!"
										}
									}									
								}
							}
						}
					}	
				}
			}
		}
	],
	
	weekDay : {
		d5 : [ 
			{
				text : "Happy Friday! I woke up this morning with this song stuck in my head...",
				mood : "inquisitive",
				option : {
					list : {
						"Oh Crabby, no!" : "<a href=\"javascript:;\" onclick=\"window.open('http://www.youtube.com/watch?v=CD2LRROpph0')\">Oh Crabby, yes!</a>"
					}
				}
			}
		]
	},
	
	generic : [
		[
			
		],
		[
		
		],
		[
			
		]
	]

}


if(Crabby.user.character) {
	CrabbyText.generic[0] = CrabbyText.generic[0].concat([
		{ 
			text : "Looks like your " + Crabby.user.character.className + ", "+ Crabby.user.character.name +", is coming along nicely. " + (
					(Crabby.user.character.level >= 85)?"Level "+ Crabby.user.character.level +"! Now you're playing in Crabby's house.":
					 "C'mon pal, "+ (85 - Crabby.user.character.level)+" more level"+ ((85 - Crabby.user.character.level > 1)?'s':'') +" and you'll be a big "+((Crabby.user.character.gender == 0)?"boy":"girl")+"!"
				 )
		}
	])
}

if(Crabby.item){
	
	if(Crabby.item.id == 44333) {
		CrabbyText.item[0] = [{
			text : "So THAT'S where I put them!",
			mood : "surprised"
		}]
							 
	}
	if(Crabby.item.qualityId == 5) {
		CrabbyText.item[0] = [ 
			{ 
				text : "Just let that name roll off the tongue: <b>" + Crabby.item.name +"</b>. It even sounds legendary.",
				mood : "surprised"
			}
		]
	}
	
	if(Crabby.item.qualityId > 1) {
		CrabbyText.item[0].push(
			"Looks like hunter loot to me!"
		)
	}
		/*
	(if item drops from a Cataclysm boss) (angry) Darn {bossname}, this never drops for me!
	(if item drops from a non-cata boss) I had this back in the day. Ah, the memories…
		*/
}

if(Crabby.forum) {
	
	if(Crabby.forum.classForum){
			CrabbyText.forum[0].push(
				"The class forums are a great place to learn more about how to play your class!"
			)
	}
	
	if(Crabby.forum.dungeonForum){
			CrabbyText.forum[0].push(
				"My favorite forum, Dungeons and Raids! I look forward to assisting you in this area in-game!"
			)
	}
	
	if(Crabby.forum.rpForum){
			CrabbyText.forum[0] = CrabbyText.forum[0].concat([
				"This is the Off-Topic Forum, where we encourage you to post about anything on your mind not related to World of Warcraft. Oh wait... I think I'm in the wrong place.", 
				"I put on my robe and wizard's hat!"
			])
	}

	if(Crabby.topic) {
		
		//Add in topic specific speech 
		CrabbyText.forum[0] = CrabbyText.forum[0].concat([
			"This thread has been seen by "+ Crabby.topic.totalViews +" people, or approximately " + (Crabby.topic.totalViews*2) +" eyeballs, give or take a cyclops.",
			"I'm glad that "+ Crabby.topic.user +" made this topic. They raise some great points, don't you agree?",
			{
				text : "It looks like you're reading a forum thread; would you like me to give you a brief summary?",
				mood : "inquisitive",
				option : {
					list : {
						"Sure" : "From what I gather, "+ Crabby.topic.user +" posted some stuff about something interesting. " + ((Crabby.topic.postCount > 1)?"Then "+(Crabby.topic.postCount-1) +" people said some things in response":"But, but alas, no one cared."),
						"... Oh, alright" : { 
							text : "You don't seem convinced. I've got plenty of important things I could be doing if you're just going to phone it in.",
							mood : "inquisitive",
							option : {
								list : {
									"C'mon Crabby, don't be like that" : { 
										text : "I... just need time",
										mood : "sorry"
										
									},
									"No, really, it's cool" : "I forgot what we were talking about."
								}
							}
						}
					}
				}
			},
			{ 
				text : "It looks like you're trying to read a forum thread. Would you like help?",
				option: {
					list : {
						"Get help with reading the thread" : {
							text : "Oh wow – almost no one picks this one! How exciting! Ok, pull it together Crabby, it's show time!",
							option : {
								list : {
									"How can you help?" : "Great question! I'm not quite sure actually. Tell you what, I'll just sit here and keep you company while you read it!",
									"I changed my mind." : {
										text : "Oh, ok. I'll be here if you need me.",
										mood : "sorry"
									}
								}
							}
						},
						"Just read the thread without help" : "Oh...ok... Crab ya later!"
					}
				}
			}
		]);
		
		if( Crabby.topic.postCount > 400 ){
			CrabbyText.forum[0].push(
				"This thread is over 20 pages. Remember, if you feel that a thread deserves to be stickied, click the 'request sticky' link on the top right!"
			)
		}
		
		if(Crabby.topic.locked){
			CrabbyText.forum[0].push(
				"This topic is locked! You can look, but don't touch."
			)
		}
		
		if(Crabby.topic.sticky){
			CrabbyText.forum[0].push(
				"This topic is sticky. While the term may sound funny, this topic is, in fact, very important."
			)
		}
		
	}
}

if (Crabby.character){
	
	CrabbyText.character[0] = CrabbyText.character[0].concat([
			(Crabby.character.guild)?Crabby.character.name + " is in the " + Crabby.character.guild + " guild.<br/>I wonder if they are recruiting.":Crabby.character.name + " isn't in a guild yet. Joining a guild is a great way to meet new people.",
		"If you meet nice players like " + Crabby.character.name + " here, be sure to send them a friend request so that your friendship can blossom."
	])
	
	CrabbyText.character[1] = CrabbyText.character[1].concat([

		Crabby.character.raceName + "s are definitely the most " + ((Math.floor(Math.random() * 2) == 0)?"under":"over") + "-represented race.",
		Crabby.character.className + "s are definitely the most " + ((Math.floor(Math.random() * 2) == 0)?"under":"over") + "-represented class.",
		Crabby.character.className + "s are definitely getting " + ((Math.floor(Math.random() * 2) == 0)?"nerfed":"buffed") + " next patch."
	])

	
	if(Crabby.character.averageItemLevel > 333) {
		CrabbyText.character[0].push({ 	
			text : "This player is ready for Cataclysm heroic dungeons!",
			mood : "surprised"
		})
	}

}


