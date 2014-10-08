<?php

use Phal\Text;
use Phal\SituationImage;

class SituationImageTest extends PHPUnit_Framework_TestCase {

    function testBaseTag() {
        $s = new SituationImage(new Text("This is a photo about sea."), new Text("files/situation_images/conraua_goliath.jpg"));

        $this->assertEquals('<img src="files/situation_images/conraua_goliath.jpg" alt="This is a photo about sea."/>', $s);
    }

}
