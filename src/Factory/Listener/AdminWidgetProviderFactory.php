<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Orders\Factory\Listener;

use Interop\Container\ContainerInterface;
use Orders\Listener\AdminWidgetProvider;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class AdminWidgetProviderFactory implements FactoryInterface
{
    /**
     * Create a AdminWidgetProvider listener
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     *
     * @return AdminWidgetProvider
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $repositories = $container->get('repositories');
        $orders       = $repositories->get('Orders');
        $drafts       = $repositories->get('Orders/InvoiceAddressDraft');
        $listener     = new AdminWidgetProvider($orders, $drafts);

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
        return $this($serviceLocator, AdminWidgetProvider::class);
    }


}