<?php

use Phal\TagHelper;
use Phal\Text;

class TagHelperTest extends PHPUnit_Framework_TestCase {

    function testDoctype() {
        $this->assertEquals('<!DOCTYPE html>', TagHelper::doctype("html"));
    }

    function testComment() {
        $this->assertEquals('<!--THIS IS A COMMENT-->', TagHelper::comment("THIS IS A COMMENT"));
    }

    function testOpenTag() {
        $this->assertEquals('<my_tag>', TagHelper::open("my_tag"));
        $this->assertEquals('<my_tag property another="value">', TagHelper::open("my_tag",array("property" => null,"another" => "value")));
        
    }

    function testCloseTag() {
        $this->assertEquals('</my_tag>', TagHelper::close("my_tag"));
    }

    function testTagWithText() {
        $this->assertEquals('<my_tag>This is a sample text</my_tag>', TagHelper::tagWithText("my_tag", new Text("This is a sample text")));
    }

}

