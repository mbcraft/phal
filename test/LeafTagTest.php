<?php

use Phal\LeafTag;
use Phal\Text;

class MyTag1 extends LeafTag {

    function __construct() {
        parent::__construct("my_tag1");
    }

}

class MyTag2 extends LeafTag {

    function __construct() {
        parent::__construct("my_tag2");
        parent::addAttribute("attr", new Text("val"));
    }

}

class MyTag3 extends LeafTag {

    function __construct() {
        parent::__construct("my_tag3");
        parent::addAttribute("attr2", new Text("val2"));
        parent::addProperty("prop");
    }

}

class MyTag4WithErrorInAttributeName extends LeafTag {

    function __construct() {
        parent::__construct("my_tag4");
        parent::addAttribute("attr3", new Text("val3"));
        parent::addProperty("prop");
    }

}

class MyTag5WithErrorInPropertyName extends LeafTag {

    function __construct() {
        parent::__construct("my_tag5");
        parent::addAttribute("attr4", new Text("val4"));
        parent::addProperty("pr op");
    }

}

class LeafTagTest extends PHPUnit_Framework_TestCase {

    function testLeafTestTag1() {
        $t = new MyTag1();

        $this->assertEquals('<my_tag1/>', $t);
    }

    function testLeafTestTag2() {
        $t = new MyTag2();

        $this->assertEquals('<my_tag2 attr="val"/>', $t);
    }

    function testLeafTestTag3() {
        $t = new MyTag3();

        $this->assertEquals('<my_tag3 attr2="val2" prop/>', $t);
    }

    function testLeafTestTag4WithErrorInAttributeName() {
        try {
            $t = new MyTag4WithErrorInAttributeName();
            $this->fail();
        } catch (Exception $ex) {
            
        }
    }

    function testLeafTestTag5WithErrorInPropertyName() {
        try {
            $t = new MyTag5WithErrorInPropertyName();
            $this->fail();
        } catch (Exception $ex) {
            
        }
    }

}
