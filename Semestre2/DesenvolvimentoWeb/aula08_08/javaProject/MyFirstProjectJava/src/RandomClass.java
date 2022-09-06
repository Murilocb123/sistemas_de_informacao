
import java.util.Random;

public class RandomClass {
    private int value;
    private Random random = new Random();
    
    public int RandomClass(int from, int to) {
        value = random.nextInt(to-from)+from;
        value = random.nextInt(to,from);
        return value;
    }
}
