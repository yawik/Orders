<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Orders\Controller;

use Core\Factory\ContainerAwareInterface;
use Interop\Container\ContainerInterface;
use Laminas\Mvc\Controller\AbstractActionController;

/**
 * ${CARET}
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test
 */
class ListController extends AbstractActionController implements ContainerAwareInterface
{
	
	/**
	 * @param ContainerInterface $container
	 *
	 * @return ListController
	 */
	static public function factory(ContainerInterface $container)
	{
		$ob = new self();
		$ob->setContainer($container);
		return $ob;
	}
	
	public function setContainer( ContainerInterface $container )
	{
	
	}
	
	
	public function indexAction()
    {
        return $this->pagination([
			'form' => ['Core/Search', 'as' => 'form'],
			'paginator' => ['Orders', [ 'sort' => 'date'], 'as' => 'orders']
		]);
    }

    public function viewAction()
    {
        $id = $this->params()->fromQuery('id');

        if (!$id) {
            throw new \UnexpectedValueException('No order id given. Please provide the order id in the "id" parameter.');
        }

        $services = $this->serviceLocator;
        $repositories = $services->get('repositories');
        $repository = $repositories->get('Orders');
        $order = $repository->find($id);

        if (!$order) {
            throw new \InvalidArgumentException('No order with id "' . $id . '" found.');
        }

        return [
            'order' => $order,
        ];
    }
    
}
