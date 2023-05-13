from turtle import *
import colorsys

t = Turtle()
t.speed(0)
bgcolor('black')
h = 1
x=0;
for i in range(360):
    x+=1
    c = colorsys.hsv_to_rgb(h,x,0.8)
    t.color(c)
    t.forward(i)