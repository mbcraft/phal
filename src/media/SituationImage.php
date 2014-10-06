<?php

namespace Phal {
    /**
     * This class rapresents a 'situation image', so an image that can
     * be described. Checks will be added to ensure that alt text is no more
     * than 100 chars.
     * 
     */
    class SituationImage extends LeafTag {
        
        function __construct($description, $path) {
            if ($description instanceof Text && $description->isValidAltText()) {
                parent::__construct("image");
                parent::addAttribute("src", $path);
                parent::addAttribute("alt", $description);
            }
            else
                throw new PhalException("Invalid description for this image. Use class Text and be sure that no more than 100 chars are used.");
        }
    }
}