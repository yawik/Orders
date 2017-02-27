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
use CoreTestUtils\TestCase\TestInheritanceTrait;
use CoreTestUtils\TestCase\TestSetterGetterTrait;
use Orders\Entity\InvoiceAddressDraft;

/**
 * Tests for InvoiceAddressDraft
 *
 * @covers \Orders\Entity\InvoiceAddressDraft
 * @coversDefaultClass \Orders\Entity\InvoiceAddressDraft
 *
 * @author Carsten Bleek <bleek@cross-solution.de>
 * @group  Orders
 * @group  Orders.Entity
 */
class OrderTest extends \PHPUnit_Framework_TestCase
{
    use TestInheritanceTrait, TestSetterGetterTrait;

    /**
     * The "Class under Test"
     *
     * @var InvoiceAddressDraft
     */
    private $target = InvoiceAddressDraft::class;

    /**
     * @see TestInheritanceTrait
     *
     * @var array
     */
    private $inheritance = [ EntityInterface::class ];

    /**
     * @see TestSetterGetterTrait
     *
     * @var array
     */
    private $properties = [
        [ 'jobId', '123' ],
        [ 'invoiceAddress', '@Orders\Entity\InvoiceAddress' ],
    ];
}
