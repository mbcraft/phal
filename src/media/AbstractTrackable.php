<?php

namespace Phal {
    
    abstract class AbstractTrackable extends ParentTag {
        
        private $sources;
        private $tracks;
        
        protected function __construct($name) {
            parent::__construct($name);
            $this->sources = new ParentTagPlaceholder();
            $this->addChild($this->sources);
            $this->tracks = new ParentTagPlaceholder();
            $this->addChild($this->tracks);
        }

        function addSource($source) {
            Source::check("Child source", $source);
            $this->sources->addChild($source);
        }
        
        function getSources() {
            return $this->sources->getChilds();
        }
        
        function hasSources() {
            return $this->sources->hasChilds();
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
