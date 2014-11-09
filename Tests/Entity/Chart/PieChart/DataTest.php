<?php

namespace Thuata\Bundle\ChartsBundle\Tests\Entity\Chart\PieChart;

use Thuata\Bundle\ChartsBundle\Tests\Entity\ChartTest;
use Thuata\Bundle\ChartsBundle\Entity\Chart\PieChart\Data;
use \Thuata\Bundle\ChartsBundle\Entity\Chart\PieChart\Data\Digit;
use ArrayObject;

/**
 * Test for PieChart
 */
class DataTest extends ChartTest
{

    /**
     * Test for PieChart creation
     */
    public function testCreate()
    {
        $chartData = Data::factory($this->getTestData());

        $this->assertTrue($chartData instanceof Data);
    }

    /**
     * Test property
     */
    public function testProperty()
    {
        $chartData = Data::factory($this->getTestData());

        $chartData->setGroupingProperty(self::CATEGORY_KEY);

        $this->assertEquals(self::CATEGORY_KEY, $chartData->getGroupingProperty());
    }

    /**
     * Tests the summing property
     */
    public function testSumProperty()
    {
        $chartData = Data::factory($this->getTestData());

        $chartData->setSummingProperty(self::AMOUNT_KEY);

        $this->assertEquals(self::AMOUNT_KEY, $chartData->getSummingProperty());
    }

    /**
     * Tests that get data returns an instance of ArrayObject
     */
    public function testGetData()
    {
        $chartData = Data::factory($this->getTestData());

        $chartData->setGroupingProperty(self::CATEGORY_KEY);

        $this->assertTrue($chartData->getData() instanceof ArrayObject);
    }

    /**
     * Tests the values
     */
    public function testGetDataValues()
    {
        $chartData = Data::factory($this->getTestData());

        $chartData->setGroupingProperty(self::CATEGORY_KEY);

        $this->assertEquals(4, $chartData->getData()->count());

        foreach ($chartData->getData() as /*@var $digit \Thuata\Bundle\ChartsBundle\Entity\Chart\PieChart\Data\Digit */ $digit) {
            switch(true) {
                case $digit->getName() === 'laptop' :
                    $this->assertEquals(3, $digit->getValue());
                    break;
                case $digit->getName() === 'smartphone' :
                    $this->assertEquals(4, $digit->getValue());
                    break;
                case $digit->getName() === 'office' :
                    $this->assertEquals(4, $digit->getValue());
                    break;
                case $digit->getName() === 'virtual' :
                    $this->assertEquals(2, $digit->getValue());
                    break;
            }
        }
    }

    /**
     * Tests the values
     */
    public function testGetDataValuesSum()
    {
        $chartData = Data::factory($this->getTestData());

        $chartData->setGroupingProperty(self::CATEGORY_KEY);

        $chartData->setSummingProperty(self::QUANTITY_KEY);

        $this->assertEquals(4, $chartData->getData()->count());

        foreach ($chartData->getData() as /*@var $digit \Thuata\Bundle\ChartsBundle\Entity\Chart\PieChart\Data\Digit */ $digit) {
            switch(true) {
                case $digit->getName() === 'laptop' :
                    $this->assertEquals(8, $digit->getValue());
                    break;
                case $digit->getName() === 'smartphone' :
                    $this->assertEquals(22, $digit->getValue());
                    break;
                case $digit->getName() === 'office' :
                    $this->assertEquals(12, $digit->getValue());
                    break;
                case $digit->getName() === 'virtual' :
                    $this->assertEquals(6, $digit->getValue());
                    break;
            }
        }
    }
}
