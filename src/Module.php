<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Orders;

use Core\ModuleManager\ModuleConfigLoader;
use Zend\ModuleManager\Feature;

/**
 * ${CARET}
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test
 */
class Module implements Feature\ConfigProviderInterface
{
    public function getConfig()
    {
        return ModuleConfigLoader::load(__DIR__ . '/../config');
    }
}
