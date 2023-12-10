import java.util.ArrayList;
import java.util.List;

public class Wallet {
    private static int balance = 0;
    private static List<String> images = new ArrayList<>();
    private static List<String> creditCards = new ArrayList<>();
    private static List<String> driverLicense = new ArrayList<>();
    private static List<String> cin = new ArrayList<>();
    private static List<String> visitingCard = new ArrayList<>();

    public static void addToWallet(Object obj, String type) {
        if ("money".equals(type)) {
            balance += (int) obj;
            System.out.println("The new balance after adding money is: " + balance);
        } else {
            List<String> selectedList = getListByType(type);
            if (selectedList != null) {
                selectedList.add(obj.toString());
                System.out.println("You've added a " + type + " to your wallet: " + obj);
            } else {
                System.out.println("It doesn't fit in your wallet.");
            }
        }
    }

    public static void removeFromWallet(Object obj, String type) {
        if ("money".equals(type)) {
            if (balance >= (int) obj) {
                balance -= (int) obj;
                System.out.println("You have withdrawn " + obj + " from your portfolio. Total amount: " + balance);
            } else {
                System.out.println("You don't have enough money in your wallet!");
            }
        } else {
            List<String> selectedList = getListByType(type);
            if (selectedList != null) {
                if (selectedList.contains(obj.toString())) {
                    selectedList.remove(obj.toString());
                    System.out.println("You have removed a " + type + " from your wallet");
                } else {
                    System.out.println("The " + type + " does not exist in your wallet!");
                }
            } else {
                System.out.println("Object type not supported!");
            }
        }
    }

    public static void lookIntoWallet() {
        System.out.println("The content of wallet");
        System.out.println("Money: " + balance);
        System.out.println("Images: " + images);
        System.out.println("Credit cards: " + creditCards);
        System.out.println("CIN: " + cin);
        System.out.println("Driver's license: " + driverLicense);
        System.out.println("Visiting cards: " + visitingCard);
    }

    private static List<String> getListByType(String type) {
        switch (type) {
            case "image":
                return images;
            case "credit-card":
                return creditCards;
            case "driver-license":
                return driverLicense;
            case "CIN":
                return cin;
            case "visiting-card":
                return visitingCard;
            default:
                return null;
        }
    }

    public static void main(String[] args) {
        addToWallet(50, "money");
        addToWallet("image1.jpg", "image");
        addToWallet("BNI card", "credit-card");
        addToWallet("CIN1", "CIN");
        addToWallet("Driver license 1", "driver-license");
        addToWallet("Doctor", "visiting-card");
        lookIntoWallet();
        removeFromWallet(20, "money");
        lookIntoWallet();
    }
}
