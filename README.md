# Akunting

## Server Requirements
- PHP >= 8.0
- Node >= 16.0
- npm >= 8.0
- BCMath PHP Extension
- Ctype PHP Extension
- cURL PHP Extension
- DOM PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Petunjuk Instalasi
- Install php 
- Install mysql
- Install composer
- Install node
- Cek kesiapan (Pastikan php, composer dapat diakses secara global)
```
php -v
mysql --version
composer -v
node -v
npm -v
```
- Clone source code ke docroot
```sh
git clone https://github.com/dfath/akunting.git
```
- Install package php
```sh
composer install
```
- Install package js
```sh
npm install
```
- Buat database baru
```sh
mysql -u root -p
create database akunting
```
- Isi configurasi mysql pada file .env
salin data dari file .env.example jika belum ada
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=akunting
DB_USERNAME=root
DB_PASSWORD=
```
- Jalankan migrasi database
```sh
php artisan migration:refresh
```
- Buat data dummy
```sh
php artisan db:seed
```
- Jalankan server di local
```sh
php artisan serve
```
- Login dengan menggunakan akun berikut:
```
admin@example.com
admin
```

### Referensi
- https://laravel.com/docs/9.x/installation

## Kamus
