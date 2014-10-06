<?php

namespace Phal {

    abstract class LeafTag implements IWritable {

        protected $name;
        protected $attributes = array();

        protected function __construct($name) {
            $this->name = $name;
        }

        protected final function addAttribute($name, $value) {
            if (!isset($this->attributes[$name])) {
                $this->attributes[$name] = $value;
            } else {
                throw new PhalException("Attribute or property " . $name . " is already set!");
            }
        }

        protected final function addProperty($prop) {
            if (!isset($this->attributes[$prop])) {
                $this->attributes[$prop] = null;
            } else {
                throw new PhalException("Attribute or property " . $prop . " is already set!");
            }
        }

        public final function __toString() {
            return TagHelper::openAndClose($this->name, $this->attributes);
        }

    }

}
