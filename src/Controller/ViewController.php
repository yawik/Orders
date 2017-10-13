<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2017 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Orders\Controller;

use Orders\Repository\Orders;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class ViewController extends AbstractActionController
{
    /**
     *
     *
     * @var Orders
     */
    private $repository;

    public function __construct(Orders $repository)
    {
        $this->repository = $repository;
    }

    public function indexAction()
    {
        $id = $this->params()->fromQuery('id');

        if (!$id) {
            throw new \UnexpectedValueException('No order id given. Please provide the order id in the "id" parameter.');
        }

        $order = $this->repository->find($id);

        if (!$order) {
            throw new \InvalidArgumentException('No order with id "' . $id . '" found.');
        }

        return [
            'order' => $order,
        ];
    }
}
