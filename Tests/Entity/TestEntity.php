<?php

namespace Thuata\Bundle\ChartsBundle\Tests\Entity;

/**
 * Test entity defintion. Entities to test the charts
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
class TestEntity {
    /**
     * @var integer
     */
    private $id;
    /**
     * @var \DateTime
     */
    private $date;
    /**
     * @var float
     */
    private $amount;
    /**
     * @var integer
     */
    private $quantity;
    /**
     * @var string
     */
    private $category;
    /**
     * @var string
     */
    private $name;

    /**
     * Sets the id
     *
     * @param integer $id
     *
     * @return \Thuata\Bundle\ChartsBundle\Tests\Entity\TestEntity
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     *
     * @return \Thuata\Bundle\ChartsBundle\Tests\Entity\TestEntity
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Gets the date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the amount
     *
     * @param float $amount
     *
     * @return \Thuata\Bundle\ChartsBundle\Tests\Entity\TestEntity
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Gets the amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets the quantity
     *
     * @param integer $quantity
     *
     * @return \Thuata\Bundle\ChartsBundle\Tests\Entity\TestEntity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Gets the quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the category
     *
     * @param string $category
     *
     * @return \Thuata\Bundle\ChartsBundle\Tests\Entity\TestEntity
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Gets the category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the name
     *
     * @param string $name
     *
     * @return \Thuata\Bundle\ChartsBundle\Tests\Entity\TestEntity
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function __toString() {
        return $this->getName();
    }

    /**
     * Factory
     *
     * @return TestEntity
     */
    public static function factory()
    {
        return new self();
    }
}