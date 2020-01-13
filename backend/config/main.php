<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [

            'api' => [
                'class' => 'backend\modules\Module',
            ],

    ],
    'components' => [
        'authManager' => [
               'class' => 'yii\rbac\PhpManager',

           ],
        'request' => [
             'csrfParam' => '_csrf-backend',
            'parsers' => [
            'application/json' => 'yii\web\JsonParser',
        ]

        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                    [
                        'class' => 'yii\rest\UrlRule',
                        'controller' => [

                            'api/cons',
                            'api/marc',
                             'api/pess',


                           'api/users',
                        ],

                        'pluralize' => false,


                        'extraPatterns' => [
                                    'POST consulta' => 'consulta',
                                    'PUT consultaput/{id}'=> 'consultaput',
                                    'DELETE consultadel/{id}' =>'consultadel',
                                    'GET set/{limit}' => 'set',
                                    'GET {id}/estado'=>'estado',
                                    'PUT marcput/{id}'=>'marcput',
                                    'DELETE marcdel/{id}'=>'marcdel',
                                    'PUT pessput/{id}'=> 'pessput',
                                    'DELETE pessdel/{id}' =>'pessdel',
                                  //  'POST marccreate' => 'marccreate',
                                    'GET pesset/{limit}' => 'pessset',
                                  'GET {id}/indexmarc'=>'indexmarc',

                                ],
                                'tokens' => [
                                '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                                '{limit}' => '<limit:\\d+>',

                                ],
                    ],



            ],
        ],

    ],
    'params' => $params,
];
