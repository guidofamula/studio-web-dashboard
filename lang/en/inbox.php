<?php
/*
language : English
*/
return [
    'title' => [
        'index' => 'Inbox',
        'detail' => 'Detail Message',
    ],
    'label' => [
    'no_data' => [
        'fetch' => "No message data yet",
        'search' => ":keyword message not found",
        ]
    ],
    'form_control' => [
        'input' => [
            'search' => [
                'label' => 'Search',
                'placeholder' => 'Search for message',
                'attribute' => 'search'
            ]
        ],
        'textarea' => [
            'messages' => [
                'label' => 'Message',
                'attribute' => 'messages'
            ],
        ]
    ],
    'button' => [
        'create' => [
            'value' => 'Add'
        ],
        'save' => [
            'value' => 'Save'
        ],
        'edit' => [
            'value' => 'Edit'
        ],
        'delete' => [
            'value' => 'Delete'
        ],
        'cancel' => [
            'value' => 'Cancel'
        ],
        'browse' => [
            'value' => 'Browse'
        ],
        'back' => [
            'value' => 'Back'
        ],
    ],
    'alert' => [
        'create' => [
            'title' => "Sent Message",
            'message' => [
                'success' => "Message sent successfully.",
                'error' => "An error occurred while saving the message. :error"
            ]
        ],
        'delete' => [
            'title' => 'Delete message',
            'message' => [
                'confirm' => "Are you sure you want to delete the :title inbox?",
                'success' => "Message deleted successfully.",
                'error' => "An error occurred while deleting the message. :error"
            ]
        ],
    ]
];
