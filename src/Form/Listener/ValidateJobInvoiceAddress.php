<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Orders\Form\Listener;

use Core\Entity\Hydrator\EntityHydrator;
use Core\Form\Event\FormEvent;
use Laminas\EventManager\EventManagerInterface;
use Laminas\EventManager\ListenerAggregateInterface;
use Laminas\Session\Container;

/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class ValidateJobInvoiceAddress
{
    public function __invoke(FormEvent $event)
    {
        $invoiceAddress = $event->getForm()->getForm('invoice.invoiceAddress')->getObject();

        foreach (['name', 'company', 'street', 'city', 'vatId'] as $field) {
            $value = $invoiceAddress->{"get$field"}();
            if (empty($value)) {
                return  /*@translate*/ 'Please fill in and check your invoice address.';
            }
        }
    }
}