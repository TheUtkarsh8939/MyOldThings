
from functions import *
from tkinter import * 
#GUI

 
# create a tkinter window
#root = Tk()             
 
# Open window having dimension 100x100
#root.geometry('100x100')
 
# Create a Button
#btn = Button(root, text = 'Click me !', bd = '5',
                          #command = ac())
 
# Set the position of button on the top of window.  
#btn.pack(side = 'top')   
 
#root.mainloop()

#Defining some functions
def takeCommand():
        command = sr.Recognizer()
        with sr.Microphone() as source:
            command.pause_threshold = 1
            audio = command.listen(source)

            try:
                query = command.recognize_google(audio,language="en-in")
                print("Say")
            except Exception as Error:
                print("Say that again")
                return "None"
            return query.lower()

USERNAME = 'Utkarsh'
BOTNAME = 'Prag'
#Activation by voice
fcm = takeCommand()
if "Hey Pragya" in fcm:
    activateassis()
elif "Hey Pragya" in input:
    activateassis()

