<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2018 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Orders\Listener;

use Core\Service\EntityEraser\AbstractDependenciesListener;
use Core\Service\EntityEraser\DependencyResultEvent;
use Jobs\Entity\Job;

/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class CheckDependencyListener extends AbstractDependenciesListener
{

    protected $entityClasses = [ Job::class ];

    protected function dependencyCheck(DependencyResultEvent $event)
    {

        /* @var \Orders\Repository\InvoiceAddressDrafts $draftRepo
         * @var \Orders\repository\Orders $orderRepo
         * @var Job $entity
         */

        $entity = $event->getEntity();
        $draftRepo = $event->getRepository('Orders/InVoiceAddressDraft');
        $drafts = $draftRepo->findBy(['jobId' => $entity->getId()]);

        $orderRepo = $event->getRepository('Orders');
        $orders = $orderRepo->findBy(['entity.entity.$id' => $entity->getId(), 'entity.entity.$ref' => 'jobs']);

        if ($event->isDelete()) {
            foreach ($drafts as $draft) { $draftRepo->remove($draft); }
            $draftsDesc = 'were removed.';
            /* @var \Orders\Entity\Order $order */
            $orderRepo->createQueryBuilder()
                          ->updateMany()
                          ->field('entity.entity')->set(null)
                          ->field('entity.entity.$id')->equals($entity->getId())
                          ->getQuery()->execute();
            $ordersDesc = 'lost the job reference.';
        } else {
            $draftsDesc = 'These drafts will be removed:';
            $ordersDesc = 'These orders will loose their job reference. The snapshot remains untouched.';
        }

        if (!empty($orders)) {
            $event->addDependencies('Orders', $orders, ['description' => $ordersDesc]);
        }

        if (!empty($drafts)) {
            $event->addDependencies('Orders/InvoiceDrafts', $drafts, ['description' => $draftsDesc]);
        }

        return null;
    }
}
