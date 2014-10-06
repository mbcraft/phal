<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
