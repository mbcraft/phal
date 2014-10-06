<?php

namespace Phal {

    abstract class AbstractTag implements IWritable {

        protected $name;
        protected $attributes = array();

        protected function __construct($name) {
            $this->name = $name;
        }

        protected final function addAttribute($name, $value) {
            self::ensureValidAttributeOrPropertyName($name);
            self::ensureValidAttributeValue($value);
            if (!isset($this->attributes[$name])) {
                $this->attributes[$name] = $value;
            } else {
                throw new PhalException("Attribute or property " . $name . " is already set!");
            }
        }

        private static final function ensureValidAttributeValue($value) {
            if (!($value instanceof Text)) {
                throw new PhalException("Attribute value must be of class Text.");
            }
        }

        protected static final function ensureValidAttributeOrPropertyName($name) {
            if (strpos($name, " ") !== false) {
                throw new PhalException($name . " is not a valid attribute or property name!");
            }
        }

        protected final function addProperty($prop) {
            self::ensureValidAttributeOrPropertyName($prop);
            if (!isset($this->attributes[$prop])) {
                $this->attributes[$prop] = null;
            } else {
                throw new PhalException("Attribute or property " . $prop . " is already set!");
            }
        }

    }

}