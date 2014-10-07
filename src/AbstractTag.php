<?php

namespace Phal {

    abstract class AbstractTag implements IWritable {

        protected $name;
        protected $attributes = array();

        protected function __construct($name) {
            $this->name = $name;
        }

        public final function addAttribute($name, $value) {
            self::ensureValidAttributeOrPropertyName($name);
            Text::check("Attribute ".$name,$value);
            if (!isset($this->attributes[$name])) {
                $this->attributes[$name] = "".$value;
            } else {
                throw new PhalException("Attribute or property " . $name . " is already set!");
            }
        }

        protected static final function ensureValidAttributeOrPropertyName($name) {
            if (strpos($name, " ") !== false) {
                throw new PhalException($name . " is not a valid attribute or property name!");
            }
        }

        public final function addProperty($prop) {
            self::ensureValidAttributeOrPropertyName($prop);
            if (!isset($this->attributes[$prop])) {
                $this->attributes[$prop] = null;
            } else {
                throw new PhalException("Attribute or property " . $prop . " is already set!");
            }
        }

    }

}