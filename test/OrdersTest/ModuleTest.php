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
class ModuleTest extends \PHPUnit_Framework_TestCase
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

    public function setUp()
    {
        $this->moduleDir = realpath(__DIR__ . '/../../');
        $this->target    = new Module();
    }
    /**
     * @testdox Implements required Feature Interfaces.
     */
    public function testImplementsInterfaces()
    {
        $this->assertInstanceOf('\Zend\ModuleManager\Feature\AutoloaderProviderInterface', $this->target, 'Module class does not implement AutoloaderProviderInterface');
        $this->assertInstanceOf('\Zend\ModuleManager\Feature\ConfigProviderInterface', $this->target, 'Module class does not implement ConfigProviderInterface');
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
//                'Zend\Loader\ClassMapAutoloader' => [
//                    __DIR__ . '/src/autoload_classmap.php'
//                ],
//                'Zend\Loader\StandardAutoloader' => [
//                    'namespaces' => [
//                        __NAMESPACE__ => __DIR__ . '/src',
//                    ],
//                ],
//            ];
//
//         $config['Zend\Loader\StandardAutoloader']['namespaces'][__NAMESPACE__ . 'Test']
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