<?php

return [
    'role' => [
        'super_admin' => 'super_admin',
        'user'        => 'user',
    ],

    'permissions' => [
        'Super_admin' => [
            'Add Users'     => 'add_users',
            'Add Tasks'     => 'add_tasks',
            'Assign Tasks'  => 'assign_tasks',
            'View Tasks'    => 'view_tasks',
            'Delete Tasks'  => 'delete_tasks',
            'Update Tasks'  => 'update_tasks',
            'Change Status' => 'change_status',
        ],
        'User'        => [
            'Change Status' => 'change_status',
            'view_tasks'    => 'view_tasks',
        ],
    ],

    'roles_permissions' => [
        'super_admin' => [],
        'user'        => [],
    ],
];
