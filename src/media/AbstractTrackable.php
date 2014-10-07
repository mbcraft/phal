<?php

namespace Phal {
    
    abstract class AbstractTrackable extends ParentTag {
        
        private $tracks;
        
        protected function __construct($name) {
            parent::__construct($name);
            $this->tracks = new ParentTagPlaceholder();
            $this->addChild($this->tracks);
        }
        
        function addTrack($track) {
            Track::check("Child track", $track);
            $this->tracks->addChild($track);
        }
        
        function getTracks() {
            return $this->tracks->getChilds();
        }
        
        function hasTracks() {
            return $this->tracks->hasChilds();
        }
                
    }
}
