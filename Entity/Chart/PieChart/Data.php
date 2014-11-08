<?php

namespace Thuata\Bundle\ChartsBundle\Entity\Chart\PieChart;

use Doctrine\Common\Collections\ArrayCollection;
use Thuata\Bundle\ChartsBundle\Entity\Chart\AbstractData;
use InvalidArgumentException;

/**
 * Pie Chart Data definition
 *
 * @author Anthony Maudry <anthony.maudry@thuata.com>
 * @copyright (c) 2014, Anthony Maudry
 * @package Thuata\Bundle\ChartsBundle\Entity\PieChart
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
    private $groupingProperty;

    /**
     * @var string
     */
    private $summingProperty;

    /**
     * Sets the property to group
     *
     * @param string $property
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\PieChart\Data
     *
     * @throws InvalidArgumentException
     */
    public function setGroupingProperty($property)
    {
        if (!is_string($property)) {
            throw new InvalidArgumentException();
        }
        $this->groupingProperty = $property;

        $this->computeData();

        return $this;
    }

    /**
     * Gets the grouping property
     *
     * @param string $property
     *
     * @return type
     */
    public function getGroupingProperty()
    {
        return $this->groupingProperty;
    }

    /**
     * Sets the summing property
     *
     * @param string|null $property
     *
     * @return \Thuata\Bundle\ChartsBundle\Entity\Chart\PieChart\Data
     *
     * @throws InvalidArgumentException
     */
    public function setSummingProperty($property)
    {
        if (!is_string($property) and !is_null($property)) {
            throw new InvalidArgumentException();
        }
        
        $this->summingProperty = $property;

        $this->computeData();

        return $this;
    }

    /**
     * Gets the summing property
     *
     * @return string|null
     */
    public function getSummingProperty()
    {
        return $this->summingProperty;
    }

    /*
     * Computes the data
     *
     * @return ArrayCollection
     */
    protected function getComputedData()
    {
        if (!$this->getGroupingProperty() or !$this->getEntities()) {
            return new ArrayCollection();
        }
        $data = array();
        foreach ($this->getEntities() as $entity) {
            $entry = $this->getPropertyValue($entity, $this->getGroupingProperty());

            $value = 1;
            if ($this->getSummingProperty()) {
                $value = $this->getPropertyValue($entity, $this->getSummingProperty());
            }

            if (!array_key_exists($entry, $data)) {
                $data[$entry] = new Data\Digit();
                $data[$entry]->setName($entry)
                             ->setValue(0.0)
                             ->setUnit('');
            }

            $data[$entry]->incrementValue($value);
        }

        return new ArrayCollection(array_values($data));
    }
}