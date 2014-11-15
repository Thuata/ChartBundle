<?php

namespace Thuata\Bundle\ChartsBundle\Entity\Chart;

use ArrayObject;
use JsonSerializable;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Thuata\Bundle\ChartsBundle\Exception\InvalidComputedTypeException;
use Thuata\Bundle\ChartsBundle\Entity\Color;

/**
 * Abstract Chart Data definition
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
abstract class AbstractData extends ArrayObject implements JsonSerializable
{

    /**
     * @var ArrayCollection
     */
    private $entities;
    /**
     * @var ArrayObject
     */
    private $data;
    /**
     * @var Color
     */
    private $mainColor;

    /**
     * Gets the value of an entity property
     *
     * @staticvar type $propertyAccessor
     *
     * @param mixed  $entity
     * @param string $propertyName
     *
     * @return mixed
     */
    protected function getPropertyValue($entity, $propertyName)
    {
        static $propertyAccessor = null;

        if (is_null($propertyAccessor)) {
            $propertyAccessor = PropertyAccess::createPropertyAccessor();
        }

        return $propertyAccessor->getValue($entity, $propertyName);
    }

    /**
     * Sets the entities that constitute the data
     *
     * @param mixed $entities
     *
     * @return AbstractChartData
     */
    public function setEntities($entities)
    {
        $this->entities = $entities;

        $this->computeData();

        return $this;
    }

    /**
     * Gets the entities that constitute the data
     *
     * @return mixed
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * Gets the data
     *
     * @return ArrayObject
     */
    public function getData()
    {
        return $this->data;
    }

    public function setMainColor(Color $color)
    {
        $this->mainColor = $color;
    }

    public function getMainColor()
    {
        if (is_null($this->mainColor)) {
            $this->mainColor = Color::factory();
        }

        return $this->mainColor;
    }

    /**
     * Computes the data
     *
     * @return AbstractData
     */
    protected function computeData()
    {
        $this->data = $this->getComputedData();

        if (!$this->data instanceof ArrayObject) {
            throw new InvalidComputedTypeException();
        }

        $nbColors = $this->data->count();

        $colors = $this->getMainColor()->getPanelFromColor($nbColors);

        foreach ($this->data as $key => /* @var $data Data\AbstractDigit */ $data) {
            $data->setColor($colors[$key]);
        }

        return $this;
    }

    /**
     * Gets the computed data
     *
     * @return ArrayCollection
     */
    abstract protected function getComputedData();

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {
        return array(
            'data' => $this->getData()
        );
    }

    /**
     * Factory
     *
     * @param mixed $entities
     *
     * @return AbstractChartData
     */
    public static function factory($entities = null)
    {
        $chartData = new static();

        if (!is_null($entities)) {
            $chartData->setEntities($entities);
        }

        return $chartData;
    }
}