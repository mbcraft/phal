<?php

use Phal\Audio;

class AudioTest extends PHPUnit_Framework_TestCase {
    function testBasicAudioTag() {
        $a = new Audio();
        
        $this->assertEquals('<audio></audio>',$a);
    }
}
