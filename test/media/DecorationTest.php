<?php

use Phal\Decoration;

class DecorationTest extends PHPUnit_Framework_TestCase {
    
    function testBasicDecorations() {
        $d = new Decoration("files/decorations/strange_separator.jpg");
        
        $this->assertEquals('<img src="files/decorations/strange_separator.jpg" alt=""/>',$d);
    }
    
}