<?php

namespace Phal {

    /**
     * This is a class responsible for handling the HTML inside Phal.
     * It contains methods to set meta tags and for adding accessible content
     * to the page.
     * 
     */
    class HTML extends ParentTag {

        private $language = null;
        public $title = null;
        public $description = null;
        public $author;
        private $keywords = array();
        private $stylesheets = array();
        
        private $page_content = "";

        /**
         * Sets the language of this page. Use Language::get to get a valid
         * instance of Language.
         * 
         * @param \phal\Language $l The language of this page.
         * @throws PhalException If $l is not a valid Language instance.
         */
        public function setLanguage($l) {
            if ($l instanceof Language)
                $this->language = $l;
            else 
                throw new PhalException("Only instances of Language are ammissibile.");
        }
        
        /**
         * Returns the Language of this page if set, or null.
         * 
         * @return type The Language of this page.
         */
        public function getLanguage() {
            return $this->language;
        }
        
        /**
         * Pushes a keyword on the keyword array for this page.
         * 
         * @param type $kw A kayword
         */
        public function addKeyword($kw) {
            array_push($this->keywords , $kw);
        }
        
        /**
         * 
         * Gets all the keywords for this page.
         * 
         * @return type An array of keywords for this page.
         */
        public function getKeywords() {
            return $this->keywords;
        }
        
        /**
         * Adds a stylesheet to this page.
         * 
         * @param type $src The path of the stylesheet to add.
         */
        public function addStylesheet($src) {
            array_push($this->stylesheets, $src);
        }
        
        /**
         * Gets all the stylesheets added to this page
         * 
         * @return type An array with all the stylesheets paths.
         */
        public function getStylesheets() {
            return $this->stylesheets;
        }
        
        /**
         * Internal function used to render the html open tag with language attribute.
         * 
         * @return type
         */
        private function renderHtmlOpen() {
            if ($this->language!=null) {
                $p = array("lang" => $this->language);
            } else { 
                $p = array();
            }
            return TagHelper::open("html",$p);
        }
        
        /**
         * Internal function used to render all the meta tags of the page
         * 
         * @throws PhalException
         */
        private function renderHead() {
            if ($this->title==null) {
            throw new PhalException("A page title must be set!"); }
            if ($this->description==null) {
            throw new PhalException("A page description must be set!!"); }
            
            $result = "";
            $result.= TagHelper::open("head");
            $result.= TagHelper::tagWithText("title", $this->title);
            $result.= TagHelper::close("head");
            return $result;
        }
        
        /**
         * 
         * Returns the content of this page as string.
         * 
         * @return type The rendered content of this page.
         */
        public function __toString() {
            $result = "";
            $result.= TagHelper::doctype("html");
            $result.= $this->renderHtmlOpen();
            $result.= $this->renderHead();
            $result.= TagHelper::open("body");
            $result.= $this->renderChilds();
            $result.= TagHelper::close("body");
            $result.= TagHelper::close("html");
        }

    }

}