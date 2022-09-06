import java.util.Scanner;
import java.util.Random;
public class App {
    private static int[] value = new int[10];
    public static void main(String[] args) throws Exception {
        Random aux = new Random(); 
        int i =0;
        for (i = 0; i<10;i++)
            value[i] = aux.nextInt(1,10);
        int a = 0;
        while (a < value.length) {
            System.out.println(value[a]);
            a +=1;
        }
    }
}
