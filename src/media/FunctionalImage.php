<?php

namespace Phal {

    /**
     * This class rapresents a functional image, an image with a purpose.
     * It needs a path and a purpose.
     */
    class FunctionalImage extends LeafTag {

        function __construct($path, $purpose) {
            parent::__construct("image");
            parent::addAttribute("src", $path);
            parent::addAttribute("alt", $purpose);
        }

    }

}