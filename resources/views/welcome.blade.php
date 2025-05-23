<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abdurrahman Al-Amin - Pengembang Web & Pemimpin Teknologi</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/main.css') }}"> --}}
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            opacity: 0.1;
        }

        .bg-animation::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(1deg);
            }
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        nav.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #667eea;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: #667eea;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #667eea;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        /* Hero Section - Dark Theme with Background Image */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 2rem;
            background:
                linear-gradient(rgba(10, 15, 30, 0.85), rgba(20, 25, 50, 0.9)),
                url('https://images.unsplash.com/photo-1639762681057-408e52192e55?q=80&w=2232&auto=format&fit=crop') center/cover no-repeat;
            color: #f0f0f0;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 800px;
            animation: fadeInUp 1s ease-out;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            padding: 2rem;
            background: rgba(15, 20, 40, 0.4);
            backdrop-filter: blur(8px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #6a8eff 0%, #a67ee8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            color: #d1d1ff;
            margin-bottom: 2rem;
            font-weight: 300;
            opacity: 0.9;
        }

        .hero-description {
            font-size: 1.1rem;
            color: #e0e0ff;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.9rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            text-decoration: none;
            display: inline-block;
            min-width: 180px;
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6a8eff 0%, #a67ee8 100%);
            color: #121229;
            box-shadow: 0 4px 20px rgba(106, 142, 255, 0.4);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(106, 142, 255, 0.6);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.08);
            color: #f0f0ff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .stat {
            background: rgba(20, 25, 50, 0.6);
            padding: 1.2rem 2rem;
            border-radius: 12px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(106, 142, 255, 0.2);
            transition: all 0.3s ease;
            min-width: 120px;
        }

        .stat:hover {
            transform: translateY(-5px);
            background: rgba(30, 35, 70, 0.7);
            border-color: rgba(106, 142, 255, 0.4);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            display: block;
            background: linear-gradient(135deg, #6a8eff 0%, #a67ee8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.3rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #c9c9ff;
            opacity: 0.8;
            font-weight: 400;
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Floating particles effect */
        .hero-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .hero-particle {
            position: absolute;
            background: rgba(106, 142, 255, 0.4);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(0) translateX(0) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-500px) translateX(200px) rotate(360deg);
                opacity: 0;
            }
        }

        /* About Section */
        .about {
            padding: 5rem 2rem;
            background: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 3rem;
            color: #333;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 4rem;
            align-items: center;
        }

        .about-image {
            text-align: center;
        }

        .profile-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(102, 126, 234, 0.1);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .profile-card:hover {
            transform: translateY(-10px);
        }

        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            overflow: hidden;
            /* Ensures the image stays within the circle */
            border: 4px solid white;
            /* Adds a nice border around the avatar */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures the image covers the circle without distortion */
            object-position: center;
            /* Centers the image in the circle */
        }

        .profile-info h3 {
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        .profile-info p {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            line-height: 1.5;
        }

        .profile-info {
            width: 100%;
        }

        .about-content h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .about-content p {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .skill-item {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .skill-item:hover {
            transform: translateY(-5px);
        }

        .skill-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        /* Experience Section */
        .experience {
            padding: 5rem 2rem;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        }

        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 3rem;
            width: 45%;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
            text-align: right;
        }

        .timeline-item:nth-child(even) {
            left: 55%;
            text-align: left;
        }

        .timeline-content {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .timeline-content:hover {
            transform: translateY(-5px);
        }

        .timeline-year {
            color: #667eea;
            font-weight: bold;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .timeline-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin: 0.5rem 0;
        }

        .timeline-company {
            color: #666;
            font-style: italic;
            margin-bottom: 1rem;
        }

        .timeline-description {
            color: #777;
            line-height: 1.6;
        }

        /* Portfolio Section */
        .portfolio {
            padding: 5rem 2rem;
            background: white;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .portfolio-item {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .portfolio-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .portfolio-image {
            height: 200px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .portfolio-content {
            padding: 2rem;
        }

        .portfolio-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }

        .portfolio-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .portfolio-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tech-tag {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Contact Section */
        .contact {
            padding: 5rem 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }

        .contact .section-title {
            color: white;
        }

        .contact .section-title::after {
            background: white;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .contact-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }

        .contact-item:hover {
            transform: translateY(-5px);
        }

        .contact-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .contact-item h3 {
            margin-bottom: 0.5rem;
        }

        .contact-item p {
            opacity: 0.9;
        }

        /* Footer */
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 2rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: #667eea;
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .timeline::before {
                left: 20px;
            }

            .timeline-item {
                width: calc(100% - 60px);
                left: 40px !important;
                text-align: left !important;
            }

            .hero-stats {
                gap: 1.5rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }
    </style>
</head>

<body>
    <div class="bg-animation"></div>

    <nav id="navbar">
        <div class="nav-container">
            <a href="#" class="logo">AAB</a>
            <ul class="nav-links">
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#experience">Pengalaman</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <section id="home" class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Abdurrahman Al-Amin</h1>
            <p class="hero-subtitle">Pengembang Web Senior & Pemimpin Teknologi</p>
            <p class="hero-description">
                Pengembang full-stack berpengalaman lebih dari 15 tahun dalam pengembangan web,
                transformasi digital pemerintah, dan kepemimpinan tim. Spesialisasi dalam PHP, Laravel,
                sistem GIS, dan teknologi web modern.
            </p>
            <div class="cta-buttons">
                <a href="#portfolio" class="btn btn-primary">Lihat Karya Saya</a>
                <a href="#contact" class="btn btn-secondary">Hubungi Saya</a>
            </div>
            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-number">10+</span>
                    <span class="stat-label">Tahun Pengalaman</span>
                </div>
                <div class="stat">
                    <span class="stat-number">10+</span>
                    <span class="stat-label">Proyek Selesai</span>
                </div>
                <div class="stat">
                    <span class="stat-number">3</span>
                    <span class="stat-label">Peran Kepemimpinan</span>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title fade-in">Tentang Saya</h2>
            <div class="about-grid">
                <div class="about-image fade-in">
                    <div class="profile-card">
                        <div class="avatar">
                            <img src="{{ asset('/images/mypic.jpg') }}" alt="">
                        </div>
                        <div class="profile-info">
                            <h3>Abdurrahman Al-Amin Buluatie</h3>
                            <p>S.Kom, M.Eng</p>
                            <p>📍 Wamena, Papua, Indonesia</p>
                            <p>📧 omanbuluatie79@gmail.com</p>
                            <p>📱 +62 852 4412 1999</p>
                        </div>
                    </div>
                </div>
                <div class="about-content fade-in">
                    <h3>Mengubah Ide Menjadi Solusi Digital</h3>
                    <p>
                        Dengan gelar Magister Teknik dari Universitas Gadjah Mada dan pengalaman lebih dari 10 tahun
                        dalam pengembangan web dan teknologi pemerintah, saya mengkhususkan diri dalam menciptakan
                        solusi digital inovatif yang mendorong transformasi organisasi.
                    </p>
                    <p>
                        Saat ini menjabat sebagai Kepala Bidang Pengelolaan Informasi Kependudukan di Dinas
                        Kependudukan dan Pencatatan Sipil Kabupaten Jayawijaya, saya memimpin inisiatif digital
                        yang melayani ribuan warga sekaligus membimbing generasi pengembang berikutnya.
                    </p>
                    <div class="skills-grid">
                        <div class="skill-item">
                            <div class="skill-icon">🌐</div>
                            <h4>Pengembangan Web</h4>
                            <p>PHP, Laravel, JavaScript</p>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon">🗺️</div>
                            <h4>Sistem GIS</h4>
                            <p>ArcGIS, WebGIS, QGIS</p>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon">🗄️</div>
                            <h4>Basis Data</h4>
                            <p>MySQL, PostgreSQL, Oracle</p>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon">👥</div>
                            <h4>Kepemimpinan</h4>
                            <p>Manajemen Tim, Pelatihan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="experience" class="experience">
        <div class="container">
            <h2 class="section-title fade-in">Perjalanan Profesional</h2>
            <div class="timeline">
                <div class="timeline-item fade-in">
                    <div class="timeline-content">
                        <div class="timeline-year">2024 - Sekarang</div>
                        <h3 class="timeline-title">Kepala Bidang Pengelolaan Informasi Kependudukan</h3>
                        <div class="timeline-company">Dinas Kependudukan dan Pencatatan Sipil Kabupaten Jayawijaya</div>
                        <p class="timeline-description">
                            Memimpin inisiatif transformasi digital untuk sistem administrasi kependudukan.
                            Mengelola pengolahan data, arsitektur sistem, dan pengembangan tim.
                        </p>
                    </div>
                </div>
                <div class="timeline-item fade-in">
                    <div class="timeline-content">
                        <div class="timeline-year">2024</div>
                        <h3 class="timeline-title">Anggota Tim Ahli - Arsitektur SPBE</h3>
                        <div class="timeline-company">Kementerian Perhubungan, Parekraf, dan Kominfo RI</div>
                        <p class="timeline-description">
                            Berkontribusi dalam perencanaan arsitektur pemerintahan digital tingkat nasional dan
                            strategi implementasi untuk beberapa kementerian.
                        </p>
                    </div>
                </div>
                <div class="timeline-item fade-in">
                    <div class="timeline-content">
                        <div class="timeline-year">2017 - 2023</div>
                        <h3 class="timeline-title">Kepala Seksi Pengolahan Data Kependudukan</h3>
                        <div class="timeline-company">Dinas Kependudukan dan Pencatatan Sipil Kabupaten Jayawijaya</div>
                        <p class="timeline-description">
                            Mengelola sistem data kependudukan komprehensif, menerapkan teknologi baru,
                            dan menyederhanakan proses administrasi untuk layanan warga yang lebih baik.
                        </p>
                    </div>
                </div>
                <div class="timeline-item fade-in">
                    <div class="timeline-content">
                        <div class="timeline-year">2014 - 2016</div>
                        <h3 class="timeline-title">Pengembang Web & Instruktur Pemrograman</h3>
                        <div class="timeline-company">Berbagai Organisasi</div>
                        <p class="timeline-description">
                            Mengembangkan website pemerintah, menjadi asisten pemrograman di IST AKPRIND,
                            dan berkontribusi pada pengembangan WebGIS untuk BAPPEDA Kabupaten Jayawijaya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio" class="portfolio">
        <div class="container">
            <h2 class="section-title fade-in">Proyek Unggulan</h2>
            <div class="portfolio-grid">
                <div class="portfolio-item fade-in">
                    <div class="portfolio-image">🌐</div>
                    <div class="portfolio-content">
                        <h3 class="portfolio-title">Website Resmi Kabupaten Jayawijaya</h3>
                        <p class="portfolio-description">
                            Solusi lengkap website pemerintah dengan fitur manajemen berita, informasi
                            layanan publik, dan platform keterlibatan warga. Dibangun dengan arsitektur PHP modern.
                        </p>
                        <div class="portfolio-tech">
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">MySQL</span>
                            <span class="tech-tag">JavaScript</span>
                            <span class="tech-tag">Bootstrap</span>
                        </div>
                    </div>
                </div>
                <div class="portfolio-item fade-in">
                    <div class="portfolio-image">📊</div>
                    <div class="portfolio-content">
                        <h3 class="portfolio-title">Sistem Manajemen Kinerja Pegawai</h3>
                        <p class="portfolio-description">
                            Sistem komprehensif untuk melacak, mengevaluasi, dan melaporkan kinerja pegawai
                            dengan alur kerja otomatis dan dashboard analitik real-time.
                        </p>
                        <div class="portfolio-tech">
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">PostgreSQL</span>
                            <span class="tech-tag">Chart.js</span>
                            <span class="tech-tag">Vue.js</span>
                        </div>
                    </div>
                </div>
                <div class="portfolio-item fade-in">
                    <div class="portfolio-image">🗺️</div>
                    <div class="portfolio-content">
                        <h3 class="portfolio-title">WebGIS Data Kependudukan</h3>
                        <p class="portfolio-description">
                            Sistem informasi geografis interaktif untuk memvisualisasikan data kependudukan,
                            analisis demografis, dan manajemen batas administrasi.
                        </p>
                        <div class="portfolio-tech">
                            <span class="tech-tag">ArcGIS</span>
                            <span class="tech-tag">Pmapper</span>
                            <span class="tech-tag">PostgreSQL</span>
                            <span class="tech-tag">OpenLayers</span>
                        </div>
                    </div>
                </div>
                <div class="portfolio-item fade-in">
                    <div class="portfolio-image">📋</div>
                    <div class="portfolio-content">
                        <h3 class="portfolio-title">Layanan Pencatatan Sipil Online</h3>
                        <p class="portfolio-description">
                            Transformasi digital proses pencatatan sipil yang memungkinkan warga mengakses
                            layanan online dengan pelacakan dokumen dan notifikasi otomatis.
                        </p>
                        <div class="portfolio-tech">
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">MySQL</span>
                            <span class="tech-tag">Integrasi API</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container">
            <h2 class="section-title fade-in">Mari Bekerja Sama</h2>
            <p class="fade-in" style="max-width: 600px; margin: 0 auto 3rem; opacity: 0.9;">
                Siap mewujudkan ide Anda? Saya selalu bersemangat untuk berkolaborasi dalam proyek inovatif
                dan membantu organisasi mencapai tujuan transformasi digital mereka.
            </p>
            <div class="contact-info">
                <div class="contact-item fade-in">
                    <div class="contact-icon">📧</div>
                    <h3>Email</h3>
                    <p>omanbuluatie79@gmail.com</p>
                </div>
                <div class="contact-item fade-in">
                    <div class="contact-icon">📱</div>
                    <h3>Telepon</h3>
                    <p>+62 852 4412 1999</p>
                </div>
                <div class="contact-item fade-in">
                    <div class="contact-icon">📍</div>
                    <h3>Lokasi</h3>
                    <p>Wamena, Papua, Indonesia</p>
                </div>
                <div class="contact-item fade-in">
                    <div class="contact-icon">💼</div>
                    <h3>Ketersediaan</h3>
                    <p>Terbuka untuk freelance & konsultasi</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="social-links">
            <a href="#" class="social-link">🌐</a>
        </div>
        <p>&copy; 2024 Abdurrahman Al-Amin Buluatie. Hak cipta dilindungi.</p>
        <p style="margin-top: 0.5rem; opacity: 0.7; font-size: 0.9rem;">
            Dibuat dengan semangat untuk keunggulan digital
        </p>
    </footer>



    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Fade in animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Interactive stats counter animation
        function animateStats() {
            const stats = document.querySelectorAll('.stat-number');
            stats.forEach(stat => {
                const target = parseInt(stat.textContent.replace('+', ''));
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    stat.textContent = Math.floor(current) + (stat.textContent.includes('+') ? '+' : '');
                }, 40);
            });
        }

        // Trigger stats animation when hero section is visible
        const heroObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    heroObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        heroObserver.observe(document.querySelector('.hero'));

        // Interactive portfolio items
        document.querySelectorAll('.portfolio-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-15px) scale(1.02)';
            });

            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-10px) scale(1)';
            });
        });

        // Dynamic background animation
        function createFloatingElements() {
            const hero = document.querySelector('.hero');
            for (let i = 0; i < 5; i++) {
                const element = document.createElement('div');
                element.style.position = 'absolute';
                element.style.width = Math.random() * 100 + 50 + 'px';
                element.style.height = element.style.width;
                element.style.background = 'rgba(102, 126, 234, 0.1)';
                element.style.borderRadius = '50%';
                element.style.left = Math.random() * 100 + '%';
                element.style.top = Math.random() * 100 + '%';
                element.style.animation = `float ${Math.random() * 10 + 10}s ease-in-out infinite`;
                element.style.animationDelay = Math.random() * 5 + 's';
                element.style.pointerEvents = 'none';
                hero.appendChild(element);
            }
        }

        // Initialize floating elements
        createFloatingElements();

        // Contact form interaction (if you want to add a form later)
        document.querySelectorAll('.contact-item').forEach(item => {
            item.addEventListener('click', function() {
                const contactType = this.querySelector('h3').textContent;
                const contactValue = this.querySelector('p').textContent;

                if (contactType === 'Email') {
                    window.location.href = `mailto:${contactValue}`;
                } else if (contactType === 'Phone') {
                    window.location.href = `tel:${contactValue.replace(/\s/g, '')}`;
                }
            });
        });

        // Add subtle parallax effect
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;

            document.querySelector('.bg-animation').style.transform =
                `translateY(${rate}px)`;
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                // Close any modals or dropdowns if implemented
                document.activeElement.blur();
            }
        });

        // Performance optimization - lazy load images when implemented
        if ('IntersectionObserver' in window) {
            const lazyImages = document.querySelectorAll('img[data-src]');
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(function(img) {
                imageObserver.observe(img);
            });
        }

        // Add loading state management
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');

            // Add a subtle entrance animation
            setTimeout(() => {
                document.querySelector('.hero-content').style.opacity = '1';
                document.querySelector('.hero-content').style.transform = 'translateY(0)';
            }, 100);
        });

        // Mobile menu toggle (if you want to add mobile menu later)
        function toggleMobileMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('mobile-active');
        }

        // Add touch gestures for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        document.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                // Swipe left - could navigate to next section
                console.log('Swiped left');
            }
            if (touchEndX > touchStartX + 50) {
                // Swipe right - could navigate to previous section
                console.log('Swiped right');
            }
        }

        // Analytics tracking (placeholder for future implementation)
        function trackEvent(category, action, label) {
            // GTM or GA4 tracking would go here
            console.log(`Event: ${category} - ${action} - ${label}`);
        }

        // Track portfolio item clicks
        document.querySelectorAll('.portfolio-item').forEach((item, index) => {
            item.addEventListener('click', function() {
                trackEvent('Portfolio', 'Click', `Item ${index + 1}`);
            });
        });

        // Track CTA button clicks
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function() {
                trackEvent('CTA', 'Click', this.textContent.trim());
            });
        });

        console.log('🚀 Portfolio website loaded successfully!');
        console.log('👨‍💻 Developed by Abdurrahman Al-Amin Buluatie');
        console.log('📧 Contact: omanbuluatie79@gmail.com');
    </script>
</body>

</html>
