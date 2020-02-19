<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2017 Cross Solution <http://cross-solution.de>
 */

/** */
namespace OrdersTest\Controller;

use Cross\TestUtils\TestCase\SetupTargetTrait;
use Cross\TestUtils\TestCase\TestInheritanceTrait;
use Orders\Controller\ViewController;
use Orders\Entity\Order;
use Orders\Repository\Orders;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Mvc\Controller\Plugin\Params;
use Laminas\Mvc\Controller\PluginManager;
use Laminas\ServiceManager\ServiceManager;

/**
 * Tests for \Orders\Controller\ViewController
 *
 * @covers \Orders\Controller\ViewController
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 *
 */
class ViewControllerTest extends \PHPUnit\Framework\TestCase
{
    use SetupTargetTrait, TestInheritanceTrait;

    /**
     * @var \PhpUnit\Framework\MockObject\MockObject|\Orders\Repository\Orders
     */
    private $repository;
    private $params;

    /**
     *
     *
     * @var array|ViewController
     */
    private $target = [
        'create' => [
            [
                'for' => 'testInheritance',
                'target' => ViewController::class,
                'reflection' => true
            ],
            [
                'callback' => 'createTarget'
            ]
        ],
    ];

    private $inheritance = [ AbstractActionController::class ];

    private function injectPluginManager()
    {
        $this->params = $this->getMockBuilder(Params::class)->setMethods(['fromQuery'])->disableOriginalConstructor()->getMock();
        $plugins = new PluginManager(new ServiceManager());
        $plugins->setService('params', $this->params);

        $this->target->setPluginManager($plugins);
    }


    private function createTarget()
    {
        /** @var \Orders\Repository\Orders $repository */
        $this->repository = $repository = $this->getMockBuilder(Orders::class)->disableOriginalConstructor()->setMethods(['find'])->getMock();
        $target = new ViewController($repository);
        $this->params = $this->getMockBuilder(Params::class)->setMethods(['fromQuery'])->disableOriginalConstructor()->getMock();
        $plugins = new PluginManager(new ServiceManager());
        $plugins->setService('params', $this->params);

        $target->setPluginManager($plugins);

        return $target;
    }

    public function testIndexActionThrowsExceptionIfNoIdIsPassed()
    {
        $this->params->expects($this->once())->method('fromQuery')->with('id')->willReturn(null);

        $this->expectException(\UnexpectedValueException::class);
        $this->expectExceptionMessage('No order id');

        $this->target->indexAction();
    }

    public function testIndexActionThrowsExceptionIfNoOrderIsFound()
    {
        $this->params->expects($this->once())->method('fromQuery')->with('id')->willReturn(10);
        $this->repository->expects($this->once())->method('find')->with(10)->willReturn(null);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('No order with');

        $this->target->indexAction();
    }

    public function testIndexActionReturnsExpectedValue()
    {
        $order = new Order();
        $this->params->expects($this->once())->method('fromQuery')->with('id')->willReturn(10);
        $this->repository->expects($this->once())->method('find')->with(10)->willReturn($order);

        $expected = [
            'order' => $order
        ];

        $actual = $this->target->indexAction();

        $this->assertEquals($expected, $actual);
    }
}
