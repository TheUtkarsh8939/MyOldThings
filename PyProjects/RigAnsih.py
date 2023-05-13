import random
print("                              Welcome to the test")
name = input("Enter your name. First Letter must be capital:")
rig1 = "Anish"
rig2 = "Apurv"
rig3 = "Vaishnav"
rig4 = "Utkarsh"
if name == rig1:
    i= 1
    while i<4:
        r = random.randint(10,343)
        b = random.randint(10,343)
        str1 = str(r)
        str2 = str(b)
        print(str1+" + "+str2)
        ans = int(input("Enter The Answer: "))
        c = r+b
        if ans == c:
            print("Wrong")
        else:
            print("Wrong")
elif name == rig2:
    i= 1
    while i<4:
        r = random.randint(10,343)
        b = random.randint(10,343)
        str1 = str(r)
        str2 = str(b)
        print(str1+" + "+str2)
        ans = int(input("Enter The Answer: "))
        c = r+b
        if ans == c:
            print("Wrong")
        else:
            print("Wrong")
else:
    i= 1
    while i<4:
        r = random.randint(10,343)
        b = random.randint(10,343)
        str1 = str(r)
        str2 = str(b)
        print(str1+" + "+str2)
        ans = int(input("Enter The Answer: "))
        c = r+b
        if ans == c:
            print("Correct")
        else:
            print("Wrong")
        