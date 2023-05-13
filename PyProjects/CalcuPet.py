print("Welcome :)")
print("Enter '+' for add,'-' for subtract,'*' for Multiplication , '/' for division and '%' for remainder")
a= input("Enter Operator: ")
b= int(input("Enter Number 1: "))
c = int(input("Enter Number 2: "))
if a == '+':
    e = b + c
elif a == '-':
    e = b - c
elif a == '*':
    e = b * c
elif a == '/':
    e = b / c
elif a == '%':
    e = b % c
else:
    print('Wrong Operator!')
print(e)

