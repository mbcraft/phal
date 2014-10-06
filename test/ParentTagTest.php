<?php

use Phal\Text;
use Phal\LeafTag;
use Phal\ParentTag;

class LeafTagA extends LeafTag {
    function __construct() {
        parent::__construct("l_tag");
        parent::addProperty("my_prop");
    }
}

class ParentTagA extends ParentTag {
    function __construct() {
        parent::__construct("p_tag");
        parent::addProperty("prop");
        parent::addAttribute("attr", new Text("val"));
    }
}

class ParentTagTest extends PHPUnit_Framework_TestCase {
    
    function testParentTagWithoutChilds() {
        $t = new ParentTagA();
        
        $this->assertEquals('<p_tag prop attr="val"/>',$t);
    }
    
    function testParentTagWithText() {
        $t = new ParentTagA();
        $t->addChild(new Text("Some text"));
        
        $this->assertEquals('<p_tag prop attr="val">Some text</p_tag>',$t);
    }
    
    function testParentTagWithTagChild() {
        $t = new ParentTagA();
        $t->addChild(new LeafTagA());
        
        $this->assertEquals('<p_tag prop attr="val"><l_tag my_prop/></p_tag>',$t);
    }
    
    function testParentTagWithMixedChilds() {
        $t = new ParentTagA();
        $t->addChild(new LeafTagA());
        $t->addChild(new Text("Some text"));
        $t->addChild(new LeafTagA());
        $t->addChild(new Text("Other ..."));
        
        $this->assertEquals('<p_tag prop attr="val"><l_tag my_prop/>Some text<l_tag my_prop/>Other ...</p_tag>',$t);
    }
    
}
