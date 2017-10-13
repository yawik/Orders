<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2017 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace OrdersTest\Factory\Controller;

use CoreTestUtils\TestCase\ServiceManagerMockTrait;
use CoreTestUtils\TestCase\TestInheritanceTrait;
use Orders\Controller\ViewController;
use Orders\Factory\Controller\ViewControllerFactory;
use Orders\Repository\Orders;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Tests for \Orders\Factory\Controller\ViewControllerFactory
 * 
 * @covers \Orders\Factory\Controller\ViewControllerFactory
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 *  
 */
class ViewControllerFactoryTest extends \PHPUnit_Framework_TestCase
{
    use TestInheritanceTrait, ServiceManagerMockTrait;

    /**
     *
     *
     * @var string|ViewControllerFactory
     */
    private $target = ViewControllerFactory::class;

    private $inheritance = [ FactoryInterface::class ];

    public function testInvokationCreatesViewController()
    {
        $repository = $this->getMockBuilder(Orders::class)->disableOriginalConstructor()->getMock();
        $repositories = $this->createPluginManagerMock(['Orders' => ['service' => $repository, 'count' => 1]]);
        $container = $this->createServiceManagerMock(['repositories' => ['service' => $repositories, 'count' => 1]]);

        $controller = $this->target->__invoke($container, 'irrelevant');

        $this->assertInstanceOf(ViewController::class, $controller);
    }
}
