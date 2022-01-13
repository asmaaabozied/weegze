<?php

return [
    'role_structure' => [
        'super_admin' => [

            'users' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
            // 'employees' => 'c,r,u,d',
            'roles' => 'c,r,u,d',



//            'positions'=> 'c,r,u,d',


        ],
        'admin' => [
            'users' => 'c,r',
            'admins' => 'c,r',
            // 'employees' => 'c,r',
            'roles' => 'c,r',



//            'positions'=> 'c,r,u,d',


        ]
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
