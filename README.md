
# Sistem Gudang

Sistem Gudang adalah aplikasi berbasis web yang dibangun menggunakan Laravel 11. Aplikasi ini memungkinkan pengguna untuk mengelola stok barang di gudang, mencatat mutasi barang, serta menelusuri history mutasi berdasarkan barang maupun user. Selain itu, aplikasi ini dilengkapi dengan sistem autentikasi berbasis token (Bearer Token) dan dokumentasi API yang dibuat menggunakan Postman.

## Fitur Utama

- **Manajemen Pengguna**: CRUD pengguna dengan autentikasi.
- **Manajemen Barang**: CRUD barang dengan kategori, supplier, dan stok.
- **Manajemen Mutasi Barang**: Pencatatan barang masuk dan keluar.
- **History Mutasi**: Tampilkan riwayat mutasi berdasarkan barang atau user.
- **Autentikasi**: Menggunakan Laravel Passport untuk autentikasi berbasis token.
- **Docker**: Aplikasi dapat dideploy menggunakan Docker.
- **API Documentation**: Dokumentasi REST API menggunakan Postman.

## Teknologi yang Digunakan

- **Laravel 11**: Framework utama.
- **Laravel Passport**: Untuk autentikasi dengan Bearer Token.
- **MySQL**: Database yang digunakan.
- **Docker**: Untuk deployment aplikasi.
- **Postman**: Untuk dokumentasi API.

## Instalasi

### 1. Clone Repository

Clone repository ini ke local development environment Anda.

```bash
git clone https://github.com/username/sistem-gudang.git
cd sistem-gudang
```

### 2. Install Dependencies

Jalankan perintah di bawah ini untuk menginstal semua dependensi yang diperlukan.

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file `.env.example` ke `.env` dan sesuaikan konfigurasi database sesuai dengan setup lokal Anda.

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

### 5. Install Laravel Passport

Laravel Passport diperlukan untuk autentikasi berbasis token. Install Passport dengan menjalankan perintah berikut:

```bash
php artisan passport:install
```

### 6. Menjalankan Server

Untuk menjalankan aplikasi secara lokal, gunakan perintah berikut:

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`.

## Docker

Aplikasi ini juga dapat dijalankan menggunakan Docker. Untuk membangun dan menjalankan container, gunakan perintah berikut:

1. **Build Docker Image**:
   ```bash
   docker build -t sistem-gudang .
   ```

2. **Run Docker Container**:
   ```bash
   docker run -p 9000:9000 sistem-gudang
   ```

Aplikasi sekarang berjalan di `http://localhost:9000`.

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
- `POST /api/users`: Menambahkan user baru.
- `GET /api/users`: Menampilkan daftar user.
- `GET /api/users/{id}`: Menampilkan detail user.
- `PUT /api/users/{id}`: Mengupdate data user.
- `DELETE /api/users/{id}`: Menghapus user.

#### 2. Barang

- `POST /api/barangs`: Menambahkan barang baru.
- `GET /api/barangs`: Menampilkan daftar barang.
- `GET /api/barangs/{id}`: Menampilkan detail barang.
- `PUT /api/barangs/{id}`: Mengupdate data barang.
- `DELETE /api/barangs/{id}`: Menghapus barang.
- `GET /api/barang/{id}/history`: Menampilkan history mutasi barang.

#### 3. Mutasi

- `POST /api/mutasis`: Menambahkan mutasi baru.
- `GET /api/mutasis`: Menampilkan daftar mutasi.
- `GET /api/mutasis/{id}`: Menampilkan detail mutasi.
- `PUT /api/mutasis/{id}`: Mengupdate data mutasi.
- `DELETE /api/mutasis/{id}`: Menghapus mutasi.
- `GET /api/user/{id}/history`: Menampilkan history mutasi user.

## Dokumentasi API

Dokumentasi lengkap endpoint API dibuat menggunakan Postman. Anda dapat mengaksesnya melalui link berikut:

[Postman API Documentation](https://postman.com/your-doc-link)

## License

Aplikasi ini menggunakan lisensi [MIT License](https://opensource.org/licenses/MIT).
