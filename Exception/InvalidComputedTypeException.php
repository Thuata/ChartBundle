<?php

namespace Thuata\Bundle\ChartsBundle\Exception;

use Thuata\Bundle\ChartsBundle\Exception\ExceptionTrait;

/**
 * Invalid argument exception definition
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
class InvalidComputedTypeException extends InvalidArgumentException
{
    const MESSAGE = 'Chart::computeData() method should return an ArrayCollection instance';
    const CODE = 102;
}