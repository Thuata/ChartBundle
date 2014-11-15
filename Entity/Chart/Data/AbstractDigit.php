<?php

namespace Thuata\Bundle\ChartsBundle\Entity\Chart\Data;

use Thuata\Bundle\ChartsBundle\Entity\Color;

/**
 * Abstract data digit
 *
 * @author Anthony Maudry <anthony.maudry@thuata.com>
 * @copyright (c) 2014, Anthony Maudry
 * @package Thuata\Bundle\ChartsBundle\Entity\AbstractChart\Data
 * @since 1.0
 * @version 1.0
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
abstract class AbstractDigit implements \JsonSerializable
{
    /**
     * @var Color
     */
    private $color;

    /**
     * Sets the color
     *
     * @param Color $color
     *
     * @return AbstractDigit
     */
    public function setColor(Color $color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Gets the color
     *
     * @return Color
     */
    public function getColor()
    {
        return $this->color;
    }
}