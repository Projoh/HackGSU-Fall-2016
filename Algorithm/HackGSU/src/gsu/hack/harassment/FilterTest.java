package gsu.hack.harassment;

import static org.junit.Assert.*;

import org.junit.Test;

import gsu.hack.harassment.*;

public class FilterTest {

	@Test
	public void checkHarrassMethodTest() {
		String str1 = "I think that you are a piece of fuck shit";
		HarassFilter test = new HarassFilter();
		assertTrue(test.checkHarass(str1) == 12);
	}
}
