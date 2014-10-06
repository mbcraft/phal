<?php

use Phal\Icon;

class IconTest extends PHPUnit_Framework_TestCase {
    function testBiggestJpgIcon() {
        $i = new Icon("files/icon/biggest_icon.jpg");
        
        $this->assertEquals('<img src="files/icon/biggest_icon.jpg" alt=""/>',"".$i);
    }
    function testBiggestPngIcon() {
        $i = new Icon("files/icon/biggest_icon.png");
        
        $this->assertEquals('<img src="files/icon/biggest_icon.png" alt=""/>',"".$i);
    }
    function testBiggestGifIcon() {
        $i = new Icon("files/icon/biggest_icon.gif");
        
        $this->assertEquals('<img src="files/icon/biggest_icon.gif" alt=""/>',"".$i);
    }
}