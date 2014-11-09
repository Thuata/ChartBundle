<?php

namespace Thuata\Bundle\ChartsBundle\Tests\Closure\ClosureTest;

/**
 * Test class
 *
 * @author Anthony Maudry <anthony.maudry@thuata.com>
 * @copyright (c) 2014, Anthony Maudry
 * @package Thuata\Bundle\ChartsBundle\Tests\ClosureTest
 * @since 1.0
 * @version 1.0
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
class ClosureAwareClass {
    /**
     * @var \Closure
     */
    private $closure;

    /**
     * Sets a closure
     *
     * @param \Closure $closure
     *
     * @return \Thuata\Bundle\ChartsBundle\Tests\ClosureTest\ClosureAwareClass
     */
    public function setClosure(\Closure $closure)
    {
        $this->closure = $closure;
        return $this;
    }

    /**
     * Gets a closure
     *
     * @return \Closure
     */
    public function getClosure()
    {
        return $this->closure;
    }
}