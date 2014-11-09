<?php

namespace Thuata\Bundle\ChartsBundle\Tests\Closure;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Thuata\Bundle\ChartsBundle\Tests\Closure\ClosureTest\ClosureAwareClass;

/**
 * Tests for closures
 *
 * @author Anthony Maudry <anthony.maudry@thuata.com>
 * @copyright (c) 2014, Anthony Maudry
 * @package Thuata\Bundle\ChartsBundle\Tests
 * @since 1.0
 * @version 1.0
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
class ClosureTest extends KernelTestCase {
    /**
     * Tests a closure
     */
    public function testClosure()
    {
        $class = new ClosureAwareClass();

        $class->setClosure(function() { return true; });

        $this->assertTrue($class->getClosure() instanceof \Closure);
    }

    /**
     * Tests callable
     */
    public function testFunction()
    {
        $class = new ClosureAwareClass();

        $class->setClosure(function() { return true; });

        $this->assertTrue(is_callable($class->getClosure()));
    }

    /**
     * Tests closure call
     */
    public function testCall()
    {
        $class = new ClosureAwareClass();

        $class->setClosure(function() { return true; });

        $fn = $class->getClosure();

        $this->assertTrue($fn());
    }
}