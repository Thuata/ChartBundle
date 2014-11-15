<?php

namespace Thuata\Bundle\ChartsBundle\Entity\Chart\PieChart\Data;

use Thuata\Bundle\ChartsBundle\Entity\Chart\Data\AbstractDigit;

/**
 * Pie chart digit definition
 *
 * @author Anthony Maudry <anthony.maudry@thuata.com>
 * @copyright (c) 2014, Anthony Maudry
 * @package Thuata\Bundle\ChartsBundle\Entity\Chart\PieChart\Data
 * @since 1.0
 * @version 1.0
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
class Digit extends AbstractDigit
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $value;

    /**
     * Sets the name
     *
     * @param string $name
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\Data\AbstractDigit
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value
     *
     * @param float $value
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\Data\AbstractDigit
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Increments the value by $step
     *
     * @param number $step
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\Data\AbstractDigit
     */
    public function incrementValue($step = 1)
    {
        if (!is_numeric($this->value)) {
            $this->value = 0.0;
        }

        $this->value += $step;

        return $this;
    }

    /**
     * Gets the value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {
        return array(
            'name' => $this->getName(),
            'value' => $this->getValue(),
            'color' => $this->getColor()
        );
    }
}