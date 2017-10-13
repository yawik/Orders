<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2016 Cross Solution <http://cross-solution.de>
 */
return [ 'router' => [ 'routes' => [ 'lang' => [ 'child_routes' => [

    'orders-list' => [
        'type' => 'Literal',
        'options' => [
            'route' => '/orders',
            'defaults' => [
                'controller' => 'Orders/List',
                'action' => 'index'
            ],
        ],
        'may_terminate' => true,
    ],

    'orders-view' => [
        'type' => 'Literal',
        'options' => [
            'route' => '/orders/view',
            'defaults' => [
                'controller' => \Orders\Controller\ViewController::class
            ],
        ],
    ],

]]]]];
