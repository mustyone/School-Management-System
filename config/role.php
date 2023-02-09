<?php
$roles = array(
    "super" => [
        'modules' => ['*'],
        'permissions' => ['*']
    ],
    'admin' => [
        'modules' => ['cbt','result','admission','finance','bursary','report'],
        'permissions' => ['*']

    ],
    'teacher' => [
        'modules' => ['result'],
        'permissions' => ['*']

    ],
    "eo" => [
        'modules' => ['result','admission'],
        'permissions' => ['*']
    ],
    "principal" => [
        'modules' => ['cbt','result','report'],
        'permissions' => ['*']
    ],
    "admission_officer" => [
        'modules' => ['admission'],
        'permissions' =>["*"]
    ]
);