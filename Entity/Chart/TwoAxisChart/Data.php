<?php

namespace Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart;

use ArrayObject;
use Closure;
use Thuata\Bundle\ChartsBundle\Entity\Chart\AbstractData;
use Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data\Digit;
use InvalidArgumentException;
use Thuata\Bundle\ChartsBundle\Exception\LabelNotFoundException;

/**
 * Pie Chart Data definition
 *
 * @author Anthony Maudry <anthony.maudry@thuata.com>
 * @copyright (c) 2014, Anthony Maudry
 * @package Thuata\Bundle\ChartsBundle\Entity\TwoAxisChart
 * @since 1.0
 * @version 1.0
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
class Data extends AbstractData
{
    /**
     * @var string
     */
    private $xAxisProperty;

    /**
     * @var Closure
     */
    private $xAxisTransformer;

    /**
     * @var string
     */
    private $yAxisProperty;

    /**
     * @var string
     */
    private $labelProperty;

    /**
     * Sets the property for x-axis
     *
     * @param string $property
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data
     *
     * @throws InvalidArgumentException
     */
    public function setXAxisProperty($property)
    {
        if (!is_string($property)) {
            throw new InvalidArgumentException();
        }
        $this->xAxisProperty = $property;

        $this->computeData();

        return $this;
    }

    /**
     * Gets the proporty for x-axis
     *
     * @return string
     */
    public function getXAxisProperty()
    {
        return $this->xAxisProperty;
    }

    /**
     * Sets a transformer for x-axis. The transformer is a closure that will be given
     * a single parametter : a x-axis value. The closure will be bind to the entity
     * providing the value. Meaning it's execution scope ($this) will be the entity.
     * ie, usefull for converting dates to ensure getting
     * monthly, daily or so abscissa.
     *
     * @param Closure $transformer
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data
     */
    public function setXAxisTransformer(Closure $transformer)
    {
        $this->xAxisTransformer = $transformer;

        return $this;
    }

    /**
     * Gets the x-axis tranformer
     *
     * @return Closure
     */
    public function getXAxisTransformer()
    {
        return $this->xAxisTransformer;
    }

    /**
     * Sets the property for y-axis
     *
     * @param string $property
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data
     *
     * @throws InvalidArgumentException
     */
    public function setYAxisProperty($property)
    {
        if (!is_string($property)) {
            throw new InvalidArgumentException();
        }
        $this->yAxisProperty = $property;

        $this->computeData();

        return $this;
    }

    /**
     * Gets the property for y-axis
     *
     * @return type
     */
    public function getYAxisProperty()
    {
        return $this->yAxisProperty;
    }

    /**
     * Sets the property to get label
     *
     * @param string $labelProperty
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\TwoAxisChart\Data
     */
    public function setLabelProperty($labelProperty)
    {
        $this->labelProperty = $labelProperty;

        return $this;
    }

    /**
     * Gets the property to get label
     *
     * @return string
     */
    public function getLabelProperty()
    {
        return $this->labelProperty;
    }

    /**
     * Gets the value for x-axis from an entity
     *
     * @param mixed $entity
     *
     * @return mixed
     */
    protected function getXAxisValue($entity)
    {
        $transformer = $this->getXAxisTransformer();
        if ($transformer instanceof Closure) {
            $transformer->bindTo($entity, $entity);
            $xAxisValue = $transformer($this->getPropertyValue($entity, $this->getXAxisProperty()));
        } else {
            $xAxisValue = $this->getPropertyValue($entity, $this->getXAxisProperty());
        }

        return $xAxisValue;
    }

    /**
     * Gets the value for y-axis from an entity
     *
     * @param mixed $entity
     *
     * @return mixed
     */
    protected function getYAxisValue($entity)
    {
        if (!is_null($this->getYAxisProperty())) {
            $yAxisValue = $this->getPropertyValue($entity, $this->getYAxisProperty());
        } else {
            $yAxisValue = 1;
        }

        return $yAxisValue;
    }

    /**
     * Gets the label value for an entity
     *
     * @param mixed $entity
     *
     * @return string
     */
    protected function getLabelValue($entity)
    {
        if (!is_null($this->getLabelProperty())) {
            $label = $this->getPropertyValue($entity, $this->getLabelProperty());
        } elseif(method_exists($entity, '__toString')) {
            $label = $entity->__toString();
        } else {
            $label = null;
        }

        return $label;
    }

    /*
     * Computes the data
     *
     * @return ArrayObject
     */
    protected function getComputedData()
    {
        if (!$this->getXAxisProperty()) {
            return new ArrayObject();
        }

        $array = array();

        foreach ($this->getEntities() as $entity) {
            $xAxisValue = $this->getXAxisValue($entity);

            $yAxisValue = $this->getYAxisValue($entity);

            $label = $this->getLabelValue($entity);

            if (!array_key_exists($xAxisValue, $array)) {
                $digit = new Digit();
                $digit->setXAxisValue($xAxisValue)
                      ->setLabel($label);
                $array[$xAxisValue] = $digit;
            } else {
                $digit = $array[$xAxisValue];
            }
            $digit->incrementYAxisValue($yAxisValue);
        }

        return new ArrayObject(array_values($array));
    }
}