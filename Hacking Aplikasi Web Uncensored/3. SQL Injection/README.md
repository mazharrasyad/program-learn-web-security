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
- Perintah yang digunakan ORDER BY
