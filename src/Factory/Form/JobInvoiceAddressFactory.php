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
use Laminas\ServiceManager\Factory\FactoryInterface;



/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class JobInvoiceAddressFactory implements FactoryInterface
{

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
        $invoice = new InvoiceAddress($options['name'], $options);
        $invoice->setEventManager($events);

        return $invoice;
    }

}
