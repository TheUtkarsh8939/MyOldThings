import turtle
t = turtle.Turtle()
turtle.Screen().bgcolor('black')
t.speed(0)
colors = ['red','orange','yellow','green','blue','purple']

for i in range(360):
        t.pencolor(colors[i % 6])
        t.width(1 / 100 + 1)
        t.forward(i)
        t.left(63)
            