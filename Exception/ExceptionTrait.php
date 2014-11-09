<?php

namespace Thuata\Bundle\ChartsBundle\Exception;

/**
 * Exception trait definition. Gives common constructor to all ChartsBundle exceptions
 *
 * @author Anthony Maudry <anthony.maudry@thuata.com>
 * @copyright (c) 2014, Anthony Maudry
 * @package Thuata\Bundle\ChartsBundle\Exception
 * @since 1.0
 * @version 1.0
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
trait ExceptionTrait
{
    /**
     * Factory
     *
     * @param \Exception $previous
     *
     * @return \Exception
     */
    public static function factory(\Exception $previous = null) {
        return new static(static::MESSAGE, static::CODE, $previous);
    }

}