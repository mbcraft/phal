<?php

/**
 *
 * @author Marco Bagnaresi <marco.bagnaresi@gmail.com>
 */
namespace Phal {
    /**
     * This interface rapresents content that can be written inside the html.
     */
    interface IWritable {
        function __toString();
    }
}
