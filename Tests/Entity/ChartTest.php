<?php

namespace Thuata\Bundle\ChartsBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Thuata\Bundle\ChartsBundle\Tests\Entity\TestEntity;
use ArrayObject;

/**
 * Test for PieChart
 */
class ChartTest extends KernelTestCase
{
    const CHART_NAME = 'Chart name';
    const CHART_SUMMARY = 'Summary';
    const ID_KEY = 'id';
    const DATE_KEY = 'date';
    const AMOUNT_KEY = 'amount';
    const QUANTITY_KEY = 'quantity';
    const CATEGORY_KEY = 'category';
    const NAME_KEY = 'name';

    protected $dataMap = array(
        array(
            self::ID_KEY => 1,
            self::DATE_KEY => '2014-06-12',
            self::AMOUNT_KEY => 12.5,
            self::QUANTITY_KEY => 3,
            self::CATEGORY_KEY => 'laptop',
            self::NAME_KEY => 'Wonrderfull laptop 1'
        ),
        array(
            self::ID_KEY =>2 ,
            self::DATE_KEY => '2014-07-06',
            self::AMOUNT_KEY => 21.5,
            self::QUANTITY_KEY => 2,
            self::CATEGORY_KEY => 'laptop',
            self::NAME_KEY => 'Wonrderfull laptop 2'
        ),
        array(
            self::ID_KEY => 3,
            self::DATE_KEY => '2014-05-18',
            self::AMOUNT_KEY => 52.1,
            self::QUANTITY_KEY => 3,
            self::CATEGORY_KEY => 'laptop',
            self::NAME_KEY => 'Wonrderfull laptop 3'
        ),
        array(
            self::ID_KEY => 4,
            self::DATE_KEY => '2014-06-07',
            self::AMOUNT_KEY => 7.5,
            self::QUANTITY_KEY => 3,
            self::CATEGORY_KEY => 'smartphone',
            self::NAME_KEY => 'Wonrderfull smartphone 1'
        ),
        array(
            self::ID_KEY => 5,
            self::DATE_KEY => '2014-05-19',
            self::AMOUNT_KEY => 6.8,
            self::QUANTITY_KEY => 8,
            self::CATEGORY_KEY => 'smartphone',
            self::NAME_KEY => 'Wonrderfull smartphone 2'
        ),
        array(
            self::ID_KEY => 6,
            self::DATE_KEY => '2014-07-21',
            self::AMOUNT_KEY => 9.25,
            self::QUANTITY_KEY => 7,
            self::CATEGORY_KEY => 'smartphone',
            self::NAME_KEY => 'Wonrderfull smartphone 3'
        ),
        array(
            self::ID_KEY => 7,
            self::DATE_KEY => '2014-06-12',
            self::AMOUNT_KEY => 10.4,
            self::QUANTITY_KEY => 4,
            self::CATEGORY_KEY => 'smartphone',
            self::NAME_KEY => 'Wonrderfull smartphone 4'
        ),
        array(
            self::ID_KEY => 8,
            self::DATE_KEY => '2014-06-12',
            self::AMOUNT_KEY => 7.25,
            self::QUANTITY_KEY => 1,
            self::CATEGORY_KEY => 'office',
            self::NAME_KEY => 'Wonrderfull office 1'
        ),
        array(
            self::ID_KEY => 9,
            self::DATE_KEY => '2014-06-12',
            self::AMOUNT_KEY => 1.5,
            self::QUANTITY_KEY => 6,
            self::CATEGORY_KEY => 'office',
            self::NAME_KEY => 'Wonrderfull office 2'
        ),
        array(
            self::ID_KEY => 10,
            self::DATE_KEY => '2014-06-12',
            self::AMOUNT_KEY => 18.5,
            self::QUANTITY_KEY => 2,
            self::CATEGORY_KEY => 'office',
            self::NAME_KEY => 'Wonrderfull office 3'
        ),
        array(
            self::ID_KEY => 11,
            self::DATE_KEY => '2014-06-12',
            self::AMOUNT_KEY => 26.4,
            self::QUANTITY_KEY => 3,
            self::CATEGORY_KEY => 'office',
            self::NAME_KEY => 'Wonrderfull office 4'
        ),
        array(
            self::ID_KEY => 12,
            self::DATE_KEY => '2014-06-12',
            self::AMOUNT_KEY => 3.24,
            self::QUANTITY_KEY => 2,
            self::CATEGORY_KEY => 'virtual',
            self::NAME_KEY => 'Wonrderfull virtual 1'
        ),
        array(
            self::ID_KEY => 13,
            self::DATE_KEY => '2014-06-12',
            self::AMOUNT_KEY => 9.8,
            self::QUANTITY_KEY => 4,
            self::CATEGORY_KEY => 'virtual',
            self::NAME_KEY => 'Wonrderfull virtual 2'
        ),
    );

    /**
     * Makes test Data
     *
     * @return ArrayObject
     */
    protected function getTestData()
    {
        $data = new ArrayObject();

        foreach ($this->dataMap as $entityData) {
            $entity = TestEntity::factory()
                    ->setAmount($entityData[self::AMOUNT_KEY])
                    ->setCategory($entityData[self::CATEGORY_KEY])
                    ->setDate(\DateTime::createFromFormat('Y-m-d', $entityData[self::DATE_KEY]))
                    ->setId($entityData[self::ID_KEY])
                    ->setName($entityData[self::NAME_KEY])
                    ->setQuantity($entityData[self::QUANTITY_KEY]);

            $data[] = $entity;
        }

        return $data;
    }

    /**
     * Tests we get the good data type
     */
    public function testData()
    {
        $data = $this->getTestData();

        $this->assertTrue($data instanceof ArrayObject);
    }

    /**
     * Tests getData returns a collection of TestEntity
     */
    public function testEntity()
    {
        $data = $this->getTestData();

        foreach ($data as $entity) {
            $this->assertTrue($entity instanceof TestEntity);
        }
    }
}
