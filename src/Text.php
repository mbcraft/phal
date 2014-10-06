<?php

namespace Phal {

    /**
     * This class rapresents simple plaintext. Controls should be added in order
     * to avoid tags inside text.
     */
    class Text {

        private $text;

        function __construct($plain_text) {
            $this->text = $plain_text;
        }

        function isValidAltText() {
            return strlen($this->text < 100);
        }

        function __toString() {
            return $this->text;
        }

        public static function ensureValidText($obj) {
            if ($obj instanceof self) {
                return;
            } else {
                throw new PhalException("A valid Text instance should be used.");
            }
        }

        public static function ensureValidAltText($obj) {
            if ($obj instanceof self && $obj->isValidAltText()) {
                return;
            } else {
                throw new PhalException("A valid Text instance with less than 100 chars should be used.");
            }
        }

    }

}

