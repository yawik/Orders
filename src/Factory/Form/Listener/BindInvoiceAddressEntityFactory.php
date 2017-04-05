<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Orders\Factory\Form\Listener;

use Interop\Container\ContainerInterface;
use Orders\Form\Listener\BindInvoiceAddressEntity;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class BindInvoiceAddressEntityFactory implements FactoryInterface
{
    /**
     * Create a BindInvoiceAddressEntity listener
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     *
     * @return BindInvoiceAddressEntity
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $repositories = $container->get('repositories');
        $drafts       = $repositories->get('Orders/InvoiceAddressDraft');
        $orders       = $repositories->get('Orders');
        $callback     = function() use ($container) { return $container->get('Orders/Entity/JobInvoiceAddress'); };
        $listener     = new BindInvoiceAddressEntity($orders, $drafts, $callback);

        return $listener;
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
        return $this($serviceLocator, BindInvoiceAddressEntity::class);
    }


}