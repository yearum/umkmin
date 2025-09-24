<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <strong>UMKMIN Dashboard</strong><br>
  A Laravel-based web application for managing small business operations.
</p>

---

## 📸 Tampilan Dashboard

![Dashboard UMKMIN](https://github.com/yearum/umkmin/blob/main/public/images/dashboard.png?raw=true)


---

## 🚀 Fitur Utama

- 👤 Manajemen pengguna dan profil
- 📦 Katalog produk dinamis
- 🛒 Keranjang belanja dan checkout
- 📈 Statistik mingguan dan laporan transaksi
- 🔐 Autentikasi bawaan Laravel Jetstream

---

## 🛠️ Teknologi yang Digunakan

- Laravel 10
- Jetstream + Livewire
- Tailwind CSS
- MySQL
- Blade Templating

---

## 📦 Instalasi

```bash
git clone https://github.com/username/umkmin.git
cd umkmin
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run dev
php artisan serve
