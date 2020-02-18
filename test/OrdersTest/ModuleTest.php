<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */

/** */
namespace OrdersTest;

use Orders\Module;

/**
 * Tests for \Orders\Module
 *
 * @covers \Orders\Module
 * @author Carsten Bleek <bleek@cross-solution.de>
 * @group Orders
 */
class ModuleTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Path as seen from target,
     *
     * @var string
     */
    protected $moduleDir;

    /**
     * Module name space
     *
     * @var string
     */
    protected $moduleNamespace = 'Orders';

    /**
     * Class under test.
     *
     * @var Module
     */
    protected $target;

    public function setUp(): void
    {
        $this->moduleDir = realpath(__DIR__ . '/../../');
        $this->target    = new Module();
    }
    /**
     * @testdox Implements required Feature Interfaces.
     */
    public function testImplementsInterfaces()
    {
        $this->assertInstanceOf('\Laminas\ModuleManager\Feature\ConfigProviderInterface', $this->target, 'Module class does not implement ConfigProviderInterface');
    }

    public function testProvidesCorrectConfigArray()
    {
        $config = array_merge(
            include $this->moduleDir . '/config/acl.config.php',
            include $this->moduleDir . '/config/module.config.php',
            include $this->moduleDir . '/config/navigation.config.php',
            include $this->moduleDir . '/config/router.config.php',
            include $this->moduleDir . '/config/services.config.php',
            include $this->moduleDir . '/config/view.config.php'
        );
        $this->assertEquals($config, $this->target->getConfig());
    }

    public function testProvidesCorrectAutoloaderConfigArray()
    {
        // @todo
//        $config =
//            [
//                'Laminas\Loader\ClassMapAutoloader' => [
//                    __DIR__ . '/src/autoload_classmap.php'
//                ],
//                'Laminas\Loader\StandardAutoloader' => [
//                    'namespaces' => [
//                        __NAMESPACE__ => __DIR__ . '/src',
//                    ],
//                ],
//            ];
//
//         $config['Laminas\Loader\StandardAutoloader']['namespaces'][__NAMESPACE__ . 'Test']
//                    = __DIR__ . '/test/' . __NAMESPACE__ . 'Test';
//
//        $this->assertEquals($config, $this->target->getAutoloaderConfig());
    }

    /**
     * @testdox Attachs language setter listener on bootstrap event
     */
    public function testOnBootstrapListener()
    {
        //   @todo
    }
}
