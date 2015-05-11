<?php

class Pendaftarantest extends PHPunit_Framework_Testcase {
	
	/*
	 * Testing the addition function
	 */

	public function testHitung(){
		$myclass = new pendaftaran();
		$result = $myclass->hitung(1,1);
		$this->assertEquals(2, $result);
	}
}
