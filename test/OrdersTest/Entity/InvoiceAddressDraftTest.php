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
use Cross\TestUtils\TestCase\TestInheritanceTrait;
use Cross\TestUtils\TestCase\TestSetterAndGetterTrait;
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
class InvoiceAddressDraftTest extends \PHPUnit\Framework\TestCase
{
    use TestInheritanceTrait, TestSetterAndGetterTrait;

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
    private $setterAndGetter = [
        [ 'jobId', '123' ],
        [ 'invoiceAddress', '@Orders\Entity\InvoiceAddress' ],
    ];
}
