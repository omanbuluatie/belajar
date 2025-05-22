<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abdurrahman Al-Amin - Web Developer & Tech Leader</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div class="bg-animation"></div>

    <nav id="navbar">
        <div class="nav-container">
            <a href="#" class="logo">AAB</a>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#experience">Experience</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <section id="home" class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Abdurrahman Al-Amin</h1>
            <p class="hero-subtitle">Senior Web Developer & Technology Leader</p>
            <p class="hero-description">
                Passionate full-stack developer with 15+ years of experience in web development, 
                government digital transformation, and team leadership. Specialized in PHP, Laravel, 
                GIS systems, and modern web technologies.
            </p>
            <div class="cta-buttons">
                <a href="#portfolio" class="btn btn-primary">View My Work</a>
                <a href="#contact" class="btn btn-secondary">Get In Touch</a>
            </div>
            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-number">15+</span>
                    <span class="stat-label">Years Experience</span>
                </div>
                <div class="stat">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Projects Completed</span>
                </div>
                <div class="stat">
                    <span class="stat-number">5</span>
                    <span class="stat-label">Leadership Roles</span>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title fade-in">About Me</h2>
            <div class="about-grid">
                <div class="about-image fade-in">
                    <div class="profile-card">
                        <div class="avatar">AA</div>
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
                    <h3>Transforming Ideas into Digital Solutions</h3>
                    <p>
                        With a Master's degree in Engineering from Universitas Gadjah Mada and over 15 years 
                        of experience in web development and government technology, I specialize in creating 
                        innovative digital solutions that drive organizational transformation.
                    </p>
                    <p>
                        Currently serving as Head of Population Information Management at the Department of 
                        Population and Civil Registration of Jayawijaya Regency, I lead digital initiatives 
                        that serve thousands of citizens while mentoring the next generation of developers.
                    </p>
                    <div class="skills-grid">
                        <div class="skill-item">
                            <div class="skill-icon">🌐</div>
                            <h4>Web Development</h4>
                            <p>PHP, Laravel, JavaScript</p>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon">🗺️</div>
                            <h4>GIS Systems</h4>
                            <p>ArcGIS, WebGIS, QGIS</p>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon">🗄️</div>
                            <h4>Database</h4>
                            <p>MySQL, PostgreSQL, Oracle</p>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon">👥</div>
                            <h4>Leadership</h4>
                            <p>Team Management, Training</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="experience" class="experience">
        <div class="container">
            <h2 class="section-title fade-in">Professional Journey</h2>
            <div class="timeline">
                <div class="timeline-item fade-in">
                    <div class="timeline-content">
                        <div class="timeline-year">2024 - Present</div>
                        <h3 class="timeline-title">Head of Population Information Management</h3>
                        <div class="timeline-company">Dinas Kependudukan dan Pencatatan Sipil Kabupaten Jayawijaya</div>
                        <p class="timeline-description">
                            Leading digital transformation initiatives for population administration systems. 
                            Managing data processing, system architecture, and team development.
                        </p>
                    </div>
                </div>
                <div class="timeline-item fade-in">
                    <div class="timeline-content">
                        <div class="timeline-year">2024</div>
                        <h3 class="timeline-title">Expert Team Member - SPBE Architecture</h3>
                        <div class="timeline-company">Kementerian Perhubungan, Parekraf, dan Kominfo RI</div>
                        <p class="timeline-description">
                            Contributing to national-level digital government architecture planning and 
                            implementation strategies for multiple ministries.
                        </p>
                    </div>
                </div>
                <div class="timeline-item fade-in">
                    <div class="timeline-content">
                        <div class="timeline-year">2017 - 2023</div>
                        <h3 class="timeline-title">Head of Population Data Processing</h3>
                        <div class="timeline-company">Dinas Kependudukan dan Pencatatan Sipil Kabupaten Jayawijaya</div>
                        <p class="timeline-description">
                            Managed comprehensive population data systems, implemented new technologies, 
                            and streamlined administrative processes for improved citizen services.
                        </p>
                    </div>
                </div>
                <div class="timeline-item fade-in">
                    <div class="timeline-content">
                        <div class="timeline-year">2014 - 2016</div>
                        <h3 class="timeline-title">Web Developer & Programming Instructor</h3>
                        <div class="timeline-company">Multiple Organizations</div>
                        <p class="timeline-description">
                            Developed government websites, served as programming assistant at IST AKPRIND, 
                            and contributed to WebGIS development for BAPPEDA Kabupaten Jayawijaya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio" class="portfolio">
        <div class="container">
            <h2 class="section-title fade-in">Featured Projects</h2>
            <div class="portfolio-grid">
                <div class="portfolio-item fade-in">
                    <div class="portfolio-image">🌐</div>
                    <div class="portfolio-content">
                        <h3 class="portfolio-title">Kabupaten Jayawijaya Official Website</h3>
                        <p class="portfolio-description">
                            Complete government website solution featuring news management, public services 
                            information, and citizen engagement platforms. Built with modern PHP architecture.
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
                        <h3 class="portfolio-title">Employee Performance Management System</h3>
                        <p class="portfolio-description">
                            Comprehensive system for tracking, evaluating, and reporting employee performance 
                            with automated workflows and real-time analytics dashboard.
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
                        <h3 class="portfolio-title">Population Data WebGIS</h3>
                        <p class="portfolio-description">
                            Interactive geographic information system for visualizing population data, 
                            demographic analytics, and administrative boundary management.
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
                        <h3 class="portfolio-title">Online Civil Registration Services</h3>
                        <p class="portfolio-description">
                            Digital transformation of civil registration processes allowing citizens to 
                            access services online with document tracking and automated notifications.
                        </p>
                        <div class="portfolio-tech">
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">MySQL</span>
                            <span class="tech-tag">API Integration</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container">
            <h2 class="section-title fade-in">Let's Work Together</h2>
            <p class="fade-in" style="max-width: 600px; margin: 0 auto 3rem; opacity: 0.9;">
                Ready to bring your ideas to life? I'm always excited to collaborate on innovative 
                projects and help organizations achieve their digital transformation goals.
            </p>
            <div class="contact-info">
                <div class="contact-item fade-in">
                    <div class="contact-icon">📧</div>
                    <h3>Email</h3>
                    <p>omanbuluatie79@gmail.com</p>
                </div>
                <div class="contact-item fade-in">
                    <div class="contact-icon">📱</div>
                    <h3>Phone</h3>
                    <p>+62 852 4412 1999</p>
                </div>
                <div class="contact-item fade-in">
                    <div class="contact-icon">📍</div>
                    <h3>Location</h3>
                    <p>Wamena, Papua, Indonesia</p>
                </div>
                <div class="contact-item fade-in">
                    <div class="contact-icon">💼</div>
                    <h3>Availability</h3>
                    <p>Open for freelance & consulting</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="social-links">
            <a href="#" class="social-link">🌐</a>
        </div>
        <p>&copy; 2024 Abdurrahman Al-Amin Buluatie. All rights reserved.</p>
        <p style="margin-top: 0.5rem; opacity: 0.7; font-size: 0.9rem;">
            Crafted with passion for digital excellence
        </p>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
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
        }, { threshold: 0.5 });

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