<?php

namespace Phal {

    /**
     * This class handles the addition of Audio to the pages.
     */
    class Audio extends LeafTag {

        private $description;

        public function __construct($description) {
            $this->description = $description;
        }
        
        public function __toString() {
            $result = "";
            $result.= TagHelper::open("audio");
            $result.= TagHelper::close("audio");
            return $result;
        }

    }

}


