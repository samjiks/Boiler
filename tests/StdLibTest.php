<?php
namespace System\Library;

/**
 * Test class for StdLib.
 * Generated by PHPUnit on 2012-10-02 at 01:22:23.
 */
class StdLibTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StdLib
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new StdLib;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers System\Library\StdLib::decode_entities
     */
    public function testDecode_entities()
    {
    	$this->assertEquals("<", \System\Library\StdLib::decode_entities("&lt;", "Less that Entity"));
    	$this->assertEquals("<", \System\Library\StdLib::decode_entities("&#60;", "Less that Decimal"));
    	$this->assertEquals("<", \System\Library\StdLib::decode_entities("&#x3C;", "Less that Hex"));
    	$this->assertEquals("<", \System\Library\StdLib::decode_entities("&#x3c;", "Less that Hex"));
    }

    /**
     * @covers System\Library\StdLib::timeonlystamp
     * @todo Implement testTimeonlystamp().
     */
    public function testTimeonlystamp()
    {
        $this->assertEquals(1201, \System\Library\StdLib::timeonlystamp(mktime(1, 0, 1, 12, 12, 12, false)));
        $this->assertEquals(62, \System\Library\StdLib::timeonlystamp(mktime(0, 1, 2, 12, 12, 05, false)));
        $this->assertEquals(63, \System\Library\StdLib::timeonlystamp(mktime(0, 1, 3, 12, 15, 09, false)));
    }

    /**
     * @covers System\Library\StdLib::xss_clean
     * @todo Implement testXss_clean().
     */
    public function testXss_clean()
    {
    	$this->assertEmpty(\System\Library\StdLib::xss_clean("<SCRIPT SRC=http://ha.ckers.org/xss.js></SCRIPT>"));
    	$this->assertEquals("<IMG SRC=\"nojavascript...alert('XSS');\">", \System\Library\StdLib::xss_clean("<IMG SRC=\"javascript:alert('XSS');\">"));
    	$this->assertEquals("<IMG SRC=nojavascript...alert('XSS')>", \System\Library\StdLib::xss_clean("<IMG SRC=javascript:alert('XSS')>"));
    	$this->assertEquals("<IMG SRC=nojavascript...alert(\"XSS\")>", \System\Library\StdLib::xss_clean("<IMG SRC=javascript:alert(\"XSS\")>"));
    	$this->assertEquals("<IMG SRC=`nojavascript...alert(\"RSnake says, 'XSS'\")`>", \System\Library\StdLib::xss_clean("<IMG SRC=`javascript:alert(\"RSnake says, 'XSS'\")`>"));
    	$this->assertEquals("<IMG \"\"\">alert(\"XSS\")\">", \System\Library\StdLib::xss_clean("<IMG \"\"\"><SCRIPT>alert(\"XSS\")</SCRIPT>\">"));
    	$this->assertEquals("<IMG SRC=nojavascript...alert(String.fromCharCode(88,83,83))>", \System\Library\StdLib::xss_clean("<IMG SRC=javascript:alert(String.fromCharCode(88,83,83))>"));
    	$this->assertEquals("<IMG SRC=nojavascript...alert(&#39;XSS&#39;)>", \System\Library\StdLib::xss_clean("<IMG SRC=&#106;&#97;&#118;&#97;&#115;&#99;&#114;&#105;&#112;&#116;&#58;&#97;&#108;&#101;&#114;&#116;&#40;&#39;&#88;&#83;&#83;&#39;&#41;>"));
    	$this->assertEquals("<IMG SRC=nojavascript...alert(&#0000039;XSS&#0000039;)>", \System\Library\StdLib::xss_clean("<IMG SRC=&#0000106&#0000097&#0000118&#0000097&#0000115&#0000099&#0000114&#0000105&#0000112&#0000116&#0000058&#0000097&#0000108&#0000101&#0000114&#0000116&#0000040&#0000039&#0000088&#0000083&#0000083&#0000039&#0000041>"));
    	$this->assertEquals("<IMG SRC=nojavascript...alert(&#x27;XSS&#x27;)>", \System\Library\StdLib::xss_clean("<IMG SRC=&#x6A&#x61&#x76&#x61&#x73&#x63&#x72&#x69&#x70&#x74&#x3A&#x61&#x6C&#x65&#x72&#x74&#x28&#x27&#x58&#x53&#x53&#x27&#x29>"));
    	$this->assertEquals("<IMG SRC=\"nojavascript...alert('XSS');\">", \System\Library\StdLib::xss_clean("<IMG SRC=\"jav	ascript:alert('XSS');\">"));
    	$this->assertEquals("<IMG SRC=\"nojavascript...alert('XSS');\">", \System\Library\StdLib::xss_clean("<IMG SRC=\"jav&#x09;ascript:alert('XSS');\">"));
    	$this->assertEquals("<IMG SRC=\"nojavascript...alert('XSS');\">", \System\Library\StdLib::xss_clean("<IMG SRC=\"jav&#x0D;ascript:alert('XSS');\">"));
    	$this->assertEquals("<IMG SRC=nojavascript...alert(\"XSS\")>", \System\Library\StdLib::xss_clean("<IMG SRC=javasc".chr(0)."ript:alert(\"XSS\")>"));
    	$this->assertEquals("<IMG SRC=\"nojavascript...alert('XSS');\">", \System\Library\StdLib::xss_clean("<IMG SRC=\" &#14;  javascript:alert('XSS');\">"));
    	$this->assertEquals("", \System\Library\StdLib::xss_clean("<SCRIPT/XSS SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT>"));
    	$this->assertEquals("<BODY >", \System\Library\StdLib::xss_clean("<BODY onload!#$%&()*~+-_.,:;?@[/|\]^`=alert(\"XSS\")>"));
    	$this->assertEquals("", \System\Library\StdLib::xss_clean("<SCRIPT/SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT>"));
    	$this->assertEquals("<alert(\"XSS\");//<", \System\Library\StdLib::xss_clean("<<SCRIPT>alert(\"XSS\");//<</SCRIPT>"));
    	$this->assertEquals("", \System\Library\StdLib::xss_clean("<SCRIPT SRC=http://ha.ckers.org/xss.js?< B >"));
    	$this->assertEquals("", \System\Library\StdLib::xss_clean("<SCRIPT SRC=//ha.ckers.org/.j>"));
    	$this->assertEquals("<IMG SRC=\"nojavascript...alert('XSS')\"", \System\Library\StdLib::xss_clean("<IMG SRC=\"javascript:alert('XSS')\""));
    	$this->assertEquals("", \System\Library\StdLib::xss_clean("<SCRIPT/SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT>"));
    	//$this->assertEquals("", \System\Library\StdLib::xss_clean("<iframe src=http://ha.ckers.org/scriptlet.html <"));
    	//$this->assertEquals("", \System\Library\StdLib::xss_clean("\\\";alert('XSS');//"));
    	$this->assertEquals("<INPUT TYPE=\"IMAGE\" SRC=\"nojavascript...alert('XSS');\">", \System\Library\StdLib::xss_clean("<INPUT TYPE=\"IMAGE\" SRC=\"javascript:alert('XSS');\">"));
    	$this->assertEquals("<BODY BACKGROUND=\"nojavascript...alert('XSS')\">", \System\Library\StdLib::xss_clean("<BODY BACKGROUND=\"javascript:alert('XSS')\">"));
    	$this->assertEquals("<b>Test text</b>", \System\Library\StdLib::xss_clean("<b>Test text</b>"));
        // Remove the following lines when you implement this test.
    }

    /**
     * @covers System\Library\StdLib::has_post
     * @todo Implement testHas_post().
     */
    public function testHas_post()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::processPostcode
     * @todo Implement testProcessPostcode().
     */
    public function testProcessPostcode()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::processURL
     * @todo Implement testProcessURL().
     */
    public function testProcessURL()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::findURL
     * @todo Implement testFindURL().
     */
    public function testFindURL()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::has_request
     * @todo Implement testHas_request().
     */
    public function testHas_request()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::array_contains
     * @todo Implement testArray_contains().
     */
    public function testArray_contains()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::array_missing_key
     * @todo Implement testArray_missing_key().
     */
    public function testArray_missing_key()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::curl_process_output
     * @todo Implement testCurl_process_output().
     */
    public function testCurl_process_output()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::is_email
     * @todo Implement testIs_email().
     */
    public function testIs_email()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::object_order
     * @todo Implement testObject_order().
     */
    public function testObject_order()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::arrayarray_order
     * @todo Implement testArrayarray_order().
     */
    public function testArrayarray_order()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::is_interface_of
     * @todo Implement testIs_interface_of().
     */
    public function testIs_interface_of()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::get_full_interface
     * @todo Implement testGet_full_interface().
     */
    public function testGet_full_interface()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::curl_fetch
     * @todo Implement testCurl_fetch().
     */
    public function testCurl_fetch()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::xml2object
     * @todo Implement testXml2object().
     */
    public function testXml2object()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::xml2array
     * @todo Implement testXml2array().
     */
    public function testXml2array()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers System\Library\StdLib::makeArray
     * @todo Implement testMakeArray().
     */
    public function testMakeArray()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}
?>
