<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013 - 2016 Cross Solution (http://cross-solution.de)
 * @license   MIT
 */

namespace Orders\Options;

use Cross\TestUtils\TestCase\TestSetterAndGetterTrait;
use Cross\TestUtils\TestCase\SetupTargetTrait;
use Orders\Options\ModuleOptions;

/**
 * Class ModuleOptionsTest
 *
 * @author  Carsten Bleek <bleek@cross-solution.de>
 * @since   0.29
 * @covers  Orders\Options\ModuleOptions
 * @package Orders\Options
 */
class ModuleOptionsTest extends \PHPUnit\Framework\TestCase
{
    use TestSetterAndGetterTrait, SetupTargetTrait;

    protected $target = [
        'class' => ModuleOptions::class
    ];

    public function setterAndGetterData()
    {
        return [
            ['currency', [
                'value' => 'USD',
                'default' => 'EUR'
            ]],
            ['currencySymbol', [
                'value' => '$',
                'default' => '€'
            ]],

            ['taxRate', [
                'value' => '21',
                'default' => '19'
            ]],


        ];
    }
}
