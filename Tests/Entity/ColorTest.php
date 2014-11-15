<?php

namespace Thuata\Bundle\ChartsBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Thuata\Bundle\ChartsBundle\Entity\Color;

/**
 * Color test definition
 *
 * @author Anthony Maudry <anthony.maudry@thuata.com>
 * @copyright (c) 2014, Anthony Maudry
 * @package Thuata\Bundle\ChartsBundle\Tests\Entity
 * @since 1.0
 * @version 1.0
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
class ColorTest extends KernelTestCase
{
    public function testRed()
    {
        $color = new Color();

        $color->setRed(100);

        $this->assertEquals(100, $color->getRed());
    }

    public function testGreen()
    {
        $color = new Color();

        $color->setGreen(100);

        $this->assertEquals(100, $color->getGreen());
    }

    public function testBlue()
    {
        $color = new Color();

        $color->setBlue(100);

        $this->assertEquals(100, $color->getBlue());
    }

    /**
     * Tests the hexa color
     */
    public function testGetHexaBelowTen()
    {
        $color = new Color();

        $color->setRed(9)
              ->setBlue(9)
              ->setGreen(9);

        $this->assertEquals('#090909', $color->getHexa());
    }

    /**
     * Tests the hexa color
     */
    public function testGetHexaOverTen()
    {
        $color = new Color();

        $color->setRed(12)
              ->setBlue(204)
              ->setGreen(150);

        $this->assertEquals('#0c96cc', $color->getHexa());
    }

    public function testGetColorPanelTest()
    {
        $color = Color::factory(128, 128, 128);

        $panel = $color->getPanelFromColor(3);

        $expected = Color::factory(64, 64, 64);

        $expectedOver = Color::factory(192, 192, 192);

        $this->assertEquals($expected->getRed(), $panel[0]->getRed());
        $this->assertEquals($expected->getGreen(), $panel[0]->getGreen());
        $this->assertEquals($expected->getBlue(), $panel[0]->getBlue());

        $this->assertEquals($color->getRed(), $panel[1]->getRed());
        $this->assertEquals($color->getGreen(), $panel[1]->getGreen());
        $this->assertEquals($color->getBlue(), $panel[1]->getBlue());

        $this->assertEquals($expectedOver->getRed(), $panel[2]->getRed());
        $this->assertEquals($expectedOver->getGreen(), $panel[2]->getGreen());
        $this->assertEquals($expectedOver->getBlue(), $panel[2]->getBlue());
    }

    /**
     * Test for color panel
     */
    public function testGetColorPanelTestFive()
    {
        $color = Color::factory(192, 192, 192);

        $panel = $color->getPanelFromColor(5);

        $expected = Color::factory(64, 64, 64);

        $expectedOver = Color::factory(128, 128, 128);

        $this->assertEquals($expected->getRed(), $panel[0]->getRed());
        $this->assertEquals($expected->getGreen(), $panel[0]->getGreen());
        $this->assertEquals($expected->getBlue(), $panel[0]->getBlue());

        $this->assertEquals($expectedOver->getRed(), $panel[1]->getRed());
        $this->assertEquals($expectedOver->getGreen(), $panel[1]->getGreen());
        $this->assertEquals($expectedOver->getBlue(), $panel[1]->getBlue());

        $this->assertEquals($color->getRed(), $panel[2]->getRed());
        $this->assertEquals($color->getGreen(), $panel[2]->getGreen());
        $this->assertEquals($color->getBlue(), $panel[2]->getBlue());
    }
}