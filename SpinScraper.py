#Created by Adam Skoog
#Description: Initial web scraper. This will scrape websites that have music related news and display the articles
#on my website feed.
#Last Changed: 2/29/16 Removed saving the file in CSV format, going to be using JSON

import requests
from bs4 import BeautifulSoup
import os, csv
import json
import re


f = open('SoupTest.txt','w')

url = "http://www.music-news.com/rss/UK/news"
r = requests.get(url)

soup = BeautifulSoup(r.content,"html.parser")

#Find all the posts on spin.com a music news site
posts = soup.find_all("item")

#Now that we have all the posts on the main page of spin.com
#parse the elements within "post row" to be stored in a JSON file
prefix = "https://"

#Create an articles dictionary
articles = {}

counter = 0

#Find the refence link to the full article
for element in posts:
	#print element

	
	
	article_link =  re.sub(u"(\u2019|\u2014|\u2018|\u2013)", "'", element.contents[1].text)
	article_title = re.sub(u"(\u2019|\u2014|\u2018|\u2013)", "'", element.contents[3].text)
	article_image = element.contents[15]["url"]
	article_preview = re.sub(u"(\u2019|\u2014|\u2018|\u2013)", "'", element.contents[5].text)
	
	
	articles[counter]["link"] = article_link
	articles[counter]["title"] = article_title
	articles[counter]["image"] = article_image
	articles[counter]["preview"] = article_preview
	
	print "Article Title: "
	print article_title
	print "Article Preview: "
	print article_preview
	print "Article Image: "
	print article_image
	print "Article Links: "
	print article_link
	print "\n"
	
	counter = counter + 1

#Open the working directory to point at where the JSON file should be saved
os.chdir("C:/xampp/htdocs/music-monkey-483")


#CSV will work
with open("news.csv", "w") as toWrite:
    writer = csv.writer(toWrite, delimiter=",")
    writer.writerow(["title", "preview", "link", "image"])
    for a in articles.keys():
        writer.writerow([articles[a]["title"], articles[a]["preview"], articles[a]["link"], articles[a]["image"]])

#JSON is sometimes throwing encoding errors during the dump, needs further testing		
		
#Write the material to a JSON File
#with open("news.json", "w") as writeJSON:
    #json.dump(articles, writeJSON, ensure_ascii=False)
    
    


