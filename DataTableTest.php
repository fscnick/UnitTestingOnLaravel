<?php

/**
 * Import the class that is needed in this bunch of testing.
 *
 */
use app\controllers\dataTableTestController;

class DataTableTest extends TestCase {

	/**
	 * Use a string to demostrate the life cycle of TestCase.
	 *
	 * At each stage, append an identified string to it.
	 *
	 * Print it at all thing is finished.(i.e. tearDownAfterClass())
	 */
	protected static $temp;
	

	/**
	 * This method will be call before the entire test starting.
	 *
	 */
	public static function setUpBeforeClass(){
		print_r(__METHOD__."\n");
		DataTableTest::$temp="";
	}

	/**
	 * This method will be call after the entire test finishing.
	 *
	 */
	public static function tearDownAfterClass(){
		print_r(DataTableTest::$temp."\n");
		print_r(__METHOD__."\n");
	}

	/**
	 * This method will be call before each testing method starting.
	 *
	 * The method, $this->getName(), could retrieve the test method name,
	 * following by this setUp() invoking.
	 *
	 * NOTE: Be sure to call the 'parent::setUp()' at the beginning,
	 * 		 There is something to do by laravel testunit.
	 */
	public function setUp(){
		parent::setUp();
		
		if($this->getName() == "testLoadDataTable"){
			DataTableTest::$temp=DataTableTest::$temp."\ntestLoadDataTable_setUp ";
		}else if($this->getName() == "testLoadDataTable2"){
			DataTableTest::$temp=DataTableTest::$temp."\ntestLoadDataTable2_setUp ";
		}else if($this->getName() == "testNextExamine"){
			DataTableTest::$temp=DataTableTest::$temp."\ntestNextExamine_setUp ";
		}
	}

	/**
	 * This method will be call after each testing method finishing.
	 *
	 * The method, $this->getName(), could retrieve the test method name,
	 * before this tearDown() invoking.
	 *
	 */
	public function tearDown(){

		if($this->getName() == "testLoadDataTable"){
			DataTableTest::$temp=DataTableTest::$temp."testLoadDataTable_tearDown ";
		}else if($this->getName() == "testLoadDataTable2"){
			DataTableTest::$temp=DataTableTest::$temp."testLoadDataTable2_tearDown ";
		}else if($this->getName() == "testNextExamine"){
			DataTableTest::$temp=DataTableTest::$temp."testNextExamine_tearDown ";
		}
		
	}

	/**
	 * This method will be invoked after setUp().
	 *
	 */
	protected function assertPreConditions(){

		if($this->getName() == "testLoadDataTable"){
			DataTableTest::$temp=DataTableTest::$temp."testLoadDataTable_assertPre ";
		}else if($this->getName() == "testLoadDataTable2"){
			DataTableTest::$temp=DataTableTest::$temp."testLoadDataTable2_assertPre ";
		}else if($this->getName() == "testNextExamine"){
			DataTableTest::$temp=DataTableTest::$temp."testNextExamine_assertPre ";
		}
	}

	/**
	 * This method will be invoked before tearDown().
	 *
	 * NOTE: If an error or an assertion faild, this method would not be called.
	 */
	protected function assertPostConditions(){

		if($this->getName() == "testLoadDataTable"){
			DataTableTest::$temp=DataTableTest::$temp."testLoadDataTable_assertPost ";
		}else if($this->getName() == "testLoadDataTable2"){
			DataTableTest::$temp=DataTableTest::$temp."testLoadDataTable2_assertPost ";
		}else if($this->getName() == "testNextExamine"){
			DataTableTest::$temp=DataTableTest::$temp."testNextExamine_assertPost ";
		}
	}

	/**
	 * This method will be invoked after tearDown() when the testing is failed or an error.
	 *
	 */
	protected function onNotSuccessfulTest(Exception $e){

		if($this->getName() == "testLoadDataTable"){
			DataTableTest::$temp=DataTableTest::$temp."testLoadDataTable_NotSuccess ";
		}else if($this->getName() == "testLoadDataTable2"){
			DataTableTest::$temp=DataTableTest::$temp."testLoadDataTable2_NotSuccess ";
		}else if($this->getName() == "testNextExamine"){
			DataTableTest::$temp=DataTableTest::$temp."testNextExamine_NotSuccess ";
		}
		throw $e;
	}

	/**
	 * This test method will pass the testing.
	 */
	public function testLoadDataTable(){

		DataTableTest::$temp=DataTableTest::$temp.__METHOD__." ";

		$response = $this->call('GET', 'dataTableTest');

		$this->assertTrue(true);

	}

	/**
	 * This test method will cause a testing error.
	 */
	public function testLoadDataTable2(){

		DataTableTest::$temp=DataTableTest::$temp.__METHOD__." ";
		
		$response = $this->call('GET','dataTableTest');

		print_r($aa);		// this line will cause an testing error, there is no variable $aa.
		$this->assertResponseStatus(403);

		
	} 

	/**
	 * This test method will cause a testing failure.
	 */
	public function testNextExamine(){

		DataTableTest::$temp=DataTableTest::$temp.__METHOD__." ";

		$response = $this->call('POST', 
								'api/v1/next', 
								array('id' => '6160020')
								);

		$this->assertEquals('15', $response->getContent());		

	}

}
