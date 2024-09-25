
# Sistem Gudang

Sistem Gudang adalah aplikasi berbasis web yang dibangun menggunakan Laravel 11. Aplikasi ini memungkinkan pengguna untuk mengelola stok barang di gudang, mencatat mutasi barang, serta menelusuri history mutasi berdasarkan barang maupun user. Selain itu, aplikasi ini dilengkapi dengan sistem autentikasi berbasis token (Bearer Token) dan dokumentasi API yang dibuat menggunakan Postman.
aplikasi ini dibuat guna memenuhi tugas 

## Fitur Utama

- **Manajemen Barang**: CRUD barang dengan kategori, supplier, dan stok.
- **Manajemen Mutasi Barang**: Pencatatan barang masuk dan keluar.
- **History Mutasi**: Tampilkan riwayat mutasi berdasarkan barang atau user.
- **Autentikasi**: Menggunakan Laravel Passport untuk autentikasi berbasis token.
- **Docker**: Aplikasi dapat dideploy menggunakan Docker dengan Laravel Sail.
- **API Documentation**: Dokumentasi REST API menggunakan Postman.

## Teknologi yang Digunakan

- **Laravel 11**: Framework utama.
- **Laravel Passport**: Untuk autentikasi dengan Bearer Token.
- **MySQL**: Database yang digunakan.
- **Docker (Laravel Sail)**: Untuk development dan deployment aplikasi.
- **Postman**: Untuk dokumentasi API.

# Instalasi

## instalasi lokal

#### Requirements

PHP >= 8.2,
Composer >= 2.7.9,
MySql >= 5.2,

#### 1. Clone Repository ini

Clone repository ini ke local development environment Anda.

```bash
git clone https://github.com/badruzbby/sistem-gudang.git
cd sistem-gudang
```

#### 2. Install Dependencies dengan Composer

Jalankan perintah berikut untuk menginstal dependencies dengan Composer

```bash
composer update
```

#### 3. Konfigurasi Environment

Salin file `.env.example` ke `.env` dan sesuaikan konfigurasi database dengan setup lokal anda.

```bash
cp .env.example .env
```

Setelah itu, generate application key:

```bash
php artisan key:generate
```

### 4. Setup Database

Migrasikan database dengan menjalankan perintah berikut:

```bash
php artisan migrate
```

Jika Anda ingin memiliki beberapa data awal, Anda bisa menjalankan seeder:

```bash
php artisan db:seed
```

### 5. Menjalankan Server

Untuk menjalankan aplikasi, gunakan perintah berikut:

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`.


## Instalasi menggunakan Laravel sail

### 1. Clone Repository

Clone repository ini ke local development environment Anda.

```bash
git clone https://github.com/badruzbby/sistem-gudang.git
cd sistem-gudang
```

### 2. Install Dependencies dengan Laravel Sail

Jalankan perintah berikut untuk menginstal dependencies dengan Laravel Sail.

```bash
./vendor/bin/sail up
```

Jika Sail belum diinstal, Anda bisa menginstallnya dengan menjalankan perintah ini:

```bash
composer require laravel/sail --dev
php artisan sail:install
```

Kemudian, jalankan Sail dengan perintah berikut:

```bash
./vendor/bin/sail up -d
```

### 3. Konfigurasi Environment

Salin file `.env.example` ke `.env` dan sesuaikan konfigurasi database dengan setup lokal Sail Anda.

```bash
cp .env.example .env
```

Setelah itu, generate application key:

```bash
./vendor/bin/sail artisan key:generate
```

### 4. Setup Database

Migrasikan database dengan menjalankan perintah berikut:

```bash
./vendor/bin/sail artisan migrate
```

Jika Anda ingin memiliki beberapa data awal, Anda bisa menjalankan seeder:

```bash
./vendor/bin/sail artisan db:seed
```

### 5. Menjalankan Server

Untuk menjalankan aplikasi, gunakan perintah berikut:

```bash
./vendor/bin/sail up
```

Aplikasi akan berjalan di `http://localhost`.

### 6. Deployment dengan Docker

Anda bisa menjalankan aplikasi di server menggunakan Docker. Berikut adalah langkah-langkahnya:

#### 1. Build Docker Image
Jalankan perintah berikut untuk membuild Docker image:

```bash
docker-compose build
```

#### 2. Menjalankan Aplikasi
Jalankan aplikasi dengan perintah:

```bash
docker-compose up -d
```

#### 3. Migrasikan Database
Setelah container berjalan, migrasikan database dengan perintah berikut:

```bash
docker-compose exec app php artisan migrate --force
```

## REST API

### Autentikasi
Aplikasi menggunakan **Bearer Token** untuk autentikasi. Untuk mendapatkan token, Anda harus login terlebih dahulu dengan mengirimkan request POST ke endpoint `/api/login` dengan parameter:

```json
{
    "email": "user@example.com",
    "password": "password"
}
```

Jika berhasil, response akan mengembalikan token yang harus disertakan dalam setiap request dengan format:

```
Authorization: Bearer {token}
```

### Daftar Endpoint

Berikut adalah daftar endpoint yang tersedia:

#### 1. User

- `POST /api/login`: Login dan mendapatkan token.
- `POST /api/register`: Menambahkan user baru.

#### 2. Barang

- `POST /api/barang`: Menambahkan barang baru.
- `GET /api/barang`: Menampilkan daftar barang.
- `GET /api/barang/{id}`: Menampilkan detail barang.
- `PUT /api/barang/{id}`: Mengupdate data barang.
- `DELETE /api/barang/{id}`: Menghapus barang.
- `GET /api/barang/{id}/history`: Menampilkan history mutasi barang.

#### 3. Mutasi

- `POST /api/mutasi`: Menambahkan mutasi baru.
- `GET /api/mutasi`: Menampilkan daftar mutasi.
- `GET /api/mutasi/{id}`: Menampilkan detail mutasi.
- `PUT /api/mutasi/{id}`: Mengupdate data mutasi.
- `DELETE /api/mutasi/{id}`: Menghapus mutasi.
- `GET /api/user/{id}/history`: Menampilkan history mutasi user.

## Dokumentasi API

Dokumentasi lengkap endpoint API dibuat menggunakan Postman. Anda dapat mengaksesnya melalui link berikut:

[Postman API Documentation](https://documenter.getpostman.com/view/38547766/2sAXqwYzXi)

## License

Aplikasi ini menggunakan lisensi [MIT License](https://opensource.org/licenses/MIT).
