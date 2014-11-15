<?php

namespace Thuata\Bundle\ChartsBundle\Entity;

use ArrayObject;
use JsonSerializable;

/**
 * Color definition
 *
 * @author Anthony Maudry <anthony.maudry@thuata.com>
 * @copyright (c) 2014, Anthony Maudry
 * @package Thuata\Bundle\ChartsBundle\Entity
 * @since 1.0
 * @version 1.0
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
class Color implements JsonSerializable
{
    const HEX_FORMAT = '#%s%s%s';
    /**
     * @var string
     */
    private $red;
    /**
     * @var string
     */
    private $green;
    /**
     * @var string
     */
    private $blue;
    /**
     * @var string
     */
    private $alpha;

    /**
     * Sets the red value
     *
     * @param integer $red between 0 and 255
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Color
     */
    public function setRed($red)
    {
        if ($red > 255) {
            $red = 255;
        } elseif($red < 0) {
            $red = 0;
        }

        $this->red = $red;

        return $this;
    }

    /**
     * Gets red value
     *
     * @return integer
     */
    public function getRed()
    {
        return $this->red;
    }

    /**
     * Sets the green value
     *
     * @param integer $green between 0 and 255
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Color
     */
    public function setGreen($green)
    {
        if ($green > 255) {
            $green = 255;
        } elseif($green < 0) {
            $green = 0;
        }

        $this->green = $green;

        return $this;
    }

    /**
     * Gets green value
     *
     * @return integer
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * Sets the blue value
     *
     * @param integer $blue between 0 and 255
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Color
     */
    public function setBlue($blue)
    {
        if ($blue > 255) {
            $blue = 255;
        } elseif($blue < 0) {
            $blue = 0;
        }

        $this->blue = $blue;

        return $this;
    }

    /**
     * Gets blue value
     *
     * @return integer
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * Sets the alpha value
     *
     * @param float $alpha between 0 and 255
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Color
     */
    public function setAlpha($alpha)
    {
        if ($alpha > 1) {
            $alpha = 1;
        } elseif($alpha < 0) {
            $alpha = 0;
        }

        $this->alpha = $alpha;

        return $this;
    }

    /**
     * Gets alpha value
     *
     * @return float
     */
    public function getAlpha()
    {
        return $this->alpha;
    }

    /**
     * Gets the hex value of an int
     *
     * @param integer $int
     *
     * @return string
     */
    protected function getColorHex($int)
    {
        $hex = dechex($int);
        if (strlen($hex) === 1) {
            $hex = '0' . $hex;
        }

        return $hex;
    }

    /**
     * Gets the color's hexa writing
     *
     * @return string
     */
    public function getHexa()
    {
        return sprintf(self::HEX_FORMAT, $this->getColorHex($this->getRed()), $this->getColorHex($this->getGreen()), $this->getColorHex($this->getBlue()));
    }

    /**
     * Gets a panel from current color
     *
     * @param type $panelLength
     * @return \Thuata\Bundle\ChartsBundle\Entity\Color
     */
    public function getPanelFromColor($panelLength)
    {
        $panel = new ArrayObject();

        $countTo0 = floor($panelLength / 2);
        $countTo255 = floor($panelLength / 2);

        if (($panelLength % 2) === 0) {
            $countTo255 -= 1;
        }

        $redStepBellow = floor($this->getRed() / ($countTo0 + 1));
        $greenStepBellow = floor($this->getGreen() / ($countTo0 + 1));
        $blueStepBellow = floor($this->getBlue() / ($countTo0 + 1));

        for($i = 1; $i <= $countTo0; $i++) {
            $panel[] = Color::factory(
                $i * $redStepBellow,
                $i * $greenStepBellow,
                $i * $blueStepBellow
            );
        }

        $panel[] = clone($this);

        $redStepOver = floor($this->getRed() / ($countTo0 + 1));
        $greenStepOver = floor($this->getGreen() / ($countTo0 + 1));
        $blueStepOver = floor($this->getBlue() / ($countTo0 + 1));

        for($i = 1; $i <= $countTo255; $i++) {
            $panel[] = Color::factory(
                $this->getRed() + $i * $redStepOver,
                $this->getGreen() + $i * $greenStepOver,
                $this->getBlue() + $i * $blueStepOver
            );
        }

        return $panel;
    }

    /**
     * Factory
     *
     * @param integer $red
     * @param integer $green
     * @param integer $blue
     * @param float   $alpha
     */
    public static function factory($red = 128, $green = 128, $blue = 128, $alpha = 1)
    {
        $color = new Color();

        $color->setRed($red)
              ->setGreen($green)
              ->setBlue($blue)
              ->setAlpha($alpha);

        return $color;
    }

    /**
     * {@inhretitDoc}
     */
    public function jsonSerialize()
    {
        return $this->getHexa();
    }
}