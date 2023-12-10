let balance = 0;
let images = []; 
let creditCards = [];
let driverLicense = [];
let cin = [];
let visitingCard = [];

function addToWallet(object, type) {
    if(type === 'money') {
        balance += object;
        console.log('The new balance after add money is : ', balance);
    } else if (type === 'image') {
        images.push(object);
        console.log("You've added an image to your wallet.");
    } else if (type === 'credit-card') {
        creditCards.push(object);
        console.log("You've added credit card to your wallet.");
    } else if (type === 'driver-license') {
        driverLicense.push(object);
        console.log("You've added driver's license to your wallet.");
    } else if (type === 'CIN') {
        cin.push(object);
        console.log("You've added CIN to your wallet.");
    } else if (type === 'visiting-card') {
        visitingCard.push(object);
        console.log("You've added vising card to your wallet.");
    } else {
        console.log("It doesn't fit in your wallet ");
    }
}

function removeFromWallet(object, type) {
    if(type === 'money') {
        if (balance >= object){
            balance -= object;
            console.log("You have withdrawn ",  object,"from your portfolio. Total amount:", balance);
        } else {
            console.log("You don't have enough money in your wallet!");
        }
       
    } else if( type == 'image') {
        if (images.includes(object)) {
            let index = images.indexOf(object);
            images.splice(index, 1);
            console.log(`You have removed an image from your wallet.`);
        } else {
            console.log("The image does not exist in your wallet !");
        }
    } else if (type === 'credit-card') {
        if (creditCards.includes(object)) {
            let index = creditCards.indexOf(object);
            creditCards.splice(index, 1);
            console.log(`You have removed a credit card from your wallet`);
        } else {
            console.log("The credit card does not exist in your wallet !");
        }
    }  else if (type === 'driver-license') {
        if (driverLicense.includes(object)) {
            let index = driverLicense.indexOf(object);
            driverLicense.splice(index, 1);
            console.log(`You have removed a driver's license from your wallet`);
        } else {
            console.log("The driver's license does not exist in your wallet !");
        }
    } else if (type === 'visiting-card') {
        if (visitingCard.includes(object)) {
            let index = visitingCard.indexOf(object);
            visitingCard.splice(index, 1);
            console.log(`You have removed a visiting card from your wallet`);
        } else {
            console.log("The visiting card does not exist in your wallet !");
        }
    } else if (type === 'CIN') {
        if (cin.includes(object)) {
            let index = cin.indexOf(object);
            cin.splice(index, 1);
            console.log(`You have removed a cin from your wallet`);
        } else {
            console.log("The cin does not exist in your wallet !");
        }
    } else {
        console.log("Object type not supported!");
    }
}

function lookIntoWallet() {
    console.log("The content of wallet");
    console.log("Money: ", balance);
    console.log("Images: ");
    for (let i = 0; i < images.length; i++) {
        console.log(images[i]);
    }
    console.log("Credit cards: ");
    for (let i = 0; i < creditCards.length; i++) {
        console.log(creditCards[i]);
    }

    console.log("CIN: ");
    for (let i = 0; i < cin.length; i++) {
        console.log(cin[i]);
    }

    console.log("Driver's license: ");
    for (let i = 0; i < driverLicense.length; i++) {
        console.log(driverLicense[i]);
    }

    console.log("Visiting cards: ");
    for (let i = 0; i < visitingCard.length; i++) {
        console.log(visitingCard[i]);
    }
}

addToWallet(50, 'money');
addToWallet('image1.jpg', 'image');
addToWallet('BNI card', 'credit-card');
addToWallet('CIN1', 'CIN');
addToWallet('Driver license 1', 'driver-license');
addToWallet('Docteur', 'visiting-card');
lookIntoWallet();
removeFromWallet(20, 'money');
lookIntoWallet();

