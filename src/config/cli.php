<?php

$config = [
    //'controllerNamespace' => 'commands',
    'controllerMap' => [
        'presql' => '\luya\commands\PresqlController',
        'exec' => '\luya\commands\ExecutableController',
    ],
    'components' => [
        'collection' => 'luya\components\Collection',
        'luya' => 'luya\components\LuyaComponents',
    ],
    'bootstrap' => [
        'luya\components\BootstrapCli',
    ],
];

return $config;
