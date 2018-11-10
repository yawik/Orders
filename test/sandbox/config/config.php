<?php

// chdir in config file so tests environment can chdir to this sandbox
chdir(dirname(__DIR__));
return [
    'modules' => [
        'Install',
        'Core',
        'Cv',
        'Auth',
        'Jobs',
        'Applications',
        'Organizations',
        'Geo',
        'Settings',
        'Orders',
    ],
];