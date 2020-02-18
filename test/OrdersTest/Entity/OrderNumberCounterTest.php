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

use Core\Entity\EntityInterface;
use Core\Entity\IdentifiableEntityInterface;
use Cross\TestUtils\TestCase\TestInheritanceTrait;
use Cross\TestUtils\TestCase\TestSetterAndGetterTrait;
use Orders\Entity\OrderNumberCounter;

/**
 * Tests for OrderNumberCounter
 *
 * @covers \Orders\Entity\OrderNumberCounter
 * @coversDefaultClass \Orders\Entity\OrderNumberCounter
 *
 * @author Carsten Bleek <bleek@cross-solution.de>
 * @group  Orders
 * @group  Orders.Entity
 */
class OrderNumberCounterTest extends \PHPUnit\Framework\TestCase
{
    use TestInheritanceTrait, TestSetterAndGetterTrait;

    /**
     * The "Class under Test"
     *
     * @var OrderNumberCounter
     */
    private $target = OrderNumberCounter::class;

    /**
     * @see TestInheritanceTrait
     *
     * @var array
     */
    private $inheritance = [
        EntityInterface::class,
        IdentifiableEntityInterface::class
    ];

    /**
     * @see TestSetterGetterTrait
     *
     * @var array
     */
    private $properties = [
        [ 'name', 'test' ],
        [ 'count', 10 ],
    ];


    public function testFormat(){
        $this->target->setName("XXX");
        $this->target->setCount(10);
        $this->assertEquals('XXX:10', $this->target->format('%s:%s'));
        $this->assertEquals('XXX-10', $this->target->__toString());
    }
}
