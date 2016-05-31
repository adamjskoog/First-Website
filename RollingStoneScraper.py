#Created by Adam Skoog
#Description: Initial web scraper for Rolling stone music RSS
#Last Changed: 2/29/16 Removed saving the file in CSV format, going to be using JSON

import requests
from bs4 import BeautifulSoup
import os, csv
import json
import re
import time
import threading


def RollingStone():

	threading.Timer(100,RollingStone).start()
	url = "http://www.rollingstone.com/music.rss"
	r = requests.get(url)

	soup = BeautifulSoup(r.content,"html.parser")

	#Find all the posts on spin.com a music news site
	posts = soup.find_all("item")

	#Create an articles dictionary
	articles = {}


	#Now bind a key to another empty dict object
	for element in posts:
		articles[element.contents[13]["url"]] = {}


	#Find the refence link to the full article, as well as the article title, image and description
	for element in posts:
		
		articles[element.contents[13]["url"]]["link"] = element.contents[9].text.encode('utf8')
		articles[element.contents[13]["url"]]["title"] = element.contents[1].text.encode('utf8')
		articles[element.contents[13]["url"]]["image"] = element.contents[13]["url"]
		articles[element.contents[13]["url"]]["preview"] = element.contents[3].text.encode('utf8')
		
		
	#Open the working directory to point at where the JSON file should be saved
	os.chdir("C:/xampp/htdocs/music-monkey")

	with open("RollingStoneNews.csv", "w") as toWrite:
		writer = csv.writer(toWrite, delimiter=",")
		writer.writerow(["title", "preview", "image", "link"])
		for a in articles.keys():
			writer.writerow([ 	re.sub(u"(\xa0|\xe9)"," ",articles[a]["title"]),
								re.sub(u"(\xa0|\xe9)"," ",articles[a]["preview"]),
								re.sub(u"(\xa0|\xe9)"," ",articles[a]["image"]),
								re.sub(u"(\xa0|\xe9|\xfc)"," ",articles[a]["link"])])
		
RollingStone()
		
    


