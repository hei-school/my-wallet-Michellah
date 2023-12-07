<?php

class AccountSystem {

    private $balance = 0;
    private $transactionList = [];
    private $accounts = [];
    private $isAuthenticated = false;

    public function __construct() {
        $this->createAccount('username', 'password');
        $this->login('username', 'password');
        $this->showBalance();
        $this->addMoney(10);
        $this->takeOutMoney(2);
        $this->takeOutMoney(5);
        $this->showTransactionList();
    }

    public function createAccount($username, $password) {
        $existingAccount = $this->findAccount($username);

        if ($existingAccount !== null) {
            echo 'Your account already exists' . PHP_EOL;
        } else {
            $this->accounts[] = ['username' => $username, 'password' => $password];
            echo 'Account created successfully!' . PHP_EOL;
        }
    }

    public function login($username, $password) {
        $foundAccount = $this->findAccount($username);

        if ($foundAccount !== null) {
            $this->isAuthenticated = true;
            echo 'You are connected' . PHP_EOL;
        } else {
            echo 'Please create your account' . PHP_EOL;
        }
    }

    public function showBalance() {
        if ($this->isAuthenticated) {
            echo 'The balance is: ' . $this->balance . PHP_EOL;
        } else {
            echo 'Please create your account' . PHP_EOL;
        }
    }

    public function addMoney($money) {
        if ($this->isAuthenticated) {
            $this->balance += $money;
            $this->transactionList[] = $money . '_addmoney';
            echo 'The new balance after add money is: ' . $this->balance . PHP_EOL;
        } else {
            echo 'Please create your account' . PHP_EOL;
        }
    }

    public function takeOutMoney($money) {
        if ($this->isAuthenticated) {
            if ($money <= $this->balance) {
                $this->balance -= $money;
                $this->transactionList[] = $money . '_takeoutmoney';
                echo 'The new balance after take out money is: ' . $this->balance . PHP_EOL;
            } else {
                echo 'The balance is insufficient' . PHP_EOL;
            }
        } else {
            echo 'Please create your account' . PHP_EOL;
        }
    }

    public function showTransactionList() {
        if ($this->isAuthenticated) {
            echo 'List: ' . implode(", ", $this->transactionList) . PHP_EOL;
        } else {
            echo 'Please create your account' . PHP_EOL;
        }
    }

    private function findAccount($username) {
        foreach ($this->accounts as $account) {
            if ($account['username'] === $username) {
                return $account;
            }
        }
        return null;
    }
}

new AccountSystem();

?>
