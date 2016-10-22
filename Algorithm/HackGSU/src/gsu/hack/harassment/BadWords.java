package gsu.hack.harassment;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.io.InputStream;
import java.net.URL;

public class BadWords {
	
	private static String words[][] = new String[3][];
	private static int ok = 17 + 2; //Add two for comment & empty line in text file
	private static int med = 26 + 2; //Add two for comment & empty line in text file
	private static int bad = 430 + 1; //Add one for comment in text file
	private static String p = new File("").getAbsolutePath();
	
	public static String[][] openFile() {
		
		//Add the file to the path
		p = p.concat("/bad_words.txt");
		
		//Set the a limit for the amount of words in each row
		words[0] = new String[getOk()];
		words[1] = new String[getMed()];
		words[2] = new String[getBad()];
		
		//Read the text file to add bad words to an array
		try {
			FileReader fr = new FileReader(p);
			//Wrap file
			BufferedReader br = new BufferedReader(fr);
			
			//Add each line of file into the words array
			for(int i = 0; i < words.length; i++) {				
				
				for(int j = 0; j < words[i].length; j++) {
					try {
						words[i][j] = br.readLine();
					}
					catch (IOException e) {
						e.printStackTrace();
					}
				}
			}
			
		}
		catch (FileNotFoundException e1) {
			e1.printStackTrace();
		}
		
		return words;
	}
	

	public static int getOk() {
		return ok;
	}

	public static void setOk(int ok) { //USE ONLY IF OK WORDS ARE ADDED TO WORDS.TXT
		BadWords.ok = ok;
	}

	public static int getMed() {
		return med;
	}

	public static void setMed(int med) { //USE ONLY IF MED WORDS ARE ADDED TO WORDS.TXT
		BadWords.med = med;
	}

	public static int getBad() {
		return bad;
	}

	public static void setBad(int bad) { //USE ONLY IF BAD WORDS ARE ADDED TO WORDS.TXT
		BadWords.bad = bad;
	}

	public static void setP(String p) { //USE ONLY IF THE FILE PATH OF WORDS.TXT IS CHANGED
		BadWords.p = p;
	}
	
}
