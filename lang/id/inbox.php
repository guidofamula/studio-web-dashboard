<?php
/*
language : English
*/
return [
    'title' => [
        'index' => 'Kotak Masuk',
        'detail' => 'Detail Pesan',
    ],
    'label' => [
    'no_data' => [
        'fetch' => "data pesan belum ada",
        'search' => "Pesan :keyword tidak ditemukan",
        ]
    ],
    'form_control' => [
        'input' => [
            'search' => [
                'label' => 'Pencarian',
                'placeholder' => 'Cari inbox/pesan',
                'attribute' => 'pencarian'
            ]
        ],
        'textarea' => [
            'messages' => [
                'label' => 'Pesan',
                'attribute' => 'pesan'
            ],
        ]
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
        'browse' => [
            'value' => 'Telusuri'
        ],
        'back' => [
            'value' => 'Kembali'
        ],
    ],
    'alert' => [
        'create' => [
            'title' => "Kirim Pesan",
            'message' => [
                'success' => "Pesan Berhasil Dikirim.",
                'error' => "Terjadi kesalahan saat menyimpan pesan. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus Pesan',
            'message' => [
                'confirm' => "Yakin akan menghapus pesan :title ?",
                'success' => "Pesan berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus pesan. :error"
            ]
        ],
    ]
];
