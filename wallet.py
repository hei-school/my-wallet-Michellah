balance = 0
payment_list = []
accounts = []
is_authenticated = False

def create_account(username, password):
    global is_authenticated
    existing_account = next((account for account in accounts if account['username'] == username), None)
    if existing_account:
        print('Your account already exists')
    else:
        accounts.append({'username': username, 'password': password})
        is_authenticated = True
        print('Account created successfully!')

def login(username, password):
    global is_authenticated
    found_account = next((account for account in accounts if account['username'] == username), None)
    if found_account:
        is_authenticated = True
        print('You are connected')
    else:
        print('Please create your account')

def show_balance():
    global is_authenticated, balance
    if is_authenticated:
        print('The balance is : ', balance)
    else:
        print('Please create your account')

def add_money(money):
    global is_authenticated, balance, payment_list
    if is_authenticated:
        balance += money
        payment_list.append(str(money) + "_addmoney")
        print('The new balance after add money is : ', balance)
    else:
        print('Please create your account')

def take_out_money(money):
    global is_authenticated, balance, payment_list
    if is_authenticated:
        if money <= balance:
            balance -= money
            payment_list.append(str(money) + "_takeoutmoney")
            print('The new balance after take out money is : ', balance)
        else:
            print("The balance is insufficient ")
    else:
        print('Please create your account')

def show_payment_list():
    global is_authenticated, payment_list
    if is_authenticated:
        print("Liste", payment_list)
    else:
        print('Please create your account')

create_account('username', 'password')
login('username', 'password')
show_balance()
add_money(10)
take_out_money(2)
take_out_money(5)
show_payment_list()
