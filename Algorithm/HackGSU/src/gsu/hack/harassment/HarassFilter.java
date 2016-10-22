package gsu.hack.harassment;

public class HarassFilter {
	
	private static final int type1 = 0;
	private static final int type2 = 1;
	private static final int type3 = 2;
	private int multiplier = 0;
	private int percentage = 0;
	static String[][] words = BadWords.openFile();
	
	//Use to check if the user's entry has harassing language
	public static int checkHarass(String userEntry) {
		int percentage = 0;
		int multiplier = 0;
		
		//Loop through array to identify matching words
		for(int i = 0; i < words.length; i++) {
			
			for(int j = 0; j < words[i].length; j++) {
				
				//Remove quotation marks from the text file
				words[i][j] = words[i][j].replace("\"", "");
				
				//Remove commas from the text file
				words[i][j] = words[i][j].replace(",", "");
				
				//If null there are no more words in this row
				if(words[i][j] == null)
					break;
				
				//Ignore comments and blank lines in the text file
				else if(words[i][j].startsWith("//") || words[i][j].length() < 2)
					continue;
				
				//Make all words lower case and check to see if the word matches any of the input
				else if(userEntry.toLowerCase().contains(words[i][j].toLowerCase())) {
				
					if(i == type1)	//Check if row of OK bad words
						multiplier = 1;
					if(i == type2)	//Check if row of med bad words
						multiplier = 4;
					if(i == type3)	//Check if row of harsh bad words
						multiplier = 8;
				
					percentage += multiplier;
				}
			}
			
		}
		//Likelihood the statement is harassing
		return percentage;
	}
	
}
