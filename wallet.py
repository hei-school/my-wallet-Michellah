balance = 0
images = []
credit_cards = []
driver_license = []
cin = []
visiting_card = []

def add_to_wallet(obj, type):
    global balance, images, credit_cards, driver_license, cin, visiting_card
    
    if type == 'money':
        balance += obj
        print('The new balance after adding money is:', balance)
    elif type == 'image':
        images.append(obj)
        print("You've added an image to your wallet.")
    elif type == 'credit-card':
        credit_cards.append(obj)
        print("You've added a credit card to your wallet.")
    elif type == 'driver-license':
        driver_license.append(obj)
        print("You've added a driver's license to your wallet.")
    elif type == 'CIN':
        cin.append(obj)
        print("You've added a CIN to your wallet.")
    elif type == 'visiting-card':
        visiting_card.append(obj)
        print("You've added a visiting card to your wallet.")
    else:
        print("It doesn't fit in your wallet.")

def remove_from_wallet(obj, type):
    global balance, images, credit_cards, driver_license, cin, visiting_card
    
    if type == 'money':
        if balance >= obj:
            balance -= obj
            print("You have withdrawn", obj, "from your portfolio. Total amount:", balance)
        else:
            print("You don't have enough money in your wallet!")
    else:
        wallet = {
            'image': images,
            'credit-card': credit_cards,
            'driver-license': driver_license,
            'CIN': cin,
            'visiting-card': visiting_card
        }
        if obj in wallet.get(type, []):
            wallet[type].remove(obj)
            print(f"You have removed a {type.replace('-', ' ')} from your wallet.")
        else:
            print(f"The {type.replace('-', ' ')} does not exist in your wallet!")

def look_into_wallet():
    print("The content of wallet")
    print("Money:", balance)
    print("Images:", images)
    print("Credit cards:", credit_cards)
    print("CIN:", cin)
    print("Driver's license:", driver_license)
    print("Visiting cards:", visiting_card)

add_to_wallet(50, 'money')
add_to_wallet('image1.jpg', 'image')
add_to_wallet('BNI card', 'credit-card')
add_to_wallet('CIN1', 'CIN')
add_to_wallet('Driver license 1', 'driver-license')
add_to_wallet('Doctor', 'visiting-card')
look_into_wallet()
remove_from_wallet(20, 'money')
look_into_wallet()
