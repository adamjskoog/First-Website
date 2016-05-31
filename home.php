<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
	
		<meta charset="utf-8" />
		<!--According to https://developers.google.com/speed/docs/insights/ConfigureViewport, this allows for good scaling
			on mobile phones-->
		<meta name=viewport content="width=device-width, initial-scale=1">
		
		<!-- Website Title -->
		<title>Music Streaming Page</title>

		<!--CSS Link-->
		<link rel="stylesheet" href="style/style.css" type="text/css" />
		
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/mediaelement-and-player.min.js"></script>

		<script >
			
			
		</script>
		
		<!--Added the PHP execution methods for the python web scraping scripts-->
		
		<!--Execute web scraper script-->
		<!--<(?)php $mystring = exec('C:/Python27/Python.exe C:/xampp/htdocs/music-monkey-483/RollingStoneScraper.py');?>--->
	</head>

	<body>
   
		<div id="container">
		
		
			<div id="topBar">
				
				
				<div id="logodiv">
					
					<img src="images/monkey.jpg"/>
				</div>
				
				

				
				<div class="menu">
					<div id="view-select-div">
						<div id="view-select-text">View Preference</div>
						<button class="view-select-button" id="modal-view-select" onclick="changeView(this)">On Page</button>
						
					</div>
				</div>
				
				
			</div>
		</div>

		<div id="content">

			
			<div class="fixed-width">
			
				<div class="news-section-title"> 
					<p>Trending Music News</p>
				</div>
			
				<?php include 'MainSplashContent.php'?>
				
				
				<div class="add-playlist-container">
					
					<input name="searchTxt" type="text" maxlength="512" id="searchTxt" class="searchField"></input>
					<button id="update-spotify" onclick="spotifyUpdate()">Update</button>
				
				</div>
				
				<div class="spotify-container" >
					<button id="min-max-spotify" onclick="minMaxClick(this)">\/﻿</button>
					<iframe id="spotify-iframe" src="https://embed.spotify.com/?uri=spotify:user:1250464036:playlist:0EydAgPicNFmHLt8zAxLYD" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>
				</div>
				

				
				<div class= "main-content-horizontal-div">
				
				</div>
				
				<div class="news-section-title">
					<p>Top 100 Music Videos</p>
				</div>
				
				
				<?php include 'MusicVideoContent.php' ?>
				
				<div class= "main-content-horizontal-div">
				
				</div>
				
				<!-- The Modal -->
				<div id="myModal" class="modal">

				  <!-- Modal content -->
				  <div class="modal-content">
					<span class="close">x</span>
					<iframe class="rendered-content" id="modal-iframe" src=""></iframe>
				  </div>

				</div>
				
					<button class = "accordion"> Rolling Stone </button>
				<div class = "panel">
					<div class="music-news-container">
					
								<!-- Redesigning the news section to display 3 articles per row
									  The first column will display pictures, title and summary
									  The second and third column will display only large pictures and titles-->
								<?php include 'RollingStone.php';?>
				

					</div>
				</div>
				
			
				<button class = "accordion"> UK Music News </button>
				<div class = "panel">
					<div class="music-news-container">
						<?php include 'UKMusicNews.php'?>
					</div>
				</div>
			
			
				
				<button class = "accordion"> NME </button>
				<div class = "panel">
					<div class="music-news-container">
						<?php include 'NME.php'?>
					</div>
				</div>
				
			</div>
		</div>
		
		<script type="text/javascript"> 
		
			var viewSelect = 1;  /* View selection Key:
									On Page = 1
									Tab = 2
									Window = 3*/
		
				// Get the modal
			var modal = document.getElementById('myModal');
			var onPage = document.getElementsByClassName('view-select-button');

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];
		
			
			var modal_iframe = document.getElementById('modal-iframe');
			
			var video_iframe = document.getElementById('video-iframe');
			
			var previous_song;
			
			
			var updateText = document.querySelector('#searchTxt').value;
			var spotifyPrefix = 'https://embed.spotify.com/?uri=spotify:user:spotifydiscover:playlist:3KlDNBTyeyNNiw5WEntdXL';
			
			
			var minMaxSpotify = document.getElementById('min-max-spotify');
			var spotifyIframe = document.getElementById('spotify-iframe');
			var expanded = true;
			
			function spotifyUpdate()
			{
				
				console.log(spotifyPrefix + updateText);
				if(updateText != null)
				{
					spotifyIframe.src = spotifyPrefix.concat(updateText);
					console.log(spotifyPrefix.concat(updateText));
					
					
				}
				
				
			}
			
			
			function minMaxClick(myButton)
			{
				
				if(expanded)
				{
					spotifyIframe.style.height = '80px';
					minMaxSpotify.firstChild.data = 'Λ';
					expanded = false;
				}
				else{
					spotifyIframe.style.height = '380px';
					minMaxSpotify.firstChild.data = 'V';
					expanded = true;
				}
				
			}
			
			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
				modal.style.display = "none";
				modal_iframe.src = "";
				
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
					modal_iframe.src = "";
				}
			}
			
			function songItemClick(url)
			{
				
				if(previous_song)
				{
					previous_song.style.background = "#222222";
					previous_song
				}
				
				
				previous_song = url;
				
				
				video_iframe.src = url.title;
				url.style.background = "#434343";
				
			}
			
			function sliderPopUpClick(url)
			{
				if(viewSelect == 1)
				{
					modal_iframe.src = url;
					modal.style.display = "block";
				}
				else
				{
					var win = window.open(url, '_blank');
					
				}
				
			}
		
			function popUpClick(artURL)
			{
				
				if(viewSelect == 1)
				{
					modal_iframe.src = artURL;
					modal.style.display = "block";
				}
				else
				{
					var win = window.open(artURL.href, '_blank');
					
				}
				
			}
		
			/* Toggle between adding and removing the "active" and "show" classes when the user clicks on one of the "Section" buttons. The "active" class is used to add a background color to the current button when its belonging panel is open. The "show" class is used to open the specific accordion panel */
			var acc = document.getElementsByClassName("accordion");
			var i;

			for (i = 0; i < acc.length; i++) {
				acc[i].onclick = function(){
					this.classList.toggle("active");
					this.nextElementSibling.classList.toggle("show");
				}
			}
			
			function changeView(obj)
			{
				viewSelect = viewSelect * -1;
				
				if(viewSelect > 0)
				{
					obj.style.background = "#4CAF50";
				}
				else{
					
					obj.style.background = "#f44336";
				}
				
				
			}
			
			
			var slideIndex = 1;
			showSlides(slideIndex);

			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1}    
			  if (n < 1) {slideIndex = slides.length} ;
			  for (i = 0; i < slides.length; i++) {
				  slides[i].style.display = "none";  
			  }
			  for (i = 0; i < dots.length; i++) {
				  dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block";  
			  dots[slideIndex-1].className += " active";
			}
			

			$(function(){
				$('#audio-player').mediaelementplayer({
				alwaysShowControls: true,
				features: ['playpause','progress','volume'],
				audioVolume: 'horizontal',
				audioWidth: 450,
				audioHeight: 70,
				iPadUseNativeControls: true,
				iPhoneUseNativeControls: true,
				AndroidUseNativeControls: true
				});
			});
			
			
				
		</script>

		<div class="audio-player">
					<h2>KZUU Stream</h2>
					<audio id="audio-player" src="http://134.121.170.48:8000/;stream/1" type="audio/mp3" controls="controls"></audio>
		</div><!-- @end .audio-player -->
		
		<footer>

			
			<p>
				Created by Adam Skoog, Joey Quaranta and Jacob Krahling
			</p>
		</footer>
	</body>

</html>
