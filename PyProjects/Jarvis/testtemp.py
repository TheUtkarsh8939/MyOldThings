import pyttsx3
import datetime
eng = pyttsx3.init() #initialize an instance
voice = eng.getProperty('voices') #get the available voices
 #eng.setProperty('voice', voice[0].id) #set the voice to index 0 for male voice
eng.setProperty('voice', voice[1].id) #changing voice to index 1 for female voiceeng
def speak(audio):

    print('     ')
    eng.say(audio)
    print("      ")
    eng.runAndWait()
    speed_rate = eng.getProperty('rate')
    eng.setProperty(speed_rate,"100")
hou = str(datetime.datetime.now().strftime("%H"))
hour = int(hou)
def greet():
    if hour<12 and hour>1:
        speak ("Good Morning. How are you?")
    if hour>12 and hour<15:
        speak ("Good Afternoon. How are you?")
    if hour>15 and hour<23:
        speak ("Good Evening. How are you?")
greet()