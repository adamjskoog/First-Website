<html>

<?php
										
			$file = fopen("ukmusicnews.csv","r");
			$firstArrEnt = True;
			$articleCounter = 1;
										
			echo "<div class='slideshow-container'>";
			
				while($articleCounter < 16)
				  {
					$article_array = fgetcsv($file);
					
					
					/*Skip first entry, it has no info*/
					if($firstArrEnt){
						
						$firstArrEnt = False;
						continue;
					}
					else
					{
						echo "<div class='mySlides fade'>";
						echo "<div class='numbertext'>$articleCounter / 15</div>";
						echo "<a href='$article_array[2]' onClick='popUpClick(this); return false;'>";
						echo "<img class='slide-show-image' src='$article_array[3]' style='width:100%'> </img>";
						
						echo "<div class='slide-text'>$article_array[0]</div>";
						echo "</a>";
						echo "</div>";
						
					}
					
					$articleCounter++;
					
					
				  }

				fclose($file);
					echo "<a class='prev' onclick='plusSlides(-1)'><</a>";
					echo "<a class='next' onclick='plusSlides(1)'>></a>";
					
					echo "<div style='text-align:center'>";
					echo "<span class='dot' onclick='currentSlide(1)'></span>";
					echo "<span class='dot' onclick='currentSlide(2)'></span>"; 
					echo "<span class='dot' onclick='currentSlide(3)'></span>";
					echo "<span class='dot' onclick='currentSlide(4)'></span>"; 
					echo "<span class='dot' onclick='currentSlide(5)'></span>";
					echo "<span class='dot' onclick='currentSlide(6)'></span>"; 
					echo "<span class='dot' onclick='currentSlide(7)'></span>";
					echo "<span class='dot' onclick='currentSlide(8)'></span>"; 
					echo "<span class='dot' onclick='currentSlide(9)'></span>";
					echo "<span class='dot' onclick='currentSlide(10)'></span>"; 
					echo "<span class='dot' onclick='currentSlide(11)'></span>";
					echo "<span class='dot' onclick='currentSlide(12)'></span>"; 
					echo "<span class='dot' onclick='currentSlide(13)'></span>";
					echo "<span class='dot' onclick='currentSlide(14)'></span>"; 
					echo "<span class='dot' onclick='currentSlide(15)'></span>";
					echo "</div>";
					echo "</div>";	



					echo "<div class='main-content-vertical-div'></div>";
					
					
					$file = fopen("rollingstonenews.csv","r");
					$firstArrEnt = True;
					$articleCounter = 1;
					
					
				  while($articleCounter < 7)
				  {
					$article_array = fgetcsv($file);
					
					
					/*Skip first entry, it has no info*/
					if($firstArrEnt){
						
						$firstArrEnt = False;
						continue;
					}
					else
					{
						if($articleCounter == 1)
						{
							echo "<div class='top-five-stories-col'>";
						}
						
						if($articleCounter == 4)
						{
							echo "</div>";	
							echo "<div class='top-five-stories-col'>";
						}
						
						echo "<div class='top-five-stories'>";
						echo "<a href='$article_array[3]' onClick='popUpClick(this); return false;'>";
						echo "<img class='top-five-stories-img' src='$article_array[2]' style='width:100%'> </img>";
						
						echo "<div class='top-five-stories-title' href='$article_array[3]'>$article_array[0]</div>";
						echo "</a>";
						echo "</div>";	

					}
					
					
					$articleCounter++;
					
					
				  }
				 echo "</div>";

				fclose($file);
					
					
								   
	?>
	
	
	




</html>