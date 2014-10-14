<?php

use Phal\Text;
use Phal\Source;

class SourceTest extends PHPUnit_Framework_TestCase {

    function testBasicTag() {
        $s = new Source(new Text("files/sources/sample1.ogg"), new Text("media/ogg"));

        $this->assertEquals('<source src="files/sources/sample1.ogg" type="media/ogg"/>', $s);
    }

    
    function testFailNoSrcAsText() {
        try {
            $s = new Source("files/sources/sample2.ogg", new Text("media/ogg"));

            $this->fail();
        } catch (Exception $ex) {
            
        }
    }
    
    function testFailNoTypeAsText() {
        try {
            $s = new Source(new Text("files/sources/sample2.ogg"), "media/ogg");

            $this->fail();
        } catch (Exception $ex) {
            
        }
    }


}
