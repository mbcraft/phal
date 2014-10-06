<?php

namespace Phal {
    /**
     * This class rapresents a decoration. For this reason an empty alt
     * tag is used.
     * 
     */
    class Decoration extends LeafTag {
        
        function __construct($path) {
            parent::__construct("img");
            parent::addAttribute("src", new Text($path));
            parent::addAttribute("alt", Text::emptyInstance());
        }
        
    }
    
}
