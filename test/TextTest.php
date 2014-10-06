<?php

use Phal\Text;

class TextTest extends PHPUnit_Framework_TestCase {
    
    function testText() {
        $t = new Text("This is a sample text.");
        
        $this->assertEquals($t,"This is a sample text.");
    }
    
    function testIsValidAltText() {
        $t = new Text("This is a valid alt text.");
        
        $this->assertTrue($t->isValidAltText());

        $t2 = new Text("This is not a valid alt text\
                    It's really too long to fit a 100 characters\
                    limit, and so this test will surely not work....\
                    well ... i think i'll write some more test to be sure\
                    that everything fails ... ok now there should be more\
                    than 100 characters ...");
        
        $this->assertFalse($t2->isValidAltText());
    }
    
    function testEnsureValidAltText() {
        try {
            $t = new Text("This is a valid alt text.");
            $t->ensureValidAltText();
        } catch(Exception $ex) {
            $this->fail($ex);
        }
        
        try {
            $t = new Text("This is not a valid alt text\
                    It's really too long to fit a 100 characters\
                    limit, and so this test will surely not work....\
                    well ... i think i'll write some more test to be sure\
                    that everything fails ... ok now there should be more\
                    than 100 characters ...");
            $t->ensureValidAltText();
            $this->fail();
        } catch (Exception $ex) {
        }
    }
    
}