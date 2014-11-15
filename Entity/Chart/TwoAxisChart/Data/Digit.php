<?php

namespace Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data;

use Thuata\Bundle\ChartsBundle\Entity\Chart\Data\AbstractDigit;

/**
 * 2 axis chart digit definition
 *
 * @author Anthony Maudry <anthony.maudry@thuata.com>
 * @copyright (c) 2014, Anthony Maudry
 * @package Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data
 * @since 1.0
 * @version 1.0
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
class Digit extends AbstractDigit
{
    /**
     * @var mixed
     */
    private $xAxisValue;
    /**
     * @var mixed
     */
    private $yAxisValue;
    /**
     * @var mixed
     */
    private $label;

    /**
     * Sets the x-axis value
     *
     * @param mixed $value
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data\Digit
     */
    public function setXAxisValue($value)
    {
        $this->xAxisValue = $value;

        return $this;
    }

    /**
     * Gets the x-axis value
     *
     * @return mixed
     */
    public function getXAxisValue()
    {
        return $this->xAxisValue;
    }

    /**
     * Sets the y-axis value
     *
     * @param mixed $value
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data\Digit
     */
    public function setYAxisValue($value)
    {
        $this->yAxisValue = $value;

        return $this;
    }

    /**
     * Gets the y-axis value
     *
     * @return mixed
     */
    public function getYAxisValue()
    {
        return $this->yAxisValue;
    }

    /**
     * Increments x-axis value
     *
     * @param type $step
     *
     * @return Digit
     */
    public function incrementYAxisValue($step = 1)
    {
        $this->yAxisValue += $step;

        return $this;
    }

    /**
     * Sets the label
     *
     * @param string $label
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data\Digit
     */
    public function setLabel($label)
    {
       $this->label = $label;

       return $this;
    }

    /**
     * Gets the label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {
        return array(
            'label' => $this->getLabel(),
            'x' => $this->getXAxisValue(),
            'y' => $this->getYAxisValue()
        );
    }
}