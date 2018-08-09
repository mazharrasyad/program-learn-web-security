# Contoh Simple Blog

- https://goo.gl/SeJbx6

# SQL Query

# Username dan Password Diketahui

# Hanya Username Yang Diketahui

- Ubah field password menjadi comment pada field username yaitu "'-- " (tanpa petik dua)
- Contoh : "admin'-- " (tanpa petik dua)

# Username dan Password Tidak Diketahui

- Ubah field password menjadi comment pada field username yaitu "'-- " (tanpa petik dua)
- Ditambah operator OR pada field username yaitu "' OR (kondisi) -- " (tanpa petik dua)
- Ditambah select limit jika diperlukan
- Contoh : "coba' OR 1=1 LIMIT 1 -- "

# Filter Escape String

# Filter Prepared Statement
