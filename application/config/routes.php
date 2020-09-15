<?php

return [

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
    'task/create' => [
        'controller' => 'main',
        'action' => 'create',
    ],
    'task/save' => [
        'controller' => 'main',
        'action' => 'save',
    ],

	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],

	'account/register' => [
		'controller' => 'account',
		'action' => 'register',
	],
    'account/profile' => [
        'controller' => 'account',
        'action' => 'profile',
    ],
    'account/profile/{page:\d+}' => [
        'controller' => 'account',
        'action' => 'profile',
    ],
    'account/edit/{id:\d+}' => [
        'controller' => 'account',
        'action' => 'edit',
    ],
    'account/update/{id:\d+}' => [
        'controller' => 'account',
        'action' => 'update',
    ],
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],
	
];