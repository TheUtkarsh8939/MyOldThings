import datetime as dtm
import os
import webbrowser as wb
from tkinter import *

#import pyaudio
# import pyjokes as pj
import pyttsx3
import requests
import speech_recognition as sr
import wikipedia
import wolframalpha

from music import *
from online import *

#Intializing pyttsx3
eng = pyttsx3.init() #initialize an instance
voice = eng.getProperty('voices') #get the available voices
 #eng.setProperty('voice', voice[0].id) #set the voice to index 0 for male voice
eng.setProperty('voice', voice[1].id) #changing voice to index 1 for female voiceeng
def takeCommand():
        command = sr.Recognizer()
        with sr.Microphone() as source:
            print("Listening.......")
            command.pause_threshold = 1
            audio = command.listen(source)

            try:
                print("Recognizing")
                query = command.recognize_google(audio,language="en-in")
                #print("You said : " + query)
            except Exception as Error:
                print("Say that again")
                return "None"
            return query.lower()
woapid = "46H7G2-VU4PWRUUGA"
#Defining Speak Function
def speak(audio):

    print('     ')
    eng.say(audio)
    print("      ")
    eng.runAndWait()
    speed_rate = eng.getProperty('rate')
    eng.setProperty(speed_rate,"100")
#Defining Greeting
def greet():
    hour = dtm.now().strftime("%H")
    if hour<12 and hour>1:
        speak ("Good Morning. How are you?")
    if hour>12 and hour<15:
        speak ("Good Afternoon. How are you?")
    if hour>15 and hour<22:
        speak ("Good Evening. How are you?")
#Making sure that Internet is available
class InternetException(Exception):
    """
    Host machine is not connected to the Internet or the connection Speed is Slow
    """

    pass
#The Main Thing
def activateassis():
    #greet()
    while True:
        query = takeCommand()
        print("You said : "+query)
        
        if 'hello' in query:
            speak('Hi')
        elif "write a note" in query:
            speak("What should i write, sir")
            note = takeCommand()
            file = open('jarvis.txt', 'w')
            speak("Sir, Should i include date and time")
            snfm = takeCommand()
            if 'yes' in snfm or 'sure' in snfm:
                strTime = datetime.datetime.now().strftime("% H:% M:% S")
                file.write(strTime)
                file.write(" :- ")
                file.write(note)
            else:
                file.write(note)
         
        elif "show note" in query:
            speak("Showing Notes")
            file = open("jarvis.txt", "r")
            print(file.read())
            speak(file.read(6))
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
            speak('I am fine. How are you?')
        elif 'i am fine' in query:
            speak('I am glad to hear that.What can I do for you?')
        elif 'i want to hear a joke' in query:
            jk = pj.get_joke('en','all')
            speak(jk)
        elif 'tell me a joke' in query:
            jk = pj.get_joke('en','all')
            speak(jk)
        elif 'one More' in query:
            jk = pj.get_joke('en','all')
            speak(jk)
        elif 'what is your name' in query:
            speak('my name is Prag A I')
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
                speak (next(res.results).text)
            except StopIteration:
                print ("No results")
        if 'wikipedia' in query:
            speak('Searching Wikipedia...')
            query = query.replace("wikipedia", "")
            results = wikipedia.summary(query, sentences = 3)
            speak("According to Wikipedia")
            print(results)
            speak(results)
        elif "calculate" in query:
             
            app_id = woapid
            client = wolframalpha.Client(app_id)
            indx = query.lower().split().index('calculate')
            query = query.split()[indx + 1:]
            res = client.query(' '.join(query))
            answer = next(res.results).text
            print("The answer is " + answer)
            speak("The answer is " + answer)
        elif "who am i" in query:
            speak("If you speak then definitely you are a human")
        elif "where is" in query:
            query = query.replace("where is", "")
            location = query
            speak("User asked to Locate")
            speak(location)
            wb.open("https://www.google.nl / maps / place/" + location + "")
        elif "show note" in query:
            speak("Showing Notes")
            file = open("jarvis.txt", "r")
            print(file.read())
            speak(file.read(6))
        elif "good night" in query:
            speak("Good Night")
            break
        elif "bye" in query:
            speak("Bye")
            break
        else:
            speak("I can't understand what you are saying.")

