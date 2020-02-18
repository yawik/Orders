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
use Core\Form\SummaryFormInterface;
use Laminas\EventManager\EventManagerInterface;
use Laminas\EventManager\ListenerAggregateInterface;
use Laminas\Session\Container;

/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class DisableJobInvoiceAddress
{
    public function __invoke(FormEvent $event)
    {
        $job = $event->getParam('job');
        if ($job->isDraft()) {
            return;
        }

        /* @var \Orders\Form\InvoiceAddress $invoiceAddress */
        $invoiceAddress = $event->getForm()->getForm('invoice.invoiceAddress');
        $invoiceAddress->setDisplayMode(SummaryFormInterface::DISPLAY_SUMMARY);
        foreach($invoiceAddress->getBaseFieldset() as $element) {
            $element->setAttribute('disabled', true);
        }
    }
}