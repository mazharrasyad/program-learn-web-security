I. System Web

A. Client
- Memberikan request ke server
- Contoh : Browser Google Chrome
- Bahasa Pemrograman : Javascript

B. Server
- Memberikan response ke client
- Contoh : Apache
- Bahasa Pemrograman : PHP

II. Melihat Request dan Response

- Buka Browser
- Cari menu "Developer tools" di pengaturan atau tekan "Ctrl+Shift+I"
- Pilih tab "Network"
- Ketikkan URL
- Akan muncul request dan response

III. Status Kode

- 200 = Ok
- 404 = Not Found
- 403 = Forbidden
- 500 = Server Error

IV. HTTP Request Method

- https://developer.mozilla.org/id/docs/Web/HTTP/Methods
- Contoh :
  - GET = Mengambil data
  - Head = Menampilkan header
  - POST = Mengirim data

V. Contoh Request Method

- Buat file .php (Misalkan method.php)
- Ketikkan syntax berikut :

<?php

echo $_SERVER['REQUEST_METHOD'];

- Letakkan di server (Misalkan di localhost)
