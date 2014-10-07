<?php

use Phal\Video;


class VideoTest extends PHPUnit_Framework_TestCase {
    function testBasicVideoTag() {
        $v = new Video();
        
        $this->assertEquals('<video></video>',$v);
    }
}
