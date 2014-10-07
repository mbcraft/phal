<?php

namespace Phal {
    
    abstract class AbstractTrackable extends ParentTag {
        
        private $tracks = array();
        
        function addTrack($track) {
            Track::check("Child track", $track);
            array_push($this->tracks,$track);
        }
    }
}
