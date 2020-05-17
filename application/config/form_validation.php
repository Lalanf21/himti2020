<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config = [
    'user' => [
        [
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required'
        ],
        [
            'field' => 'password1',
            'label' => 'Password',
            'rules' => 'required|matches[password2]'
        ],
        [
            'field' => 'password2',
            'label' => 'Password konfirmasi',
            'rules' => 'required|matches[password1]'
        ],
        [
            'field' => 'level',
            'label' => 'Kategori',
            'rules' => 'required|alpha'
        ],
        [
            'field' => 'aktif',
            'label' => 'Aktif',
            'rules' => 'required|numeric'
            ]
        ],
    'change_pass' => [
        [
            'field' => 'pass_lama',
            'label' => 'Password Lama',
            'rules' => 'required'
        ],
        [
            'field' => 'pass_baru',
            'label' => 'Password Baru',
            'rules' => 'required|matches[pass_baru2]',
        ],
        [
            'field' => 'pass_baru2',
            'label' => 'Ulangi Password',
            'rules' => 'required|matches[pass_baru1]',
        ]
    ]
];
