<?php

namespace Phal {

    /**
     * This class rapresents a tag that can have childs inside phal.
     */
    abstract class ParentTag extends AbstractTag {

        private $childs = array();

        /**
         * Adds a writable child to this container.
         * 
         * @param type $tag A IWritable object to add.
         */
        public final function addChild($writable) {
            if ($writable instanceof IWritable) {
                array_push($this->childs, $writable);
            } else {
                throw new PhalException("The child added is not IWritable.");
            }
        }

        /**
         * Gets all the childs of this parent tag.
         * 
         * @return type An array of all childs.
         */
        public final function getChilds() {
            return $this->childs;
        }
        
        /**
         * Returns the presence of childs inside this tag.
         * 
         * @return type true if this tag has childs, false otherwise
         */
        public final function hasChilds() {
            return !empty($this->childs);
        }
        
        /**
         * Renders all the childs of this parent tag.
         * 
         * @return type The concatenated rendered childs.
         */
        private function renderChilds() {
            $result = "";
            foreach ($this->childs as $ch) {
                $result.= $ch;
            }
            return $result;
        }
        
        public final function __toString() {
            $result = "";
            if ($this->hasChilds()) {
                $result.= TagHelper::open($this->name, $this->attributes);
                $result.= $this->renderChilds();
                $result.= TagHelper::close($this->name);
            } else {
                $result.= TagHelper::openAndClose($this->name, $this->attributes);
            }
            return $result;
        }

    }

}