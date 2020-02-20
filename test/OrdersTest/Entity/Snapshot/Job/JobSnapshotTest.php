<?php
/**
 * YAWIK
 *
 * @filesource
 * @license    MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */

/** */
namespace OrdersTest\Entity\Snapshot\Job;

use Cross\TestUtils\TestCase\TestInheritanceTrait;
use Cross\TestUtils\TestCase\TestUsesTraitsTrait;
use Cross\TestUtils\TestCase\TestSetterAndGetterTrait;
use Orders\Entity\Snapshot\Job\JobSnapshot;

/**
 * Tests for InvoiceAddress
 *
 * @covers \Orders\Entity\Snapshot\Job\JobSnapshot
 * @coversDefaultClass \Orders\Entity\Snapshot\Job\JobSnapshot
 *
 * @author Carsten Bleek <bleek@cross-solution.de>
 * @group  Orders
 * @group  Orders.Entity
 */
class JobSnapshotTest extends \PHPUnit\Framework\TestCase
{
    use TestInheritanceTrait, TestUsesTraitsTrait, TestSetterAndGetterTrait;

    /**
     * The "Class under Test"
     *
     * @var JobSnapshot
     */
    private $target = JobSnapshot::class;

    /**
     * @see TestInheritanceTrait
     *
     * @var array
     */
    private $inheritance = [
        'Orders\Entity\Snapshot\SnapshotInterface',
        'Core\Entity\EntityInterface'
    ];

    /**
     * @see TestUsesTraitsTrait
     *
     * @var array
     */
    private $usesTraits = [ 'Core\Entity\EntityTrait' ];

    /**
     * @see TestSetterGetterTrait
     *
     * @var array
     */
    private $setterAndGetter = [
        [ 'title', 'the job title' ],
        [ 'applyId', 'my external ID' ],
        [ 'atsMode', ['value_object' => 'Core\Entity\Collection\ArrayCollection'] ],
        [ 'datePublishStart', ['value_object' => 'DateTime'] ],
        [ 'job', ['value_object' => 'Jobs\Entity\Job'] ],
        [ 'job', [
            'value_object' => 'Jobs\Entity\Job',
            'getter' => 'has*',
            'expect' => true,
            'assert' => 'equals',
        ]],
        [ 'job', [
            'setter' => false,
            'getter' => 'has*',
            'value' => false
        ]],
        [ 'language', 'de'],
        [ 'link','http://thelink.de'],
        [ 'locations', ['value_object' => 'Core\Entity\Collection\ArrayCollection'] ],
        [ 'reference', 'my reference'],
        [ 'uriPublisher', 'http://the.publisher.de'],
        [ 'uriApply', 'http://the.publisher.de'],
        [ 'organizationParent', '1234'],
        [ 'organizationName', '1234 AG'],
    ];
}
