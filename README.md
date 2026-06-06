# 🍞 Ropang Ritter Talent - Web Application

> ⚠️ **DISCLAIMER:**  
> Proyek ini merupakan bagian dari Ujian Akhir Semester (UAS) untuk Kelas TI-H semester 4, mata kuliah Backend Programming, bekerja sama dengan mitra Ropang Ritter Talent. Segala jenis reservasi, keranjang belanja, maupun transaksi di dalam website ini hanyalah simulasi semata untuk keperluan penilaian akademik.

## 🚀 Live Deployment
Proyek ini sudah di-*deploy* secara *online* melalui tautan berikut:
**👉 [Buka Di Sini](https://laravel-website-ropang.vercel.app/)**

---

## 👥 Tim Pengembang (Kelas TI-H)
Proyek ini dikembangkan secara kolaboratif oleh:

1. **Jessica Ho (535220187)**
   *Tugas:* Pembuatan front end (19%), fitur sort & filter, CRUD Menu, CRUD User, CRUD Reservation, CRUD Contact, Blade templating, Seeder, Factories, Database schema, Routing, Vercel Deployment, Autentikasi UI Auth, Admin Dashboard, Config Laravel & Vite, Axios Integration, Bug fixing.
2. **Lufika Ayu (535220223)**
   *Tugas:* Pembuatan front end (80%), Makalah, Javascript, CSS, Bootstrap, Timeline Jira, Diagram UML, Alert styling, UI Filter, Admin Dashboard UI, Footer & Navbar.
3. **Aulia Dwi (535220178)**
   *Tugas:* Diagram Use Case, Activity Diagram, Sequence Diagram, Class Diagram, Makalah, front end (1%), Timeline Jira.
4. **Parveen Uzma (535220226)**
   *Tugas:* Diagram Use Case, Activity Diagram, Sequence Diagram, Class Diagram, Video Editing, presentasi PPT, Makalah, Timeline Jira.

---

## 📺 Tautan Presentasi
- **Video Presentasi (YouTube):** [Tonton di sini](https://youtu.be/1HzbvSmqFVw)

---

## 💻 Panduan Instalasi Lokal (Bagi Penilai/Dosen)

Jika ingin menjalankan proyek ini secara lokal di komputer, ikuti langkah-langkah berikut:

### 1. Persiapan Environment
```bash
# Salin file environment bawaan
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 2. Instalasi Dependency
```bash
# Instalasi library backend (PHP)
composer update
composer install

# Instalasi library frontend (Node.js) & Build aset Vite
npm install
npm run build
```

### 3. Setup Database (Migrasi & Seeding)
Menyiapkan struktur tabel beserta data *dummy* awal:
```bash
php artisan migrate
php artisan db:seed
```

### 4. Menjalankan Server
Buka terminal dan jalankan perintah:
```bash
php artisan serve
```
Website sekarang dapat diakses secara lokal di: `http://127.0.0.1:8000/`