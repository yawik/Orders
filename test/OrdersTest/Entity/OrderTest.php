<?php
/**
 * YAWIK
 *
 * @filesource
 * @license    MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */

/** */
namespace OrdersTest\Entity;

use Cross\TestUtils\TestCase\SetupTargetTrait;
use Cross\TestUtils\TestCase\TestInheritanceTrait;
use Cross\TestUtils\TestCase\TestSetterAndGetterTrait;
use Orders\Entity\Order;
use Orders\Entity\OrderInterface;

/**
 * Tests for Product
 *
 * @covers \Orders\Entity\Order
 * @coversDefaultClass \Orders\Entity\Order
 *
 * @author Carsten Bleek <bleek@cross-solution.de>
 * @group  Orders
 * @group  Orders.Entity
 */
class OrderTest extends \PHPUnit\Framework\TestCase
{
    use SetupTargetTrait, TestInheritanceTrait, TestSetterAndGetterTrait;

    /**
     * The "Class under Test"
     *
     * @var Order
     */
    private $target = Order::class;

    /**
     * @see TestInheritanceTrait
     *
     * @var array
     */
    private $inheritance = [ OrderInterface::class ];

    /**
     * @see TestSetterGetterTrait
     *
     * @var array
     */
    private $setterAndGetter = [
        [ 'number', 'ABCD1234' ],
        [ 'type', 'general' ],
        [ 'currency', 'USD' ],
        [ 'currencySymbol', '€' ],
        [ 'taxRate', 24 ],
        [ 'invoiceAddress', ['value_object' => 'Orders\Entity\InvoiceAddress'] ],
        [ 'entity', ['value_object' => 'Orders\Entity\Snapshot\Job\JobSnapshot'] ],
        [ 'products', ['value_object' => 'Core\Entity\Collection\ArrayCollection'] ],
    ];

    /**
     * @covers Orders\Entity\Order::setPrice
     * @covers Orders\Entity\Order::getPrice
     */
    public function testSetGetPrice() {
        $price=100;
        $this->target->setTaxRate(10.5);
        $this->target->setPrice($price);
        $this->assertEquals(110.5, $this->target->getPrice('net'));
        $this->assertEquals(10.5, $this->target->getPrice('tax'));
        $this->assertEquals(100, $this->target->getPrice('pretax'));
    }
}
