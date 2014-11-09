<?php

namespace Thuata\Bundle\ChartsBundle\Tests\Entity\Chart\BarChart;

use Thuata\Bundle\ChartsBundle\Tests\Entity\ChartTest;
use Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data;
use Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data\Digit;
use ArrayObject;

/**
 * Test for BarChart
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
     * Test y-axis property
     */
    public function testYAxisProperty()
    {
        $chartData = Data::factory($this->getTestData());

        $chartData->setYAxisProperty(self::QUANTITY_KEY);

        $this->assertEquals(self::QUANTITY_KEY, $chartData->getYAxisProperty());
    }

    /**
     * Test x-axis property
     */
    public function testXAxisProperty()
    {
        $chartData = Data::factory($this->getTestData());

        $chartData->setXAxisProperty(self::CATEGORY_KEY);

        $this->assertEquals(self::CATEGORY_KEY, $chartData->getXAxisProperty());
    }

    public function testSumGetData()
    {
        $chartData = Data::factory($this->getTestData());

        $chartData->setXAxisProperty(self::CATEGORY_KEY);

        $this->assertTrue($chartData->getData() instanceof ArrayObject);
    }

    public function testSumGetDataValue()
    {
        $chartData = Data::factory($this->getTestData());

        $chartData->setXAxisProperty(self::CATEGORY_KEY);

        $this->assertEquals(4, $chartData->getData()->count());

        foreach ($chartData->getData() as /*@var $digit Digit */ $digit) {
            switch(true) {
                case $digit->getLabel() === 'laptop' :
                    $this->assertEquals(3, $digit->getValue());
                    break;
                case $digit->getLabel() === 'smartphone' :
                    $this->assertEquals(4, $digit->getValue());
                    break;
                case $digit->getLabel() === 'office' :
                    $this->assertEquals(4, $digit->getValue());
                    break;
                case $digit->getLabel() === 'virtual' :
                    $this->assertEquals(2, $digit->getValue());
                    break;
            }
        }
    }

    /**
     * Test on data when setting an y-axis property
     */
    public function testYValueGetData()
    {
        $chartData = Data::factory($this->getTestData());

        $chartData->setXAxisProperty(self::CATEGORY_KEY);

        $chartData->setYAxisProperty(self::QUANTITY_KEY);

        $this->assertTrue($chartData->getData() instanceof ArrayObject);
    }

    /**
     * Test on data when setting an y-axis property
     */
    public function testYValueGetDataValue()
    {
        $chartData = Data::factory($this->getTestData());

        $chartData->setXAxisProperty(self::CATEGORY_KEY);

        $chartData->setYAxisProperty(self::QUANTITY_KEY);

        $this->assertEquals(4, $chartData->getData()->count());

        foreach ($chartData->getData() as /*@var $digit Digit */ $digit) {
            switch(true) {
                case $digit->getLabel() === 'laptop' :
                    $this->assertEquals(8, $digit->getValue());
                    break;
                case $digit->getLabel() === 'smartphone' :
                    $this->assertEquals(22, $digit->getValue());
                    break;
                case $digit->getLabel() === 'office' :
                    $this->assertEquals(12, $digit->getValue());
                    break;
                case $digit->getLabel() === 'virtual' :
                    $this->assertEquals(6, $digit->getValue());
                    break;
            }
        }
    }
}
