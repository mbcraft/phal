<?php

use Phal\PhalException;

class PhalExceptionTest extends PHPUnit_Framework_TestCase {
    function testException() {
        try {
            throw new PhalException("This is an exception");
        } catch (Exception $ex) {
            $this->assertEquals($ex->getMessage(),"This is an exception");
        }
    }
}