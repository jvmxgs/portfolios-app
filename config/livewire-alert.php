<?php

/*
 * For more details about the configuration, see:
 * https://sweetalert2.github.io/#configuration
 */
return [
    'alert' => [
        'position' => 'top-end',
        'timer' => 7000,
        'toast' => true,
        'text' => null,
        'showCancelButton' => false,
        'showConfirmButton' => false,
        'customClass' => [
            'container' => 'rounded-lg bg-bittersweet',
            'popup' => '',
            'header' => '',
            'title' => 'text-downriver',
            'closeButton' => '',
            'icon' => '',
            'image' => '',
            'content' => '',
            'htmlContainer' => 'rounded-lg bg-bittersweet',
            'input' => '',
            'inputLabel' => '',
            'validationMessage' => '',
            'actions' => '',
            'confirmButton' => '',
            'denyButton' => '',
            'cancelButton' => '',
            'loader' => '',
            'footer' => ''
        ]
    ],
    'confirm' => [
        'icon' => 'warning',
        'position' => 'center',
        'toast' => false,
        'timer' => null,
        'showConfirmButton' => true,
        'showCancelButton' => true,
        'cancelButtonText' => 'No',
        'confirmButtonColor' => '#3085d6',
        'cancelButtonColor' => '#d33'
    ],
];
