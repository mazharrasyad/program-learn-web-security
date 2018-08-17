# System Web

A. Client
- Memberikan request ke server
- Contoh : Browser Google Chrome
- Bahasa Pemrograman : Javascript

B. Server
- Memberikan response ke client
- Contoh : Apache
- Bahasa Pemrograman : PHP

# Melihat Request dan Response

- Buka Browser
- Cari menu "Developer tools" di pengaturan atau tekan "Ctrl+Shift+I"
- Pilih tab "Network"
- Ketikkan URL
- Akan muncul request dan response

# Status Kode

- 200 = Ok
- 404 = Not Found
- 403 = Forbidden
- 500 = Server Error

# HTTP Request Method

- https://developer.mozilla.org/id/docs/Web/HTTP/Methods
- Contoh :
  - GET = Mengambil data
  - Head = Menampilkan header
  - POST = Mengirim data

# Contoh Request Method

- Melihat kode html dengan klik kanan pada halaman web dan pilih "View Page Source"
- Atau tekan "Ctrl+U"

# curl

- Dijalankan di command prompt atau terminal
- curl <URL>
  - Contoh : curl http://localhost/folder/file.php
  - Catatan : file.php dapat menggunakan method.php
- curl <option> <URL>
  - Contoh : curl -X "POST" http://localhost/folder/file.php
  - Contoh : curl -X "PUT" -A "Browser Saya" http://localhost/folder/file.php
- curl <option> <URL?Query>
  - Contoh : curl -X "PUT" -A "Browser Saya" "http://localhost/folder/file.php?name=admin&age=30"
  - Contoh : curl -v -X "PUT" "http://localhost/folder/file.php?name=admin&age=30"
  - Contoh : curl -v -X "PUT" "http://localhost/folder/file.php?name=admin&age=30&x\[0\]=a&x\[1\]=b"

# Method GET

# Cookie

- Extension Chrome : EditThisCookie
- Aktifkan logs di browser untuk melihat perubahan

# Session

# Method POST

# Inspect Element
