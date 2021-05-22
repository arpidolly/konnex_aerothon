
from newspaper import Article
import random
import string
import nltk
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import numpy as np
import warnings
import tkinter
from tkinter import *
warnings.filterwarnings('ignore')

nltk.download('punkt', quiet=True)
article = Article('https://www.bajajfinservmarkets.in/insurance/motor-insurance/driving-licence.html')
article.download()
article.parse()
article.nlp()
corpus = article.text
text = corpus
sentence_list = nltk.sent_tokenize(text)

def greeting_response(text):
    text = text.lower()
    bot_greet = ['Howdy!', 'Hi!', 'Hello!', 'Greetings!']
    user_greet= ['hi', 'hey', 'hello', 'greetings', 'wassup']
    for word in text.split():
        if word in user_greet:
            return random.choice(bot_greet)

def index_sort(list_var):
    lenght = len(list_var)
    list_index = list(range(0, lenght))
    x = list_var
    for i in range(lenght):
        for j in range(lenght):
            if x[list_index[i]] > x[list_index[j]]:
                temp = list_index[i]
                list_index[i] = list_index[j]
                list_index[j] = temp
    return list_index

def bot_response(user_input):
    user_input = user_input.lower()
    sentence_list.append(user_input)
    bot_response = ''
    cm = CountVectorizer().fit_transform(sentence_list)
    similarity_scores = cosine_similarity(cm[-1], cm)
    similarity_scores_list = similarity_scores.flatten()
    index = index_sort(similarity_scores_list)
    index = index[1:]
    response_flag = 0
 
    j = 0
    for i in range(len(index)):
        if similarity_scores_list[index[i]] > 0.0:
            bot_response = bot_response+' '+sentence_list[index[i]]
            response_flag = 1
            j = j+1
        if j > 2:
            break
 
        if response_flag == 0:
            bot_response = bot_response+' '+"I apologize, I don't even understand."
        sentence_list.remove(user_input)
 
        return bot_response

def send():
    exit_list = ['exit', 'see you later', 'bye', 'quit', 'break', 'stop']
    msg = EntryBox.get("1.0",'end-1c').strip()
    EntryBox.delete("0.0",END)
    if msg != '':
        ChatLog.config(state=NORMAL)
        ChatLog.insert(END, "You: " + msg + '\n\n')
        ChatLog.config(foreground="#442265", font=("Verdana", 12 ))
        user_input = msg
        if user_input.lower() in exit_list:
            res='Chat with you later, and remember... stay safe!'
            
        else:
            if greeting_response(user_input) != None:
                res=greeting_response(user_input)
            else:
                res=bot_response(user_input)

        ChatLog.insert(END, "Bot: " + res + '\n\n')
        ChatLog.config(state=DISABLED)
        ChatLog.yview(END)
base = Tk()
base.title("Drive Bot")
base.geometry("400x700")
base.resizable(width=FALSE, height=FALSE)

ChatLog = Text(base, bd=0, bg="white", height="8", width="50", font="Arial",)
ChatLog.config(state=DISABLED)

scrollbar = Scrollbar(base, command=ChatLog.yview, cursor="heart")
ChatLog['yscrollcommand'] = scrollbar.set


EntryBox = Text(base, bd=0, bg="white",width="20", height="4", font="Arial")
SendButton = Button(base, font=("Roboto",12,'bold'), text="Send", width="8", height="4",
                    bd=0, bg="#393d3b", activebackground="#161a19",fg='#ffffff',
                    command= send )

scrollbar.place(x=376,y=6, height=630)
ChatLog.place(x=6,y=6, height=630, width=370)
EntryBox.place(x=6, y=651, height=60, width=265)
SendButton.place(x=260, y=651, height=60)
base.mainloop()


