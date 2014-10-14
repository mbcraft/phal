<?php

namespace Phal {

    class Source extends LeafTag {

        function __construct($src, $type) {
            Text::check("Attribute src", $src);
            Text::check("Attribute type", $type);

            parent::__construct("source");
            parent::addAttribute("src", $src);
            parent::addAttribute("type", $type);
        }

        public static function check($what, $obj) {
            if (!($obj instanceof Source))
                throw new PhalException($what . " must be of class Source!");
        }

    }

}
