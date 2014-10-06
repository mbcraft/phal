<?php

use Phal\Language;

class LanguageTest extends PHPUnit_Framework_TestCase {
    
    function testLanguageOk() {

        $l1 = Language::get("it");

        $this->assertTrue($l1 instanceof Language);

        $l2 = Language::get("en");

        $this->assertTrue($l2 instanceof Language);

        $l3 = Language::get("EN");

        $this->assertTrue($l3 instanceof Language);

    }
    function testLanguageError() {
        try {
            $l = Language::get("xx");
            $this->fail();
        }
        catch(Exception $ex) {
            
        }
    }
    
}