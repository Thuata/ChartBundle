<?php

namespace Thuata\Bundle\ChartsBundle\Tests\Entity\Chart;

use Thuata\Bundle\ChartsBundle\Tests\Entity\ChartTest;
use Thuata\Bundle\ChartsBundle\Entity\Chart\PieChart;

/**
 * Test for PieChart
 */
class PieChartTest extends ChartTest
{

    /**
     * Test for PieChart creation
     */
    public function testCreate()
    {
        $chart = PieChart::factory(self::CHART_NAME, self::CHART_SUMMARY);

        $this->assertTrue($chart instanceof PieChart);
    }

    /**
     * Tests the chart title
     */
    public function testTitle()
    {
        $chart = PieChart::factory(self::CHART_NAME, self::CHART_SUMMARY);

        $this->assertEquals(self::CHART_NAME, $chart->getTitle());
    }

    /**
     * Tests the chart summary
     */
    public function testSummary()
    {
        $chart = PieChart::factory(self::CHART_NAME, self::CHART_SUMMARY);

        $this->assertEquals(self::CHART_SUMMARY, $chart->getSummary());
    }

    /**
     * Tests the chart summary
     */
    public function testData()
    {
        $chart = PieChart::factory(self::CHART_NAME, self::CHART_SUMMARY);

        $data = $this->getTestData();

        $chart->setData($data);

        $this->assertEquals($data, $chart->getData());
    }
}
