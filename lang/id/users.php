<?php
/*
language : Indonesia
*/
return [
    'title' => [
        'index' => 'Pengguna',
        'create' => 'Tambah Pengguna',
        'edit' => 'Ubah Pengguna',
    ],
    'form_control' => [
        'input' => [
            'name' => [
                'label' => 'Nama',
                'placeholder' => 'Masukan Nama',
                'attribute' => 'Nama'
            ],
            'email' => [
                'label' => 'Email',
                'placeholder' => 'Masukan Email',
                'attribute' => 'Email'
            ],
            'password' => [
                'label' => 'Password',
                'placeholder' => 'Masukan Password',
                'attribute' => 'Password'
            ],
            'password_confirmation' => [
                'label' => 'Konfirmasi Password',
                'placeholder' => 'Ketik Ulang Password',
                'attribute' => 'konfirmasi Password'
            ],
            'search' => [
                'label' => 'Cari',
                'placeholder' => 'Cari Pengguna',
                'attribute' => 'Cari'
            ]
        ],
        'select' => [
            'role' => [
                'label' => 'Wewenang',
                'placeholder' => 'Pilih Wewenang',
                'attribute' => 'Wewenang'
            ]
        ]
    ],
    'label' => [
        'name' => 'Nama',
        'email' => 'Email',
        'role' => 'Wewenang',
        'no_data' => [
            'fetch' => "Data Pengguna Belum Ada",
            'search' => "Pengguna :keyword Tidak Ditemukan",
        ],
    ],
    'button' => [
        'create' => [
            'value' => 'Tambah'
        ],
        'save' => [
            'value' => 'Simpan'
        ],
        'edit' => [
            'value' => 'Ubah'
        ],
        'delete' => [
            'value' => 'Hapus'
        ],
        'cancel' => [
            'value' => 'Batal'
        ],
    ],
    'alert' => [
        'create' => [
            'title' => "Tambah Pengguna",
            'message' => [
                'success' => "Pengguna Berhasil Disimpan.",
                'error' => "Terjadi Kesalahan Saat Menyimpan Pengguna. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah Pengguna',
            'message' => [
                'success' => "Pengguna Berhasil Diperbaharui.",
                'error' => "Terjadi Kesalahan Saat Perbarui Pengguna. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus Pengguna',
            'message' => [
                'confirm' => "Yakin Akan Menghapus Pengguna :title ?",
                'success' => "Pengguna Berhasil Dihapus",
                'error' => "Terjadi Kesalahan Saat Menghapus Pengguna. :error"
            ]
        ],
    ]
];
