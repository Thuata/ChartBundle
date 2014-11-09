<?php

namespace Thuata\Bundle\ChartsBundle\Entity;

use ArrayObject;
use Thuata\Bundle\ChartsBundle\Exception\NoChartTypeException;

/**
 * Abstract chart class definition
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
abstract class AbstractChart
{
    const CHART_TYPE = 'Abstract';

    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $summary;
    /**
     * @var ArrayObject
     */
    private $data;

    /**
     * Constructor. Protected to avoid "new" calls. Use factory() static method to instanciate a chart
     */
    protected function __construct() {
        if (self::CHART_TYPE === $this->getChartType()) {
            throw NoChartTypeException::factory();
        }
    }

    /**
     * Gets the chart type
     *
     * @return string
     */
    public function getChartType()
    {
        return static::CHART_TYPE;
    }

    /**
     * Sets the title
     *
     * @param string $title
     *
     * @return AbstractChart
     */
    public function setTile($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the title
     *
     * @return type
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the summary
     *
     * @param string $summary
     *
     * @return AbstractChart
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Gets the title
     *
     * @return type
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Sets the data
     *
     * @param ArrayObject $data
     *
     * @return AbstractChart
     */
    public function setData(ArrayObject $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Gets the title
     *
     * @return type
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Creates a new Chart
     *
     * @param string          $title
     * @param string          $summary
     * @param ArrayObject $data
     *
     * @return AbstractChart
     */
    public static function factory($title, $summary, ArrayObject $data = null)
    {
        $chart = new static();

        $chart->setTile($title);
        $chart->setSummary($summary);
        if ($data instanceof ArrayObject) {
            $chart->setData($data);
        }

        return $chart;
    }
}