<?php

use Phal\Text;
use Phal\LeafTag;
use Phal\ParentTagPlaceholder;

class LeafTagD extends LeafTag {
    function __construct() {
        parent::__construct("my_tag");
        parent::addAttribute("attr_name", new Text("attr_value"));
    }
}

class ParentTagPlaceholderTest extends PHPUnit_Framework_TestCase {
    
    function testEmptyParentTagPlaceholder() {
        $t = new ParentTagPlaceholder();
        
        $this->assertEquals("",$t);
    }
    
    function testParentTagPlaceholderWithText() {
        $t = new ParentTagPlaceholder();
        $t->addChild(new Text("This is a placeholder child"));
        $this->assertEquals("This is a placeholder child",$t);
    }
    
    function testParentTagPlaceholderWithMixedContent() {
        $t = new ParentTagPlaceholder();
        $t->addChild(new Text("This is a placeholder child"));
        $t->addChild(new LeafTagD());
        $t->addChild(new Text("and some more text ..."));
        $this->assertEquals('This is a placeholder child<my_tag attr_name="attr_value"/>and some more text ...',$t);
    }
    
}