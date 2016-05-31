<html>
	<?php
										
			$file = fopen("Top100MusicVideos.csv","r");
			$firstArrEnt = True;
			$articleCounter = 1;
										
			echo "<div class='music-video-container'>";
			
			
			echo "<div class = 'video-display-container' >";
						
			echo "<iframe id='video-iframe' class = 'video-display-iframe' src= ''>";
			echo "</iframe>";
						
			echo "</div>";
			
			echo "<div class='song-list-container'>";
			
				while(!feof($file))
				  {
					$article_array = fgetcsv($file);
					
					if($article_array[0] == null)
					{
						/*break from the loop, we are finished reading*/
						break;
					}
					
					/*Skip first entry, it has no info*/
					if($firstArrEnt){
						
						$firstArrEnt = False;
						continue;
					}
					else
					{
						
						echo "<div class='song-list-item' onClick='songItemClick(this); return false;' title='$article_array[2]'>";
						echo "<img class='song-list-item-img' src='$article_array[3]' > </img>";
						echo "<p class='song-list-item-name' > $article_array[0]</p>";
						
						echo "</div>";
						
					}
					
					$articleCounter++;
					
					
				  }
				echo "</div>";
				
				
				
				echo "</div>";
				  
				fclose($file);	
								   
	?>



</html>