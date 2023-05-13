import pyttsx3
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
    eng.setProperty(speed_rate,"10000000")
speak('000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000.')