import math
#Making a loop for program to does not end
while True:
  # Getting User's Input and Spliting it Into a list
  userinp = input("Enter The Numbers Here and Sperate them by comma: ").split(",")

  # function to calculate LCM
  def LCMofArray(a):
    lcm = a[0]
    for i in range(1,len(a)):
      lcm = lcm*a[i]//math.gcd(lcm, a[i])
    return lcm
  #stopping the while loop on command
  if userinp[0] == "Stop" or userinp[0] == "stop" or userinp[0] == "STOP":
    break
  else:
    # Convert items of list into int
    numbers = res = [eval(i) for i in userinp]
    #giving Result
    print(LCMofArray(numbers))