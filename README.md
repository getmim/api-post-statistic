# api-post-statistic

## Instalasi

Jalankan perintah di bawah di folder aplikasi:

```
mim app install api-post-statistic
```

## Konfigurasi

Tambahkan konfigurasi seperti di bawah pada konfigurasi aplikasi
untuk menentukan bagaimana suatu post diambil:

```php
return [
    'apiPostStatistic' => [
        'popular' => [
            'created' => '-20 days'
        ],
        'trending' => [
            'created' => '-7 days'
        ]
    ]
];
```

Konfigurasi di atas menentukan tanggan created post yang akan diikutkan dalam
proses perhitungan. Nilai `null` akan mengikutkan semua post.

## Endpoints

### `GET APIHOST/post/popular{?rpp}`

### `GET APIHOST/post/trending{?rpp}`