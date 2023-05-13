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
import webbrowser as wb

def music(query):
    if 'play music slow' in query:
        speak('playing slow')
        url = "https://www.youtube.com/watch?v=kPMLbSXM97U"
        wb.open(url, new = 0, autoraise = True)
    elif 'play music believer' in query:
        speak('playing believer')
        url = "https://www.youtube.com/watch?v=W0DM5lcj6mw"
        wb.open(url, new = 0, autoraise = True)
    elif 'play music unstoppable' in query:
        speak('playing unstoppable')
        url = "https://www.youtube.com/watch?v=0wc6OcyA0TY"
        wb.open(url, new = 0, autoraise = True)
    elif 'play music periodic table song' in query:
        speak('playing periodic table song')
        url = "https://www.youtube.com/watch?v=rz4Dd1I_fX0"
        wb.open(url, new = 0, autoraise = True)
    elif 'play music kesariya' in query:
        speak('playing kesariya')
        url = "https://www.youtube.com/watch?v=BddP6PYo2gs"
        wb.open(url,new = 0, autoraise = True)
    elif 'play om deva deva' in query:
        speak('playing om deva deva')
        url = "https://www.youtube.com/watch?v=WjAPDofGg28"
        wb.open(url,new = 0, autoraise = True)
    elif 'play wellerman' in query:
        speak('playing wellerman')
        url = "https://www.youtube.com/watch?v=qP-7GNoDJ5c"
        wb.open(url,new = 0, autoraise = True)
    elif 'play music sea shanty' in query:
        speak('playing sea shanty')
        url = "https://www.youtube.com/watch?v=qP-7GNoDJ5c"
        wb.open(url,new = 0, autoraise = True)
    elif 'play music night time' in query:
        speak('playing night time')
        url = "https://www.youtube.com/watch?v=4RQWFwxGaWg"
        wb.open(url,new = 0, autoraise = True)
    elif 'play music indian believer' in query:
        speak('playing believer parody')
        url = "https://www.youtube.com/watch?v=lV1rdg7oPkA"
        wb.open(url,new = 0, autoraise = True)
    elif 'play music memories' in query:
        speak('playing memories')
        url = "https://www.youtube.com/watch?v=SlPhMPnQ58k"
        wb.open(url,new = 0, autoraise = True)
    elif 'play see you again' in query:
        speak('playing see you again')
        url = "https://www.youtube.com/watch?v=RgKAFK5djSk"
        wb.open(url,new = 0, autoraise = True)
    elif 'play music teri mitti' in query:
        speak('playing teri mitti')
        url = "https://www.youtube.com/watch?v=tQsS_MLZl3c"
        wb.open(url,new = 0, autoraise = True)
    elif 'play dil mein mars hai' in query:
        speak('playing dil mein mars hai')
        url = "https://www.youtube.com/watch?v=XZl1Tf419l4"
        wb.open(url,new = 0, autoraise = True)
    elif 'play music a watan' in query:
        speak('playing a watan')
        url = 'https://www.youtube.com/watch?v=BKx_B1VZ2kw'
        wb.open(url,new = 0,autoraise=True)
    elif 'play music aarambh hai prachand' in query:
        speak('playing aarambh hai prachand')
        url = 'https://www.youtube.com/watch?v=r6SbfF9FjTg'
        wb.open(url,new = 0, autoraise = True)
    elif 'play music joker bgm' in query:
        speak('playing Joker BGM')
        url = 'https://www.youtube.com/watch?v=YKLX3QbKBg0'
        wb.open(url,new = 0, autoraise = True)