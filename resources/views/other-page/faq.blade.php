<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.header')
  <title>FAQ & Legal Documents - Ritter Talent</title>
  <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
</head>

<body class="starter-page-page">

  @include('partials-home.head')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade" style="background-image: url('{{ asset('assets/img/bg.jpg') }}'); --background-color: #ffffff; padding: 160px 0 80px 0;">
      <div class="container position-relative" style="z-index: 3; text-shadow: 1px 1px 3px rgba(255,255,255,0.8);">
        <h1 style="color: #111111; font-weight: 700;">FAQ & Kebijakan</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/" style="color: #111111;">Home</a></li>
            <li class="current" style="color: #333333;">FAQ & Legal</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="container" data-aos="fade-up">

        <!-- Disclaimer Banner UAS Untar -->
        <div class="alert alert-warning mb-5" role="alert">
          <strong>DISCLAIMER:</strong> Website ini adalah murni prototipe/Ujian Akhir Semester (UAS) mata kuliah Backend di Universitas Tarumanagara (Untar). Ini BUKAN merupakan website resmi dari Ropang Ritter Talent. Segala jenis reservasi dan keranjang belanja hanyalah simulasi backend semata.
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-10">
            
            <section id="faq" class="mb-5 p-4 bg-white shadow-sm" style="border-radius: 10px;">
              <h2 class="fw-bold mb-4" style="color: var(--heading-color);">Frequently Asked Questions (FAQ)</h2>
              
              <div class="mb-4">
                <h4 class="fw-bold" style="color: var(--heading-color);">Apakah ini website resmi untuk memesan Ropang Ritter Talent?</h4>
                <p class="text-secondary">Bukan. Website ini adalah prototipe yang dikembangkan oleh mahasiswa Universitas Tarumanagara (Untar) untuk memenuhi Ujian Akhir Semester (UAS) mata kuliah Backend. Website ini hanya digunakan sebagai simulasi fungsionalitas sistem.</p>
              </div>

              <div class="mb-4">
                <h4 class="fw-bold" style="color: var(--heading-color);">Apa yang terjadi jika saya menggunakan fitur Book a Table?</h4>
                <p class="text-secondary">Data yang Anda masukkan (seperti nama dan waktu reservasi) hanya akan masuk ke dalam database pengujian (dummy database). Fitur ini dibuat hanya untuk membuktikan logika program reservasi kami berjalan dengan baik. Tidak akan ada reservasi meja nyata yang diproses ke pihak restoran.</p>
              </div>

              <div class="mb-4">
                <h4 class="fw-bold" style="color: var(--heading-color);">Apakah data privasi/email yang saya masukkan di sini aman?</h4>
                <p class="text-secondary">Tentu saja. Mengingat ini adalah proyek akademik, kami sangat menghargai privasi dan tidak akan menyalahgunakan email atau data kontak yang Anda masukkan. Data hanya digunakan oleh Dosen Penilai untuk mengecek fitur CRUD.</p>
              </div>
            </section>

            <section id="terms-of-service" class="mb-5 p-4 bg-white shadow-sm" style="border-radius: 10px;">
              <h2 class="fw-bold mb-4" style="color: var(--heading-color);">Terms of Service</h2>
              <p class="text-secondary">Syarat dan Ketentuan berikut mengatur penggunaan Anda atas website simulasi ini:</p>
              <ul class="text-secondary mt-3">
                <li class="mb-2"><strong>Sifat Website:</strong> Pengguna secara sadar mengetahui dan menyetujui bahwa website ini merupakan proyek demonstrasi untuk keperluan penilaian Ujian Akhir Semester (UAS) Universitas Tarumanagara.</li>
                <li class="mb-2"><strong>Bukan Transaksi Nyata:</strong> Pengguna tidak boleh menganggap fitur "Add to Cart", "Checkout", atau "Book a Table" sebagai transaksi komersial sungguhan. Segala jenis pembayaran atau reservasi tidak berlaku di dunia nyata.</li>
                <li class="mb-2"><strong>Hak Cipta Visual:</strong> Aset visual (gambar roti, logo) serta teks mungkin terinspirasi atau diambil dari "Ritter Talent" asli hanya sebagai studi kasus akademik. Website ini secara administratif dan hukum tidak terafiliasi dengan pemilik merk tersebut.</li>
              </ul>
            </section>

            <section id="privacy-policy" class="mb-5 p-4 bg-white shadow-sm" style="border-radius: 10px;">
              <h2 class="fw-bold mb-4" style="color: var(--heading-color);">Privacy Policy</h2>
              <p class="text-secondary">Kami berkomitmen melindungi privasi setiap dosen penguji atau rekan mahasiswa yang menguji coba prototipe website ini.</p>
              <p class="text-secondary mt-3">Kebijakan penggunaan data pada website simulasi kami:</p>
              <ul class="text-secondary">
                <li class="mb-2"><strong>Pengumpulan Data Dummy:</strong> Data yang diinputkan seperti email, nama, dan detail kontak pada formulir website akan disimpan sementara di database cloud (contoh: Supabase) atau lokal hanya untuk pembuktian fungsionalitas Backend.</li>
                <li class="mb-2"><strong>Penyimpanan Data:</strong> Seluruh database dan data pengujian yang tersimpan hanya akan dibiarkan sebagai arsip portofolio akademik. Data tersebut tidak akan pernah diproses, disebarkan, atau digunakan untuk keperluan apa pun setelah masa penilaian UAS selesai.</li>
                <li class="mb-2"><strong>Tanpa Pihak Ketiga:</strong> Kami tidak menyematkan pelacak iklan atau menjual belikan data testing kepada pihak ketiga manapun.</li>
              </ul>
            </section>

          </div>
        </div>

      </div>
    </section>

  </main>

  @include('layouts.footer')
  @include('layouts.end')

</body>
</html>
