<?php

namespace Phal {
    
    /**
     * This is the Language class for identifying language of the page
     * inside Phal.
     */
    
    class Language {
    
        private static $available_languages = array("it","en","de","es","fr");
        
        /**
         * Returns the language
         * 
         * @param type $lang
         * @return type
         * @throws PhalException
         */
        public static function get($lang) {
            if (array_search(strtolower($lang), self::$available_languages)!==false)
                    return strtolower($lang);
            else 
                throw new PhalException("Language ".$lang." not found.");
        }
        
        private $lang;
        
        private function __construct($lang) {
            $this->lang = $lang;
        }
        
        public function getLang() {
            return $this->lang;
        }

    }
}
