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

use Cross\TestUtils\TestCase\ContainerDoubleTrait;
use Cross\TestUtils\TestCase\SetupTargetTrait;
use Cross\TestUtils\TestCase\TestInheritanceTrait;
use Orders\Controller\ViewController;
use Orders\Factory\Controller\ViewControllerFactory;
use Orders\Repository\Orders;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * Tests for \Orders\Factory\Controller\ViewControllerFactory
 *
 * @covers \Orders\Factory\Controller\ViewControllerFactory
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 *
 */
class ViewControllerFactoryTest extends \PHPUnit\Framework\TestCase
{
    use SetupTargetTrait, TestInheritanceTrait, ContainerDoubleTrait;

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
        $repositories = $this->createContainerDouble(['Orders' => ['service' => $repository, 'count' => 1]]);
        $container = $this->createContainerDouble(
            ['repositories' => ['service' => $repositories, 'count' => 1]],
            ['target' => \Interop\Container\ContainerInterface::class]
        );

        $controller = $this->target->__invoke($container, 'irrelevant');

        $this->assertInstanceOf(ViewController::class, $controller);
    }
}
