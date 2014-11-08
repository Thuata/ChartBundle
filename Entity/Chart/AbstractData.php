<?php

namespace Thuata\Bundle\ChartsBundle\Entity\Chart;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Thuata\Bundle\ChartsBundle\Exception\InvalidComputedTypeException;

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
abstract class AbstractData
{

    /**
     * @var ArrayCollection
     */
    private $entities;
    /**
     * @var ArrayCollection
     */
    private $data;

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
     * Constructor
     */
    protected function __construct()
    {
    }

    /**
     * Sets the entities that constitute the data
     *
     * @param ArrayCollection $entities
     *
     * @return AbstractChartData
     */
    public function setEntities(ArrayCollection $entities)
    {
        $this->entities = $entities;

        $this->computeData();

        return $this;
    }

    /**
     * Gets the entities that constitute the data
     *
     * @return ArrayCollection
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * Gets the data
     *
     * @return ArrayCollection
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Computes the data
     *
     * @return AbstractData
     */
    protected function computeData()
    {
        $this->data = $this->getComputedData();

        if (!$this->data instanceof ArrayCollection) {
            throw new InvalidComputedTypeException();
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
     * Factory
     *
     * @param ArrayCollection $entities
     *
     * @return AbstractChartData
     */
    public static function factory(ArrayCollection $entities = null)
    {
        $chartData = new static();

        if (!is_null($entities)) {
            $chartData->setEntities($entities);
        }

        return $chartData;
    }
}