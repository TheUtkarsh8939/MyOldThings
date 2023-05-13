import random
print("                                                                                       Welcome to The Test")
x = 1
def sub():
        a = random.randint(10, 565)
        b = random.randint(10, 675)
        f = str(a)
        g = str(b)
        #if b<a:
        print(f + " - " + g)
        c = int(input("Enter the Answer:"))
        d = a-b
        if c==d:
            print("Good Job")
        elif c!=d: 
            print ("Wrong")
            x+=1

print("First some Addition")
while x<5:
    a = random.randint(10, 565)
    b = random.randint(10, 675)
    f = str(a)
    g = str(b)
    print(f + " + " + g)
    c = int(input("Enter the Answer:"))
    d = a+b
    if c==d:
        print("Good Job")
    else: 
        print ("Wrong")
    x+=1
else:
    print("Now Let's start A subtraction test")
    while x<10:
        a = random.randint(10, 565)
        b = random.randint(10, 675)
        f = str(a)
        g = str(b)
        #if b<a:
        print(f + " - " + g)
        c = int(input("Enter the Answer:"))
        d = a-b
        if c==d:
            print("Good Job")
        else: 
            print ("Wrong")
        x+=1
        break