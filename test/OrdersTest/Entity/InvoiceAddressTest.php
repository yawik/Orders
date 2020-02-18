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

use Cross\TestUtils\TestCase\TestInheritanceTrait;
use Cross\TestUtils\TestCase\TestUsesTraitsTrait;
use Cross\TestUtils\TestCase\TestSetterAndGetterTrait;
use Orders\Entity\InvoiceAddress;

/**
 * Tests for InvoiceAddress
 *
 * @covers \Orders\Entity\InvoiceAddress
 * @coversDefaultClass \Orders\Entity\InvoiceAddress
 *
 * @author Carsten Bleek <bleek@cross-solution.de>
 * @author Mathias gelhausen <gelhausen@cross-solution.de>
 * @group  Orders
 * @group  Orders.Entity
 */
class InvoiceAddressTest extends \PHPUnit\Framework\TestCase
{
    use TestInheritanceTrait, TestUsesTraitsTrait, TestSetterAndGetterTrait;

    /**
     * The "Class under Test"
     *
     * @var InvoiceAddress
     */
    private $target = InvoiceAddress::class;

    /**
     * @see TestInheritanceTrait
     *
     * @var array
     */
    private $inheritance = [ 'Orders\Entity\InvoiceAddressInterface' ];

    /**
     * @see TestUsesTraitsTrait
     *
     * @var array
     */
    private $traits = [ 'Core\Entity\EntityTrait' ];

    /**
     * @see TestSetterGetterTrait
     *
     * @var array
     */
    private $properties = [
        [ 'city', 'TestCity' ],
        [ 'company', 'TestCompany' ],
        [ 'country', 'TestCountry' ],
        [ 'email', 'test@email.com' ],
        [ 'name', 'Peter Mustermann' ],
        [ 'region', 'TestRegion' ],
        [ 'street', 'TestStreet 123' ],
        [ 'gender', 'm' ],
        [ 'vatId', '1234' ],
        [ 'zipCode', '1234' ],
        [ 'houseNumber', '2-4' ],
    ];
}
