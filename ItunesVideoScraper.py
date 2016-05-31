import requests
from bs4 import BeautifulSoup
import os, csv
import json
import re


url = "https://itunes.apple.com/us/rss/topmusicvideos/limit=100/explicit=true/xml"
r = requests.get(url)

soup = BeautifulSoup(r.content,"html.parser")

#Find all the posts on spin.com a music news site
posts = soup.find_all("entry")

#Now that we have all the posts on the main page of spin.com
#parse the elements within "post row" to be stored in a JSON file
prefix = "video"
counter = 0

#Create an articles dictionary
articles = {}

for element in posts:
	articles[prefix + str(counter)] = {}
	counter = counter + 1

counter = 0

#Find the refence link to the full article
for element in posts:

	articleCount = prefix + str(counter)
	
	article_link =  element.contents[3].text.encode('utf8')
	article_title = element.contents[5].text.encode('utf8')
	article_image = element.contents[23].text
	article_video = element.contents[15]["href"]
	
	
	articles[articleCount]["link"] = article_link
	articles[articleCount]["title"] = article_title
	articles[articleCount]["video"] = article_video
	articles[articleCount]["image"] = article_image
	
	print "Article Title: "
	print article_title
	print "Article Link: "
	print article_link
	print "Article Video: "
	print article_video
	print "Article image: "
	print article_image
	print "\n"


	
	counter = counter + 1
	

#Open the working directory to point at where the JSON file should be saved
os.chdir("C:/xampp/htdocs/music-monkey")


#CSV will work
with open("Top100MusicVideos.csv", "w") as toWrite:
    writer = csv.writer(toWrite, delimiter=",")
    writer.writerow(["title", "link", "video", "image"])
    for a in articles.keys():
        writer.writerow([articles[a]["title"], articles[a]["link"], articles[a]["video"], articles[a]["image"]])

#JSON is sometimes throwing encoding errors during the dump, needs further testing		
		
#Write the material to a JSON File
#with open("news.json", "w") as writeJSON:
    #json.dump(articles, writeJSON, ensure_ascii=False)
    