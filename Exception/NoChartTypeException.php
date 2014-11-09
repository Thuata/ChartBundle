<?php

namespace Thuata\Bundle\ChartsBundle\Exception;

/**
 * Logic exception for charts, triggered if chart has not chart type constant
 *
 * @author Anthony Maudry <anthony.maudry@thuata.com>
 * @copyright (c) 2014, Anthony Maudry
 * @package Thuata\Bundle\ChartsBundle\Exception
 * @since 1.0
 * @version 1.0
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
class NoChartTypeException extends LogicException
{
    const MESSAGE = 'No type provided for the chart. You should either devine the CHART_TYPE class constant or override the getChartType() method.';
    const CODE = 112;
}