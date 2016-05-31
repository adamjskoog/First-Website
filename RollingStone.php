<html>	
	<?php
										
										$file = fopen("rollingstonenews.csv","r");
										$firstArrEnt = True;
										$rowDiv = True;
										$articleCounter = 0;
																	
										
											while(! feof($file))
											  {
												$article_array = fgetcsv($file);
												
												/*Check if we need to make a new row*/
												if($articleCounter == 3)
												{
													
													/* Close the news-row div*/
													echo "</div>";
													$articleCounter = 0;
													$rowDiv = True;
												}
												
												/*Skip first entry, it has no info*/
												if($firstArrEnt){
													
													$firstArrEnt = False;
													continue;
												}
												/*Check if we need to start a new row*/
												if(!$firstArrEnt and  $rowDiv)
												{
													echo "<div class='news-row'>";
													$rowDiv = False;
													
												}
												
												/*There is an edge case in the arry that reads in a last line of 
												all null values and messes with the CSS*/
												if($article_array[0] == null)
												{
													/*close the row div*/
													echo "</div>";
													
													/*break from the loop, we are finished reading*/
													break;
												}
												
												
												/*Check where this article needs to be placed*/
												if($articleCounter == 0)
												{
													/*LEFT NEWS COLUMN PLACEMENT*/
													echo "<div class='news-left-container'>";
													echo "<img class='newsimage' src='$article_array[2]' />";
													echo "<h1><a href='$article_array[3]' onClick='popUpClick(this); return false;'> $article_array[0] </a></h1>";
													
													echo "<div class='news-info'>";
													echo "<p> $article_array[1] </p>";
													echo "</div>";
													
													echo "</div>";
													
												}
												else if($articleCounter == 1)
												{
													
													/*CENTER NEWS COLUMN PLACEMENT*/
													echo "<div class='news-center'>";
													
													echo "<img class='newsimage' src='$article_array[2]' />";
													echo "<h1><a href='$article_array[3]' onClick='popUpClick(this); return false;'> $article_array[0] </a></h1>";
													
													echo "<div class='news-info'>";
													echo "<p> $article_array[1] </p>";
													echo "</div>";
													
													echo "</div>";
													
													
												}
												else
												{
													/*RIGHT NEWS COLUMN PLACEMENT*/
													echo "<div class='news-right'>";
													
													echo "<img class='newsimage' src='$article_array[2]' />";
													echo "<h1><a href='$article_array[3]' onClick='popUpClick(this); return false;'> $article_array[0] </a></h1>";
													
													echo "<div class='news-info'>";
													echo "<p> $article_array[1] </p>";
													echo "</div>";
													
													echo "</div>";
													
												}
												
												$articleCounter++;
												
												
											  }

											fclose($file);
										
								   
	?>
</html>