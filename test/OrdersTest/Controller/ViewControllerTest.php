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

use CoreTestUtils\TestCase\TestInheritanceTrait;
use Orders\Controller\ViewController;
use Orders\Entity\Order;
use Orders\Repository\Orders;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\Params;
use Zend\Mvc\Controller\PluginManager;
use Zend\ServiceManager\ServiceManager;

/**
 * Tests for \Orders\Controller\ViewController
 * 
 * @covers \Orders\Controller\ViewController
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 *  
 */
class ViewControllerTest extends \PHPUnit_Framework_TestCase
{
    use TestInheritanceTrait;

    private $repository;
    private $params;

    /**
     *
     *
     * @var array|ViewController
     */
    private $target = [
        ViewController::class,
        'targetArgs',
        '@testInheritance' => [ 'as_reflection' => true ],
        'post' => 'injectPluginManager'
    ];

    private $inheritance = [ AbstractActionController::class ];

    private function injectPluginManager()
    {
        $this->params = $this->getMockBuilder(Params::class)->setMethods(['fromQuery'])->disableOriginalConstructor()->getMock();
        $plugins = new PluginManager(new ServiceManager());
        $plugins->setService('params', $this->params);

        $this->target->setPluginManager($plugins);
    }


    private function targetArgs()
    {
        $this->repository = $this->getMockBuilder(Orders::class)->disableOriginalConstructor()->setMethods(['find'])->getMock();

        return [$this->repository];
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

    public function testConstructSetsDependencies()
    {
        $this->assertAttributeSame($this->repository, 'repository', $this->target);
    }
}
