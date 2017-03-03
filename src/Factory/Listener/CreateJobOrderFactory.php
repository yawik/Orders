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
use Orders\Listener\CreateJobOrder;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class CreateJobOrderFactory implements FactoryInterface
{
    /**
     * Create a CreateJobOrder listener
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     *
     * @return CreateJobOrder
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $options         = $container->get('Orders/Options/Module');
        $providerOptions = $container->get('Jobs/Options/Provider');
        $priceFilter     = $container->get('filtermanager')->get('Jobs/ChannelPrices');
        $repositories    = $container->get('repositories');
        $repository      = $repositories->get('Orders');
        $draftrepo       = $repositories->get('Orders/InvoiceAddressDraft');
        $listener        = new CreateJobOrder($options, $providerOptions, $priceFilter, $repository, $draftrepo);

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
        return $this($serviceLocator, CreateJobOrder::class);
    }


}