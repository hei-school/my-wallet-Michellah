import java.util.ArrayList;
import java.util.List;

public class Wallet {
    static double balance = 0;
    static List<String> transactionList = new ArrayList<>();
    static List<Account> accounts = new ArrayList<>();
    static boolean isAuthenticated = false;

    static class Account {
        String username;
        String password;

        public Account(String username, String password) {
            this.username = username;
            this.password = password;
        }
    }

    public static void createAccount(String username, String password) {
        Account existingAccount = accounts.stream()
                .filter(account -> account.username.equals(username))
                .findFirst()
                .orElse(null);

        if (existingAccount != null) {
            System.out.println("Your account already exists");
        } else {
            accounts.add(new Account(username, password));
            System.out.println("Account created successfully!");
        }
    }

    public static void login(String username, String password) {
        Account foundAccount = accounts.stream()
                .filter(account -> account.username.equals(username) && account.password.equals(password))
                .findFirst()
                .orElse(null);

        if (foundAccount != null) {
            isAuthenticated = true;
            System.out.println("You are connected");
        } else {
            System.out.println("Please create your account");
        }
    }

    public static void showBalance() {
        if (isAuthenticated) {
            System.out.println("The balance is: " + balance);
        } else {
            System.out.println("Please create your account");
        }
    }

    public static void addMoney(double money) {
        if (isAuthenticated) {
            balance += money;
        transactionList.add(money + "_addmoney");
        System.out.println("The new balance after adding money is: " + balance);
        } else {
            System.out.println("Please create your account");
        }
        
   }
    public static void takeOutMoney(double money) {
        if (isAuthenticated) {
            if (money <= balance) {
                balance -= money;
                transactionList.add(money + "_takeoutmoney");
                System.out.println("The new balance after taking out money is: " + balance);
            } else {
                System.out.println("The balance is insufficient");
            }
        } else {
            System.out.println("Please create your account");
        }
        
    }

    public static void showTransactionList(){
        if (isAuthenticated) {
           System.out.println("Transaction list: " + transactionList);
        } else {
            System.out.println("Please create your account");
        }
        
    }

    public static void main(String[] args) {
        createAccount("username", "password");
        login("username", "password");
        addMoney(50);
        takeOutMoney(40);
        showTransactionList();
        showBalance();
    }
}