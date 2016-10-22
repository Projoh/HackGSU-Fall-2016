package gsu.hack.harassment;

public class CheckPercentage {

	static final String USERENTRY = "";
	/*
	 * Change the USERENTRY string to take user input from the website
	 * 
	 * */
	static int percentage = 0;
	
	public static void main(String[] args) {
		
		/*		
		 * 		Figure out how to retrieve the user input from the website
		 * 		then store in a variable to implement methods on.
		 * 
		 * */
		
		percentage = HarassFilter.checkHarass(USERENTRY);
		System.out.println(percentage + "%");
	}

}
