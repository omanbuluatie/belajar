<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Abdurrahman Buluatie | Web Programmer</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    body {
      background: #fff;
      color: #333;
      line-height: 1.6;
    }
    header {
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      color: white;
      text-align: center;
      padding: 6rem 2rem;
    }
    header h1 {
      font-size: 3.5rem;
      font-weight: 800;
    }
    header p {
      font-size: 1.25rem;
      margin-top: 1rem;
    }
    section {
      max-width: 1140px;
      margin: auto;
      padding: 4rem 2rem;
    }
    .section-title {
      text-align: center;
      font-size: 2.25rem;
      font-weight: 600;
      color: #1a1a1a;
      margin-bottom: 2rem;
    }
    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 2rem;
    }
    .card {
      background: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 12px;
      padding: 2rem;
      transition: all 0.3s ease-in-out;
    }
    .card:hover {
      transform: scale(1.03);
      box-shadow: 0 12px 30px rgba(0,0,0,0.1);
      border-color: transparent;
    }
    .card h3 {
      font-size: 1.25rem;
      color: #2c3e50;
      margin-bottom: 1rem;
    }
    .card p {
      font-size: 1rem;
      color: #555;
    }
    .contact-info div {
      margin-bottom: 1rem;
    }
    footer {
      background: #2c3e50;
      color: white;
      text-align: center;
      padding: 2rem 1rem;
    }
  </style>
</head>
<body>
  <header>
    <h1>Abdurrahman Al-Amin Buluatie, S.Kom, M.Eng</h1>
    <p>Profesional Web Programmer & Pakar Sistem Informasi Pemerintahan</p>
  </header>

  <section>
    <h2 class="section-title">Tentang Saya</h2>
    <div class="card">
      <p>Saya adalah programmer web dan arsitek sistem informasi pemerintahan yang berdedikasi tinggi dengan pengalaman lebih dari 15 tahun dalam pengembangan aplikasi layanan publik. Saat ini menjabat sebagai Kabid Pengelolaan Informasi Administrasi Kependudukan di Jayawijaya dan aktif berkontribusi dalam penyusunan arsitektur SPBE nasional.</p>
    </div>
  </section>

  <section>
    <h2 class="section-title">Keahlian</h2>
    <div class="card-grid">
      <div class="card"><h3>Web Development</h3><p>HTML, CSS, JavaScript, PHP, Laravel</p></div>
      <div class="card"><h3>Database</h3><p>PostgreSQL, MySQL, Oracle</p></div>
      <div class="card"><h3>GIS & Mapping</h3><p>ArcGIS, QGIS, WebGIS</p></div>
      <div class="card"><h3>Desain Grafis</h3><p>CorelDraw, Photoshop</p></div>
    </div>
  </section>

  <section>
    <h2 class="section-title">Portofolio</h2>
    <div class="card-grid">
      <div class="card">
        <h3>Website Resmi Kabupaten Jayawijaya</h3>
        <p>Portal utama layanan dan informasi pemerintah daerah yang terintegrasi dengan sistem internal.</p>
      </div>
      <div class="card">
        <h3>Sistem Informasi Kinerja ASN</h3>
        <p>Aplikasi untuk penilaian kinerja dan analisis produktivitas aparatur sipil negara.</p>
      </div>
      <div class="card">
        <h3>Sistem Layanan Adminduk Online</h3>
        <p>Platform layanan daring dokumen kependudukan untuk efisiensi dan transparansi.</p>
      </div>
      <div class="card">
        <h3>WebGIS Data Kependudukan</h3>
        <p>Pemetaan data demografi dalam bentuk visual interaktif berbasis GIS.</p>
      </div>
    </div>
  </section>

  <section>
    <h2 class="section-title">Kontak</h2>
    <div class="card contact-info">
      <div><strong>Email:</strong> omanbuluatie79@gmail.com</div>
      <div><strong>Telepon:</strong> +62 852 4412 1999</div>
      <div><strong>Alamat:</strong> Jl. Bhayangkara No.158B, Wamena Kota, Papua</div>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Abdurrahman Al-Amin Buluatie. Dibuat dengan semangat inovasi dan dedikasi pada pelayanan publik.</p>
  </footer>
</body>
</html>
