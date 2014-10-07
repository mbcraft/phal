<?php

namespace Phal {

    /**
     * This class handles the additions of Figures to the page.
     * This class is rendered with a figure tag.
     */
    class Figure implements IWritable {
        
        private $caption = null;
        private $image = null;

        public function __construct($caption, $situation_or_complex) {
            
            $this->caption = $caption;

            if ($situation_or_complex instanceof SituationImage || $situation_or_complex instanceof ComplexImage) {
                $this->image = $situation_or_complex;
            } else {
                throw new PhalException("A SituationImage or ComplexImage is needed in order to create a Figure with caption.");
            }
        }

        public function __toString() {
            $result = "";
            $result.= TagHelper::open("figure");
            $result.= $this->image;
            $result.= TagHelper::tagWithText("figcaption", $this->caption);
            $result.= TagHelper::close("figure");
            return $result;
        }

    }

}