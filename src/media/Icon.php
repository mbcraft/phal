<?php

namespace Phal {

    /**
     * This class rapresents an Icon. For this reason an empty alt
     * tag is used.
     * Maybe size checks will be added in the future.
     * 
     */
    class Icon extends LeafTag {

        function __construct($path) {
            parent::__construct("img");
            parent::addAttribute("src", new Text($path));
            parent::addAttribute("alt", Text::emptyInstance());
        }

    }

}
