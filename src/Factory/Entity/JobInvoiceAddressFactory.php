<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Orders\Factory\Entity;

use Core\Entity\Hydrator\EntityHydrator;
use Interop\Container\ContainerInterface;
use Orders\Entity\InvoiceAddress;
use Settings\Entity\Hydrator\SettingsEntityHydrator;
use Laminas\ServiceManager\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class JobInvoiceAddressFactory implements FactoryInterface
{
    /**
     * Create an InvoiceAddress form
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     *
     * @return InvoiceAddress
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $auth = $container->get('AuthenticationService');
        $user = $auth->getUser();
        $settings = $user->getSettings('Orders');
        $invoiceAddress = $settings->getInvoiceAddress();
        if (!$invoiceAddress->getCompany()) {
            $invoiceAddress = false;
            $org = $user->getOrganization();
            if ($org->isEmployee()) {
                $orgUser = $org->isHiringOrganization() ? $org->getParent()->getUser() : $org->getUser();
                $invoiceAddress = $orgUser->getSettings('Orders')->getInvoiceAddress();
                if (!$invoiceAddress->getCompany()) {
                    $invoiceAddress = false;
                }
            }
        }

        /* Still no invoiceAddress? Let's create one from Company data. */
        if (!$invoiceAddress) {
            $org = $user->getOrganization();
            if ($org->isHiringOrganization()) { $org = $org->getParent(); }
            /* @var \Auth\Entity\Info $orgUserInfo */
            $orgContact = $org->getContact();
            $orgUserInfo = $org->getUser()->getInfo();

            $invoiceAddress = new InvoiceAddress();
            $invoiceAddress
                ->setGender($orgUserInfo->getGender())
                ->setName($orgUserInfo->getDisplayName(false))
                ->setCompany($org->getOrganizationName()->getName())
                ->setStreet($orgContact->getStreet() . ' ' . $orgContact->getHouseNumber())
                ->setZipCode($orgContact->getPostalcode())
                ->setCity($orgContact->getCity())
                ->setEmail($orgUserInfo->getEmail());
        }

        $entity = new InvoiceAddress();

        if ($invoiceAddress) {
            $entityHydrator = new EntityHydrator();
            $settingsHydrator = new SettingsEntityHydrator();
            $data     = $settingsHydrator->extract($invoiceAddress);
            $entity   = $entityHydrator->hydrate($data, $entity);
        }
        return $entity;

    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, InvoiceAddress::class);
    }


}