let balance = 0;
let payment_list = [];
let accounts = [];
let isAuthentaficed = false;

function createAccount(username, password) {
    const existingAccount = accounts.find(account => account.username === username);
    if (existingAccount) {
        console.log('Your account already exists');
    } else {
        accounts.push({ username, password })
        console.log('Account created successfully!');
    }
}
function login(username, password) {
    
    const foundAccount = accounts.find(account => account.username === username);

    if (foundAccount) {
        isAuthentaficed = true;
        console.log('You are connected');
    } else {
        console.log('Please create your account');
    }
}

function showBalance() {
    if(isAuthentaficed) {
        console.log('The balance is : ', balance);
    } else {
        console.log('Please create your account');
    }
    
}

function addMoney(money) {
    if (isAuthentaficed) {
        balance += money
        payment_list.push(money + "_addmoney")
        console.log('The new balance after add money is : ', balance);
    } else {
        console.log('Please create your account');
    }

}

function takeOutMoney(money) {
    if(isAuthentaficed) {
        if (money <= balance) {
            balance -= money
            payment_list.push(money + "_takeoutmoney")
            console.log('The new balance after take out money is : ', balance);
        } else {
            console.log("The balance is insufficient ");
        }
    } else {
        console.log('Please create your account');
    }
    

}

function showPaymentList() {
    if(isAuthentaficed) {
        console.log("Liste", payment_list);
    } else {
        console.log('Please create your account');
    }
    
}

createAccount('username','password')
login('username', 'password')
showBalance();
addMoney(10);
takeOutMoney(2);
takeOutMoney(5)
showPaymentList();
