<?php

namespace Phal {

    /**
     * This class handles the addition of Video to the pages.
     */
    class Video extends AbstractTrackable {

        private $description;

        public function __construct($description) {
            $this->description = $description;
        }
        
        public function __toString() {
            return TagHelper::openAndClose("video",$p);
        }

    }

}
