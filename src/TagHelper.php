<?php

namespace Phal {

    /**
     * This class is an helper for generating tag in phal.
     * 
     */
    class TagHelper {

        /**
         * Returns an opening tag with the specified name and attributes.
         * If attributes has no value (eg. null) they're considered properties.
         * (eg. checked or readonly).
         * 
         * @param type $name The name of the Tag.
         * @param type $attributes The attributes of the Tag.
         * @return type A string
         */
        public static function open($name, $attributes = array()) {
            self::ensureValidTagAttributeOrPropertyName($name);
            $result = "<" . $name;
            foreach ($attributes as $k => $value) {
                self::ensureValidTagAttributeOrPropertyName($k);
                $result.= " " . $k;
                if ($value !== null) {
                    $result.= "=\"" . $value . "\"";
                }
            }
            $result.= ">";
            return $result;
        }

        /**
         * Generates a closing tag with the specified name.
         * 
         * @param type $name The name of the tag.
         * @return type A string
         */
        public static function close($name) {
            self::ensureValidTagAttributeOrPropertyName($name);
            return "</" . $name . ">";
        }

        /**
         * Generates a self-closing tag with the specified name.
         * 
         * @param type $name The name of the tag.
         * @return type A string
         */
        public static function openAndClose($name,$attributes=array()) {
            self::ensureValidTagAttributeOrPropertyName($name);
            $result = "<" . $name;
            foreach ($attributes as $k => $value) {
                self::ensureValidTagAttributeOrPropertyName($k);
                $result.= " " . $k;
                if ($value !== null) {
                    $result.= "=\"" . $value . "\"";
                }
            }
            $result.= "/>";
            return $result;
        }
        
        public static function tagWithText($name,$text) {
            Text::ensureValidText($text);
            return "<".$name.">".$text."</".$name.">";
        }
        
        private static function ensureValidTagAttributeOrPropertyName($val) {
            if (strpos($val, " ")!==false) {
                    throw new PhalException($val." is not a valid tag, attribute or property name!");
            }
        }

        /**
         * Generates a !DOCTYPE tag.
         * 
         * @param type $type The doctype to generate
         * @return type A string
         */
        public static function doctype($type) {
            return "<!DOCTYPE " . $type . ">";
        }

        /** 
         * Generates a comment tag.
         * 
         * @param type $text The text of the comment
         * @return type A string
         */
        public static function comment($text) {
            return "<!--" . $text . "-->";
        }

    }

}