# BE
 # Setup Database (Menggunakan MySQL) - Migrasi database
  1. Rename .env.example menjadi .env
  2. Buka file .env dengan teks editor yang anda punya
  3. DB_DATABASE=laravel ubah menjadi DB_DATABASE=postdatabase
  4. DB_USERNAME=root ubah menjadi DB_USERNAME=root (atau username yang anda biasa gunakan) 
  5. DB_PASSWORD= (atau password username yang anda biasa gunakan) 
  6. Buatlah database di mysql anda dengan nama post-database
  7. Jika database telah dibuat jalankan perintah "php artisan migrate" untuk melakukan migrasi data
  8. Melakukan Eksekusi seeder untuk data dummy "php artisan db:seed --class=PostSeeder"
  9. Proses setup database dan migrasi data dari laravel DONE
 # ENDPOINT DAN COLLECTION
  # POSTMAN COLLECTION
   1. File postman collection berada di folder public/postman-collection
   2. silahkan import file Postman-collection.postman_collection.json ke Postman anda
   3. disana terdapat 5 request yang berisikan url(endpoint) API yang sudah dibuat 
   4. silahkan melakukan request untuk melakukan pengetesan akses api

# FE
 1. Halaman POST                    : localhost/[alamat direktori penyimpanan]/
 2. Halaman ALL POST                : localhost/[alamat direktori penyimpanan]/semuapost
   a. Halaman ALL POST 'tabs'       : Halaman Website ALL POST terdapat tab tabel 'publish', 'draft', dan 'thrash'
   b. Halaman ALL POST 'edit post'  : Halaman Website ALL POST terdapat Tombol dengan 'ICON EDIT' untuk mengakses halaman Edit Artikel dengan alamat
                                      localhost/[alamat direktori penyimpanan]/editpost/[id artikel yang dipilih saat menekan tombol]
   c. Halaman ALL POST 'thrash '    : Halaman Website ALL POST terdapat Tombol dengan 'ICON TRASH' untuk mengupdate status Artikel menjadi 'thrash'
 3. Halaman ADD NEW     : localhost/[alamat direktori penyimpanan]/tambahbaru
 4. Halaman PREVIEW     : localhost/[alamat direktori penyimpanan]/preview

# NOTED
 1. Framework Yang Digunakan Yaitu 'LARAVEL'  
 2. Untuk Hal ini karena url 'public/' telah dikonfugari agar hilang jadi untuk menjalankan program tidak perlu Menggunakan 
    Command 'php artisan serve' jika anda menggunakan xampp langsung saja akses dimana file laravel ini diletakan
    contoh pada kasus saya localhost/tes/Tes PT Sharing Vision Indonesia/BE/
    