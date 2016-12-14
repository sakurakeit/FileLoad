<?php
//acl - Access Control List)
// Application Controller
define('ROLE',  array(
    'acl' => array(
        'roles' => array(
            'guest' => null,
            'user' => 'guest',
            'admin' => 'user',
        ),
        'resources' => array(
            'allow' => array(
                'application\controllers\controller_main' => array(
                    'all' => 'user',
                    'action_index' => 'user',
                    'action_logout' => 'user',
                    'action_login' => 'guest',
                    'action_register' => 'guest',
                ),
                'application\controllers\controller_load' => array(
                    'all' => 'user',
                    // 'action_index' => 'guest',
                    //'action_loadFile' => 'guest',
                ),
            ),
            'deny' => array(
                'application\controllers\controller_load' => array(
                    'all' => 'guest',
                ),
                'Admin\Controller\Category' => array(
                    'delete' => 'admin',
                ),
            )
        )
    )
)
);