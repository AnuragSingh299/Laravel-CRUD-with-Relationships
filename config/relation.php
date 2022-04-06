<?php
return[
    'Contact'=>[
        'Account'=>[
            //'table_name'=>'account_contact',
            'relationshipname'=>'Many to Many'
        ]
    ],

    'Project'=>[
        'Account'=>[
            //'table_name'=>'account_project',
            'relationshipname'=>'Many to One'
        ],

        'User'=>[
            //'table_name'=>'project_user',
            'relationshipname'=>'Many to Many'
        ]
    ]
];