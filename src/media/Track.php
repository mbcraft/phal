<?php

namespace Phal {
    
    /**
     * Rapresents text descriptions for audio or video tags.
     */
    class Track extends LeafTag {
        
        const CAPTIONS = "captions";
        const SUBTITLES = "subtitles";
        const CHAPTERS = "chapters";
        
        protected function __construct($kind,$src,$srclang,$lang,$label) {
            Text::check("Attribute src",$src);
            Language::check("Attribute srclang",$srclang);
            Language::check("Attribute lang",$lang);
            Text::check("Attribute label",$label);
                        
            parent::__construct("track");
            parent::addAttribute("kind", new Text($kind));
            parent::addAttribute("src", $src);
            parent::addAttribute("srclang", new Text($srclang));
            parent::addAttribute("lang", new Text($lang));
            parent::addAttribute("label", $label);
        }
        
        public static function newCaptions($src,$srclang,$lang,$label) {
            return new Track(self::CAPTIONS,$src,$srclang,$lang,$label);
        }
        
        public static function newSubtitles($src,$srclang,$lang,$label) {
            return new Track(self::SUBTITLES,$src,$srclang,$lang,$label);
        }
        
        public static function newChapters($src,$srclang,$lang,$label) {
            return new Track(self::CHAPTERS,$src,$srclang,$lang,$label);
        }
        
        public static function check($what,$obj) {
            if (!($obj instanceof Track))
                throw new PhalException($what." must be of class Track!");
        }
                
    }
    
}