<?php

namespace Phal {
    
    /**
     * This class rapresents a parent placeholder tag. It does not render
     * any tag itself, but can contain other tags or texts. It is used to
     * keep an order inside the html and to reserve place for tags to be 
     * inserted in special conditions.
     */
    class ParentTagPlaceholder implements IWritable {
        
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
         * Renders all the childs of this parent placeholder tag.
         * 
         * @return type The concatenated rendered childs.
         */
        public final function __toString() {
            $result = "";
            foreach ($this->childs as $ch) {
                $result.= $ch;
            }
            return $result;
        }
        
    }
    
}