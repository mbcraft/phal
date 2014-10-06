<?php

namespace Phal {

    /**
     * This class rapresents simple plaintext. Controls should be added in order
     * to avoid tags inside text.
     */
    class Text implements IWritable {

        private static $empty = null;
        private $text;

        function __construct($plain_text) {
            $this->text = $plain_text;
        }

        function isValidAltText() {
            return strlen($this->text) < 100;
        }

        function __toString() {
            return $this->text;
        }

        public function ensureValidAltText() {
            if ($this->isValidAltText()) {
                return;
            } else {
                throw new PhalException("A valid Text instance with less than 100 chars should be used.");
            }
        }
        
        public static function emptyInstance() {
            if (self::$empty==null) 
                self::$empty = new Text("");
            return self::$empty;
        }

    }

}

