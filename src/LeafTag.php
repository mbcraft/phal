<?php

namespace Phal {

    abstract class LeafTag extends AbstractTag {

        public final function __toString() {
            return TagHelper::openAndClose($this->name, $this->attributes);
        }

    }

}
