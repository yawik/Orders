<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Orders\Factory\Form;

use Interop\Container\ContainerInterface;
use Orders\Form\InvoiceAddress;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class JobInvoiceAddressFactory implements FactoryInterface
{
    protected $options;


    public function __construct($options = [])
    {
        $this->options = $options;
    }

    /**
     * Create a InvoiceAddress form
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     *
     * @return InvoiceAddress
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $events = $container->get('Orders/Form/InvoiceAddress/Events');
        $invoice = new InvoiceAddress($this->options['name'], $this->options);
        $invoice->setEventManager($events);

        return $invoice;
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
        return $this($serviceLocator->getServiceLocator(), InvoiceAddress::class);
    }


}