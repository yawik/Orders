<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Orders\Entity;

use Core\Entity\EntityTrait;
use \Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * ${CARET}
 *
 * @ODM\EmbeddedDocument

 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 */
class InvoiceAddress implements InvoiceAddressInterface
{
    use EntityTrait;

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
     * houseNumber.
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

    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setVatId($vatId)
    {
        $this->vatId = $vatId;

        return $this;
    }

    public function getVatId()
    {
        return $this->vatId;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }


    
}