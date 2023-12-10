<?php
$balance = 0;
$images = [];
$creditCards = [];
$driverLicense = [];
$cin = [];
$visitingCard = [];

function addToWallet($obj, $type) {
    global $balance, $images, $creditCards, $driverLicense, $cin, $visitingCard;
    
    if ($type === 'money') {
        $balance += $obj;
        echo 'The new balance after adding money is: ' . $balance . PHP_EOL;
    } elseif ($type === 'image') {
        array_push($images, $obj);
        echo "You've added an image '$obj' to your wallet." . PHP_EOL;
    } elseif ($type === 'credit-card') {
        array_push($creditCards, $obj);
        echo "You've added a credit card '$obj' to your wallet." . PHP_EOL;
    } elseif ($type === 'driver-license') {
        array_push($driverLicense, $obj);
        echo "You've added a driver's license '$obj' to your wallet." . PHP_EOL;
    } elseif ($type === 'CIN') {
        array_push($cin, $obj);
        echo "You've added a CIN '$obj' to your wallet." . PHP_EOL;
    } elseif ($type === 'visiting-card') {
        array_push($visitingCard, $obj);
        echo "You've added a visiting card '$obj' to your wallet." . PHP_EOL;
    } else {
        echo "It doesn't fit in your wallet." . PHP_EOL;
    }
}

function removeFromWallet($obj, $type) {
    global $balance, $images, $creditCards, $driverLicense, $cin, $visitingCard;
    
    if ($type === 'money') {
        if ($balance >= $obj) {
            $balance -= $obj;
            echo "You have withdrawn $obj from your portfolio. Total amount: $balance" . PHP_EOL;
        } else {
            echo "You don't have enough money in your wallet!" . PHP_EOL;
        }
    } else {
        $wallet = [
            'image' => &$images,
            'credit-card' => &$creditCards,
            'driver-license' => &$driverLicense,
            'CIN' => &$cin,
            'visiting-card' => &$visitingCard
        ];
        if (($key = array_search($obj, $wallet[$type])) !== false) {
            unset($wallet[$type][$key]);
            echo "You have removed a " . str_replace('-', ' ', $type) . " from your wallet." . PHP_EOL;
        } else {
            echo "The " . str_replace('-', ' ', $type) . " does not exist in your wallet!" . PHP_EOL;
        }
    }
}

function lookIntoWallet() {
    global $balance, $images, $creditCards, $driverLicense, $cin, $visitingCard;
    
    echo "The content of wallet" . PHP_EOL;
    echo "Money: $balance" . PHP_EOL;
    echo "Images: " . implode(', ', $images) . PHP_EOL;
    echo "Credit cards: " . implode(', ', $creditCards) . PHP_EOL;
    echo "CIN: " . implode(', ', $cin) . PHP_EOL;
    echo "Driver's license: " . implode(', ', $driverLicense) . PHP_EOL;
    echo "Visiting cards: " . implode(', ', $visitingCard) . PHP_EOL;
}

addToWallet(50, 'money');
addToWallet('image1.jpg', 'image');
addToWallet('BNI card', 'credit-card');
addToWallet('CIN1', 'CIN');
addToWallet('Driver license 1', 'driver-license');
addToWallet('Doctor', 'visiting-card');
lookIntoWallet();
removeFromWallet(20, 'money');
lookIntoWallet();
?>
