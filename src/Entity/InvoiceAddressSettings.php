<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013 - 2016 Cross Solution (http://cross-solution.de)
 * @license   MIT
 */

/** */
namespace Orders\Entity;

use Core\Entity\Hydrator\EntityHydrator;
use Settings\Entity\SettingsContainer as Container;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\EmbeddedDocument
 */
class InvoiceAddressSettings extends Container
{
    /**
     * Form of address.
     *
     * @ODM\Field(type="string")
     * @var string
     */
    protected $gender;

    /**
     * Full name
     *
     * @ODM\Field(type="string")
     * @var string
     */
    protected $name;

    /**
     * Company name.
     *
     * @ODM\Field(type="string")
     * @var string
     */
    protected $company;

    /**
     * Street name.
     *
     * @ODM\Field(type="string")
     * @var string
     */
    protected $street;

    /**
     * house number.
     *
     * @ODM\Field(type="string")
     * @var string
     */
    protected $houseNumber;

    /**
     * Zip code.
     *
     * @ODM\Field(type="string")
     * @var string
     */
    protected $zipCode;

    /**
     * City name.
     *
     * @ODM\Field(type="string")
     * @var string
     */
    protected $city;

    /**
     * Region.
     *
     * @ODM\Field(type="string")
     * @var string
     */
    protected $region;

    /**
     * Country.
     *
     * @ODM\Field(type="string")
     * @var string
     */
    protected $country;

    /**
     * Value added tax identification number.
     *
     * @ODM\Field(type="string")
     * @var string
     */
    protected $vatId;

    /**
     * Email address.
     *
     * @ODM\Field(type="string")
     * @var string
     */
    protected $email;

    public function getInvoiceAddressEntity()
    {
        $hydrator = new EntityHydrator();
        $data     = $this->getSettings();
        $entity   = $hydrator->hydrate($data, new InvoiceAddress());

        return $entity;
    }
}
