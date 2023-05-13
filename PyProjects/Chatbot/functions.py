import datetime
import webbrowser as wb
import pyjokes as pj
from online import *
from music import *
import os
from tkinter import * 
import wolframalpha
import wikipedia
import pyaudio
import requests
def takeCommand():
    query = input("User:")
    lowercasequery = query.lower()
    return str(lowercasequery)
woapid = "46H7G2-VU4PWRUUGA"
#Defining Speak Function
#Defining Greeting
hour = int(datetime.now().strftime("%H"))
def greet():
    if hour<12 and hour>1:
        print ("Good Morning. How are you?")
    if hour>12 and hour<15:
        print ("Good Afternoon. How are you?")
    if hour>15 and hour<22:
        print ("Good Evening. How are you?")
#Making sure that Internet is available
#The Main Thing
def activateassis():
    greet()
    while True:
        query = takeCommand()
        if 'hello' in query:
            print ("Bot:"+'Hi')
        elif "write a note" in query:
            print ("Bot:"+"What should i write, sir")
            note = takeCommand()
            file = open('jarvis.txt', 'w')
            print ("Bot:"+"Sir, Should i include date and time")
            snfm = takeCommand()
            if 'yes' in snfm or 'sure' in snfm:
                strTime = datetime.datetime.now().strftime("% H:% M:% S")
                file.write(strTime)
                file.write(" :- ")
                file.write(note)
            else:
                file.write(note)
         
        elif "show note" in query:
            print ("Bot:"+"Showing Notes")
            file = open("jarvis.txt", "r")
            print(file.read())
            print (file.read(6))
        elif 'open Wikipedia' in query:
            url = "https://www.wikipedia.org"
            wb.open(url, new = 0, autoraise = True)
        elif 'open wikipedia' in query:
            url = "https://www.wikipedia.org"
            wb.open(url, new = 0, autoraise = True)
        elif 'open Google' in query:
            url = "https://www.google.com"
            wb.open(url, new = 0, autoraise = True)
        elif 'open google' in query:
            url = "https://www.google.com"
            wb.open(url, new = 0, autoraise = True)
        elif 'open Youtube' in query:
            url = "https://www.youtube.com"
            wb.open(url, new = 0, autoraise = True)
        elif 'open youtube' in query:
            url = "https://www.youtube.com"
            wb.open(url, new = 0, autoraise = True)
        elif 'how are you' in query:
            print ("Bot:"+'I am fine. How are you?')
        elif 'i am fine' in query:
            print ("Bot:"+'I am glad to hear that.What can I do for you?')
        elif 'i want to hear a joke' in query:
            jk = pj.get_joke('en','all')
            print ("Bot:"+jk)
        elif 'tell me a joke' in query:
            jk = pj.get_joke('en','all')
            print ("Bot:"+jk)
        elif 'one More' in query:
            jk = pj.get_joke('en','all')
            print ("Bot:"+jk)
        elif 'what is your name' in query:
            print ("Bot:"+'my name is Prag A I')
        elif 'search' in query:
            gs(query)
        elif 'play music' in query:
            music(query)
        elif "play" in query:
            yt(query)
        elif "wiki" in query:
            wikipedi(query)
        elif 'send whatsapp message' in query:
            toi = input("Who you want to send that message: ")
            msg = input("Type your msg here: ")
            top = "+91"+toi
            to = int(top)
            sendwhatsappmessage(msg,to)
        elif 'shutdown' in query or 'shut the system' in query:
            os.system("shutdown /s /t 1")
        elif 'restart' in query or 'restart the system' in query:
            os.system("shutdown /r /t 1")
        elif 'log out' in query or 'sing out' in query:
            os.system("shutdown -1")
        elif "what is" in query or "who is" in query:
             
            # Use the same API key
            # that we have generated earlier
            client = wolframalpha.Client(woapid)
            res = client.query(query)
             
            try:
                print (next(res.results).text)
                print  (next(res.results).text)
            except StopIteration:
                print ("No results")
        elif 'wikipedia' in query:
            print ("Bot:"+'Searching Wikipedia...')
            query = query.replace("wikipedia", "")
            results = wikipedia.summary(query, sentences = 3)
            print ("Bot:"+"According to Wikipedia")
            print("Bot:"+results)
            print ("Bot:"+results)
        elif "calculate" in query:
             
            app_id = woapid
            client = wolframalpha.Client(app_id)
            indx = query.lower().split().index('calculate')
            query = query.split()[indx + 1:]
            res = client.query(' '.join(query))
            answer = next(res.results).text
            print ("Bot:"+"The answer is " + answer)
        elif "who am i" in query:
            print ("Bot:"+"If you speak then definitely you are a human")
        elif "where is" in query:
            query = query.replace("where is", "")
            location = query
            print ("User asked to Locate")
            print (location)
            wb.open("https://www.google.nl / maps / place/" + location + "")
        elif "show note" in query:
            print("Bot:"+"Showing Notes")
            file = open("jarvis.txt", "r")
            print(file.read())
        elif "good night" in query:
            print ("Bot:"+"Good Night")
            break
        elif "bye" in query:
            print ("Bot:"+"Bye")
            break
        else:
            print ("I can't understand what you are saying.")

