<section name="Tete" style="height:3.13em;">
	<div class="tete" align="center">
		<div style="max-width:76em;min-width:46em;">
			<div style="float:left;">
				<div id="facebook" class="icon">
					<a target="Facebook" title="Samuel sur Facebook" href="https://www.facebook.com/samuel.beaudoin.758"><img src="images/facebook.png" alt="Facebook"/></a>
				</div>
				<div id="twitter" class="icon">
					<a target="Twitter" title="Samuel sur Twitter" href="http://www.twitter.com/samylots/"><img src="images/twitter.png" alt="Twitter"/></a>
				</div>
				<div id="twitch" class="icon">
					<a target="Twitch" title="Samuel sur Twitch.tv" href="http://www.twitch.tv/samylots/"><img src="images/twitch.png" alt="Twitch"/></a>
				</div>
				<div id="deviantart" class="icon">
					<a target="Deviant Art" title="Samuel sur Deviant Art" href="http://www.samylots.deviantart.com"><img src="images/deviantart.png" alt="DeviantArt"></a>
				</div>
				<div id="youtube" class="icon">
					<a target="Youtube" title="Samuel sur Youtube" href="http://www.youtube.com/user/MrSamylots/"><img src="images/youtube.png" alt="Youtube"/></a>
				</div>
				<div class="separateur" >
					<img src="images/separateur.png" alt="|"/>
				</div>
			</div>
			<div style="margin:0px;display:block;">
				<div class="menu2">
					<a href="index.php"><h1 class="headtext">Invylots</h1></a>
				</div>
				<div class="menu">
					<form action="search.php" target="Frame" method="post">
							<input type="search" name="search"/>
							<div class="menu">
					    	<input type="submit" class="button2" value="rechercher" />
					    	</div> 	
					</form>
				</div>
			<div style="float:right;display:inline-block;margin:0px;">
				<div class="separateur" >
					<img src="images/separateur.png" alt="|"/>
				</div>
				<div class="menu">
					<a href="index.html"><p class="headtext"> <?php echo $_SESSION["user"]; ?></p></a>
				</div>
				<div class="menu">
					<a href="deconnection.php" class="button2">Deconnecter</a>
				</div>

					
			</div>
		</div>
	</div>
</section>