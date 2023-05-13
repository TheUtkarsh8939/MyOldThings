import pywhatkit
import wikipedia
from datetime import *
import pyttsx3

eng = pyttsx3.init() #initialize an instance
voice = eng.getProperty('voices') #get the available voices
 #eng.setProperty('voice', voice[0].id) #set the voice to index 0 for male voice
eng.setProperty('voice', voice[1].id) #changing voice to index 1 for female voiceeng

def speak(audio):
    print(audio)
now = datetime.now()

hour = now.strftime("%H")
m = now.strftime("%M")

def yt(vi):
    vid = vi.split("play")
    pywhatkit.playonyt(vid)
def sendwhatsappmessage(message,to): 
    pywhatkit.sendmsg(to,message,hour,m)
def gs(s):
    key = s.split("search")
    pywhatkit.search(key[1])
def wikipedi(topi):
    topic = topi.split("wiki")
    result = wikipedia.summary(topic[1], sentences = 17)
    speak(result)