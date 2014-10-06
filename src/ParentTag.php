<?php

namespace Phal {

    /**
     * This class rapresents a tag that can have childs inside phal.
     */
    class ParentTag extends LeafTag {

        private $childs = array();

        /**
         * Adds a child to this container.
         * 
         * @param type $tag A LeafTag or ParentTag to add.
         */
        public function addChild($tag) {
            if ($tag instanceof LeafTag) {
                array_push($this->childs, $tag);
            } else {
                throw new PhalException("The tag added do not inherits from LeafTag.");
            }
        }

        /**
         * Gets all the childs of this parent tag.
         * 
         * @return type
         */
        public function getChilds() {
            return $this->childs;
        }

        /**
         * Renders all the childs of this parent tag.
         * 
         * @return type
         */
        private function renderChilds() {
            $result = "";
            foreach ($this->childs as $ch) {
                $result.= $ch;
            }
            return $result;
        }
        
        function __toString() {
            $result = TagHelper::open($this->name, $this->attributes);
            $result.= $this->renderChilds();
            $result.= TagHelper::close($this->name);
            return $result;
        }

    }

}