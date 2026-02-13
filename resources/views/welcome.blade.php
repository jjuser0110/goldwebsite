<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Character Encoding -->
    <meta charset="UTF-8">

    <!-- Viewport for Responsive Design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>6868 GOLD - Premium Gold Buyer</title>
    <meta name="title" content="6868 GOLD - Premium Gold Buyer">
    <meta name="description" content="6868 GOLD - Professional Gold Buying Service. Best rates for your gold jewelry, ornaments, and scrap gold.">
    <meta name="keywords" content="gold buying, sell gold, gold jewelry, scrap gold, gold rates, gold ornaments">
    <meta name="author" content="6868 GOLD">

    <!-- Favicon / App Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/horizontallogo.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/horizontallogo.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/horizontallogo.png')}}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.6868gold.com/">
    <meta property="og:title" content="6868 GOLD - Premium Gold Buyer">
    <meta property="og:description" content="6868 GOLD - Professional Gold Buying Service. Best rates for your gold jewelry, ornaments, and scrap gold.">
    <meta property="og:image" content="https://www.6868gold.com/og-image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.6868gold.com/">
    <meta property="twitter:title" content="6868 GOLD - Premium Gold Buyer">
    <meta property="twitter:description" content="6868 GOLD - Professional Gold Buying Service. Best rates for your gold jewelry, ornaments, and scrap gold.">
    <meta property="twitter:image" content="https://www.6868gold.com/og-image.jpg">

    <!-- Optional: Theme Color for Mobile -->
    <meta name="theme-color" content="#aaad0d">

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
            background-color: #ffffff;
            overflow-x: hidden;
        }

        /* Fixed Navigation Bar */
        .navbar {
            /* background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); */
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            background-image: url('{{asset("assets/img/background2.jpg")}}');
            background-size: 110%;
            background-position: center;
            background-repeat: no-repeat;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            flex-wrap: wrap;
        }

        .logo img {
            height: 40px; /* Keep your desired logo height */
            display: block; /* Removes any inline spacing issues */
        }

        /* Language Switcher */
        .language-switcher {
            display: flex;
            gap: 0;
            align-items: center;
            order: 2;
        }

        .lang-btn {
            background: transparent;
            border: none;
            color: #fff;
            padding: 0.4rem 0.8rem;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s;
            font-weight: 400;
            position: relative;
        }

        .lang-btn:not(:last-child)::after {
            content: '|';
            position: absolute;
            right: 0;
            color: #666;
        }

        .lang-btn:hover {
            color: #D4AF37;
        }

        .lang-btn.active {
            color: #D4AF37;
            font-weight: 500;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            order: 3;
        }

        .nav-menu a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 0.5rem 1rem;
        }

        .nav-menu a:hover {
            color: #D4AF37;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: #D4AF37;
            font-size: 1.5rem;
            cursor: pointer;
            order: 4;
        }

        /* Hero Section with Beautiful Gold Background */
        .hero {
        /* Multiple backgrounds: first the gradients, then the image at the bottom */
            background: 
                linear-gradient(135deg, rgba(26, 26, 26, 0.7) 0%, rgba(61, 61, 61, 0.9) 100%),
                repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(212, 175, 55, 0.03) 10px, rgba(212, 175, 55, 0.03) 20px),
                radial-gradient(circle at 20% 50%, rgba(212, 175, 55, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(244, 208, 63, 0.15) 0%, transparent 50%),
                url('{{asset("assets/img/banner.jpg")}}');
            
            /* Make the image cover the container */
            background-size: cover;        /* Makes the image cover entire hero */
            background-position: center;   /* Center the image */
            background-repeat: no-repeat;  /* Avoid repeating */
            
            color: white;
            padding: 120px 2rem 80px;
            text-align: center;
            margin-top: 60px;
            position: relative;
            overflow: hidden;
        }


        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 30% 30%, rgba(212, 175, 55, 0.2) 0%, transparent 40%),
                radial-gradient(circle at 70% 70%, rgba(244, 208, 63, 0.15) 0%, transparent 40%);
            animation: shimmer 10s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes shimmer {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #D4AF37;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
            position: relative;
            z-index: 1;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            color: #f0f0f0;
            position: relative;
            z-index: 1;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #D4AF37 0%, #F4D03F 100%);
            color: #1a1a1a;
            padding: 1rem 2.5rem;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);
            position: relative;
            z-index: 1;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.6);
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            width: 100%;
        }

        /* Rates Section */
        .rates-section {
            padding: 5rem 1rem 1rem 1rem;
            background-color: #f8f8f8;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 1px;
            color: #1a1a1a;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 1rem;
        }

        /* Enhanced Table Design */
        .rates-table-container {
            max-width: 900px;
            margin: 0 auto 3rem;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border: 2px solid #D4AF37;
        }

        .rates-table {
            width: 100%;
            border-collapse: collapse;
        }

        .rates-table thead {
            background: linear-gradient(135deg, #D4AF37 0%, #F4D03F 50%, #D4AF37 100%);
            position: relative;
        }

        .rates-table thead::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #1a1a1a, transparent);
        }

        .rates-table th {
            padding: 1.8rem 2rem;
            text-align: left;
            color: #1a1a1a;
            font-size: 1.3rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .rates-table tbody tr {
            border-bottom: 2px solid #f0f0f0;
            transition: all 0.3s;
        }

        .rates-table tbody tr:last-child {
            border-bottom: none;
        }

        .rates-table tbody tr:hover {
            background: linear-gradient(90deg, #fffbea, #fff9e6, #fffbea);
            transform: scale(1.01);
            box-shadow: inset 0 0 20px rgba(212, 175, 55, 0.1);
        }

        .rates-table td {
            padding: 1.8rem 2rem;
            font-size: 1.2rem;
            color: #333;
        }

        .rates-table td:first-child {
            font-weight: 600;
            color: #1a1a1a;
        }

        .price-cell {
            text-align: right;
            font-weight: bold;
            color: #D4AF37;
            font-size: 1.5rem;
            text-shadow: 1px 1px 2px rgba(212, 175, 55, 0.3);
        }

        /* Add gold icon before gold type */
        .rates-table tbody td:first-child::before {
            content: '◆';
            color: #D4AF37;
            margin-right: 0.5rem;
            font-size: 1rem;
        }

        /* Rate Cards */
        .rates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .rate-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border-top: 4px solid #D4AF37;
        }

        .rate-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }

        .rate-card h3 {
            color: #1a1a1a;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .karat-info {
            background: linear-gradient(135deg, #D4AF37 0%, #F4D03F 100%);
            color: #1a1a1a;
            padding: 0.5rem;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .price {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #D4AF37;
            margin: 1rem 0;
        }

        .price-unit {
            font-size: 0.9rem;
            color: #666;
            display: block;
            margin-top: 0.5rem;
        }

        /* About Section */
        .about-section {
            padding: 4rem 1rem;
            background: white;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .about-text h2 {
            font-size: 2.5rem;
            color: #1a1a1a;
            margin-bottom: 1.5rem;
        }

        .about-text p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 1rem;
            line-height: 1.8;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #D4AF37 0%, #F4D03F 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .feature-text {
            color: #333;
            font-weight: 500;
        }

        /* Contact Section */
        .contact-section {
            padding: 4rem 1rem;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: white;
        }

        .contact-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .contact-content h2 {
            font-size: 2.5rem;
            color: #D4AF37;
            margin-bottom: 1rem;
        }

        .contact-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .contact-methods {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .contact-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.5rem 2rem;
            border-radius: 10px;
            min-width: 250px;
            transition: background 0.3s;
        }

        .contact-item:hover {
            background: rgba(212, 175, 55, 0.2);
        }

        .contact-item h3 {
            color: #D4AF37;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .contact-item a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
        }

        .contact-item a:hover {
            color: #D4AF37;
        }

        /* Footer */
        .footer {
            background: #0a0a0a;
            color: #ccc;
            text-align: center;
            padding: 2rem;
        }

        .footer p {
            margin-bottom: 0.5rem;
        }

        /* Update Notice */
        .update-notice {
            background: #fffbea;
            border-left: 4px solid #D4AF37;
            padding: 1rem;
            margin: 2rem auto;
            max-width: 900px;
            border-radius: 5px;
            text-align: center;
            font-style: italic;
            color: #666;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {

            .nav-container {
                padding: 0 1rem;
            }

            .mobile-menu-btn {
                display: block;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: #1a1a1a;
                flex-direction: column;
                padding: 1rem 0;
                gap: 0;
                order: 5;
            }

            .nav-menu.active {
                display: flex;
            }

            .nav-menu a {
                padding: 1rem 2rem;
                /* border-bottom: 1px solid #333; */
            }

            .language-switcher {
                order: 2;
                margin-left: auto;
                margin-right: 1rem;
            }

            .hero {
                padding: 100px 1rem 60px;
            }

            .hero h1 {
                font-size: 3rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .rates-grid {
                grid-template-columns: 1fr;
            }

            .rates-table th,
            .rates-table td {
                padding: 0.6rem;
                font-size: 1rem;
            }

            .rates-table th {
                font-size: 1.1rem;
            }

            .price-cell {
                font-size: 1.2rem;
            }

            .about-content {
                grid-template-columns: 1fr;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .contact-methods {
                flex-direction: column;
                align-items: center;
            }

            .section-title {
                font-size: 2rem;
            }
            .nav-menu li {
                padding: 12px 20px;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 1.4rem;
            }

            .cta-button {
                padding: 0.8rem 2rem;
                font-size: 1rem;
            }

            .rates-table th,
            .rates-table td {
                padding: 0.4rem;
                font-size: 0.95rem;
            }

            .rates-table tbody td:first-child::before {
                margin-right: 0.3rem;
            }
        }
    </style>
</head>
<body>
    <!-- Fixed Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo"><img src="{{asset('assets/img/logoonly.png')}}" alt="6868 GOLD Logo"></div>
            <div class="language-switcher">
                <button class="lang-btn active" onclick="switchLanguage('en')">EN</button>
                <button class="lang-btn" onclick="switchLanguage('cn')">中文</button>
                <button class="lang-btn" onclick="switchLanguage('bm')">BM</button>
            </div>
            <button class="mobile-menu-btn" onclick="toggleMenu()">☰</button>
            <ul class="nav-menu" id="navMenu">
                <li>
                    <a href="weixin://dl/chat?LPPL-96">
                        <span data-en="Wechat" data-cn="Wechat" data-bm="Wechat">
                            Wechat
                        </span>
                    </a>
                </li>

                <li>
                    <a href="https://wa.me/60183156868" target="_blank">
                        <span data-en="Whatsapp" data-cn="Whatsapp" data-bm="Whatsapp">
                            Whatsapp
                        </span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <!-- <section class="hero" id="home">
        <div class="container">
            <h1><span data-en="Welcome to 6868 GOLD" data-cn="欢迎来到 6868 GOLD" data-bm="Selamat Datang ke 6868 GOLD">Welcome to 6868 GOLD</span></h1>
            <p><span data-en="Your Trusted Gold Buyer - Best Rates, Instant Payment" data-cn="您值得信赖的黄金买家 - 最优价格，即时付款" data-bm="Pembeli Emas Terpercaya Anda - Harga Terbaik, Bayaran Segera">Your Trusted Gold Buyer - Best Rates, Instant Payment</span></p>
            <a href="#contact" class="cta-button"><span data-en="Contact Us Now" data-cn="立即联系我们" data-bm="Hubungi Kami Sekarang">Contact Us Now</span></a>
        </div>
    </section> -->

    <!-- Gold Rates Section -->
    <section class="rates-section" id="rates">
        <div class="container">
            <h2 class="section-title">
                <span id="nowdate">- {{$now_date??''}} -</span>
            </h2>
            <p class="section-subtitle">
                <span id="nowtime">{{$now_time??''}}</span>
            </p>
            
            <!-- Table First -->
            <div class="rates-table-container">
                <table class="rates-table">
                    <thead>
                        <tr>
                            <th><span data-en="Gold Type" data-cn="黄金类型" data-bm="Jenis Emas">Gold Type</span></th>
                            <th style="text-align: right;"><span data-en="RM / Gram" data-cn="令吉/克" data-bm="RM / Gram">RM / Gram</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>PAMP</strong></td>
                            <td class="price-cell" id="pamp"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong>GOLDBAR</strong></td>
                            <td class="price-cell" id="goldbar"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong>999</strong></td>
                            <td class="price-cell" id="gold999"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong>950</strong></td>
                            <td class="price-cell" id="gold950"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong>916</strong></td>
                            <td class="price-cell" id="gold916"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong>835</strong></td>
                            <td class="price-cell" id="gold835"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong>750</strong></td>
                            <td class="price-cell" id="gold750"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong>585</strong></td>
                            <td class="price-cell" id="gold585"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong>375</strong></td>
                            <td class="price-cell" id="gold375"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <!-- <tr>
                            <td><strong><span data-en="Scrap Gold" data-cn="废金" data-bm="Emas Scrap">Scrap Gold</span></strong></td>
                            <td class="price-cell"><span data-en="Contact Us" data-cn="联系我们" data-bm="Hubungi Kami">Contact Us</span></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <!-- Rate Cards After Table -->
            <!-- <div class="rates-grid">
                <div class="rate-card">
                    <h3><span data-en="Pure Gold" data-cn="纯金" data-bm="Emas Tulen">Pure Gold</span></h3>
                    <div class="karat-info">999 / 24K</div>
                    <div class="price">
                        RM 600.00
                        <span class="price-unit" data-en="per gram" data-cn="每克" data-bm="per gram">per gram</span>
                    </div>
                </div>

                <div class="rate-card">
                    <h3><span data-en="High Purity Gold" data-cn="高纯度金" data-bm="Emas Ketulenan Tinggi">High Purity Gold</span></h3>
                    <div class="karat-info">916 / 22K</div>
                    <div class="price">
                        RM 541.00
                        <span class="price-unit" data-en="per gram" data-cn="每克" data-bm="per gram">per gram</span>
                    </div>
                </div>

                <div class="rate-card">
                    <h3><span data-en="Standard Gold" data-cn="标准金" data-bm="Emas Standard">Standard Gold</span></h3>
                    <div class="karat-info">750 / 18K</div>
                    <div class="price">
                        RM 414.00
                        <span class="price-unit" data-en="per gram" data-cn="每克" data-bm="per gram">per gram</span>
                    </div>
                </div>

                <div class="rate-card">
                    <h3><span data-en="Lower Karat Gold" data-cn="低K金" data-bm="Emas Karat Rendah">Lower Karat Gold</span></h3>
                    <div class="karat-info">585 / 14K</div>
                    <div class="price">
                        RM 298.00
                        <span class="price-unit" data-en="per gram" data-cn="每克" data-bm="per gram">per gram</span>
                    </div>
                </div>

                <div class="rate-card">
                    <h3><span data-en="Classic Gold" data-cn="经典金" data-bm="Emas Klasik">Classic Gold</span></h3>
                    <div class="karat-info">375 / 9K</div>
                    <div class="price">
                        RM 167.00
                        <span class="price-unit" data-en="per gram" data-cn="每克" data-bm="per gram">per gram</span>
                    </div>
                </div>

                <div class="rate-card">
                    <h3><span data-en="Scrap Gold" data-cn="废金" data-bm="Emas Scrap">Scrap Gold</span></h3>
                    <div class="karat-info"><span data-en="Various Purity" data-cn="各种纯度" data-bm="Pelbagai Ketulenan">Various Purity</span></div>
                    <div class="price">
                        <span data-en="Contact Us" data-cn="联系我们" data-bm="Hubungi Kami">Contact Us</span>
                        <span class="price-unit" data-en="for best quote" data-cn="获取最佳报价" data-bm="untuk sebut harga terbaik">for best quote</span>
                    </div>
                </div>
            </div> -->

            <div class="update-notice">
                <span data-en="Rates updated daily. Contact us for the latest prices and special offers." data-cn="价格每日更新。联系我们获取最新价格和特别优惠。" data-bm="Harga dikemaskini setiap hari. Hubungi kami untuk harga terkini dan tawaran istimewa.">Rates updated daily. Contact us for the latest prices and special offers.</span>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <!-- <section class="about-section" id="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2><span data-en="Why Choose 6868 GOLD?" data-cn="为什么选择 6868 GOLD？" data-bm="Mengapa Pilih 6868 GOLD?">Why Choose 6868 GOLD?</span></h2>
                    <p><span data-en="We are a professional gold buying company committed to providing the best rates and most transparent service in the market. With years of experience, we've built our reputation on trust, fairness, and customer satisfaction." data-cn="我们是一家专业的黄金收购公司，致力于提供市场上最优惠的价格和最透明的服务。凭借多年经验，我们建立了信任、公平和客户满意度的声誉。" data-bm="Kami adalah syarikat pembelian emas profesional yang komited untuk menyediakan harga terbaik dan perkhidmatan yang paling telus di pasaran. Dengan pengalaman bertahun-tahun, kami telah membina reputasi atas kepercayaan, keadilan, dan kepuasan pelanggan.">We are a professional gold buying company committed to providing the best rates and most transparent service in the market. With years of experience, we've built our reputation on trust, fairness, and customer satisfaction.</span></p>
                    <p><span data-en="Whether you're selling jewelry, ornaments, or scrap gold, we ensure you get the best value for your precious metal." data-cn="无论您是出售珠宝、饰品还是废金，我们都确保您的贵金属获得最佳价值。" data-bm="Sama ada anda menjual barang kemas, perhiasan, atau emas scrap, kami memastikan anda mendapat nilai terbaik untuk logam berharga anda.">Whether you're selling jewelry, ornaments, or scrap gold, we ensure you get the best value for your precious metal.</span></p>
                </div>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <div class="feature-text"><span data-en="Best Market Rates" data-cn="最优市场价格" data-bm="Harga Pasaran Terbaik">Best Market Rates</span></div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <div class="feature-text"><span data-en="Instant Payment" data-cn="即时付款" data-bm="Bayaran Segera">Instant Payment</span></div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <div class="feature-text"><span data-en="Professional Service" data-cn="专业服务" data-bm="Perkhidmatan Profesional">Professional Service</span></div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <div class="feature-text"><span data-en="Transparent Process" data-cn="透明流程" data-bm="Proses Telus">Transparent Process</span></div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <div class="feature-text"><span data-en="Licensed & Trusted" data-cn="持牌可信" data-bm="Berlesen & Dipercayai">Licensed & Trusted</span></div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <div class="feature-text"><span data-en="No Hidden Charges" data-cn="无隐藏费用" data-bm="Tiada Caj Tersembunyi">No Hidden Charges</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Contact Section -->
    <!-- <section class="contact-section" id="contact">
        <div class="contact-content">
            <h2><span data-en="Get in Touch" data-cn="联系我们" data-bm="Hubungi Kami">Get in Touch</span></h2>
            <img src="{{asset('assets/img/newlogo.jpg')}}" style="height:200px" alt="6868 GOLD Logo">
            <p><span data-en="Ready to sell your gold? Contact us today for the best rates!" data-cn="准备出售您的黄金？立即联系我们获取最优价格！" data-bm="Bersedia untuk menjual emas anda? Hubungi kami hari ini untuk harga terbaik!">Ready to sell your gold? Contact us today for the best rates!</span></p>
            
            <div class="contact-methods">
                <div class="contact-item">
                    <h3>📱 WhatsApp</h3>
                    <a href="https://wa.me/60165727011" target="_blank">+6016-572 7011</a>
                </div>
                <div class="contact-item">
                    <h3>📞 <span data-en="Phone" data-cn="电话" data-bm="Telefon">Phone</span></h3>
                    <a href="tel:+60165727011">+6016-572 7011</a>
                </div>
            </div>
            
            <div style="margin-top: 3rem;">
                <a href="#rates" class="cta-button"><span data-en="View Our Rates" data-cn="查看我们的价格" data-bm="Lihat Harga Kami">View Our Rates</span></a>
            </div>
        </div>
    </section> -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 6868 GOLD. <span data-en="All Rights Reserved." data-cn="版权所有。" data-bm="Hak Cipta Terpelihara.">All Rights Reserved.</span></p>
            <p><span data-en="Professional Gold Buying Service" data-cn="专业黄金收购服务" data-bm="Perkhidmatan Pembelian Emas Profesional">Professional Gold Buying Service</span></p>
        </div>
    </footer>

  <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <script>
        // Language switching functionality
        let currentLang = 'en';

        function switchLanguage(lang) {
            currentLang = lang;
            
            // Update active button
            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Update all text elements
            document.querySelectorAll('[data-en]').forEach(element => {
                if (lang === 'en') {
                    element.textContent = element.getAttribute('data-en');
                } else if (lang === 'cn') {
                    element.textContent = element.getAttribute('data-cn');
                } else if (lang === 'bm') {
                    element.textContent = element.getAttribute('data-bm');
                }
            });
        }

        
        // Mobile menu toggle
        function toggleMenu() {
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.toggle('active');
        }

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                const navMenu = document.getElementById('navMenu');
                navMenu.classList.remove('active');
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navbarHeight = document.querySelector('.navbar').offsetHeight;
                    const targetPosition = target.offsetTop - navbarHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        function fetchGoldPrices() {
            $.ajax({
                url: "{{url('getPrices')}}",
                type: "GET",
                success: function(response) {
                    // console.log(response.data);

                    $.each(response.data, function(type, dd) {
                        let elem = $("#" + type);
                        let oldValue = parseFloat(elem.text().replace("RM ", "")); // get old value without "RM "
                        let newValue = parseFloat(dd).toFixed(2);

                        // Compare old and new values
                        if (isNaN(oldValue)) {
                            // If no old value yet, keep black
                            elem.css("color", "black");
                        } else if (newValue > oldValue) {
                            elem.css("color", "green");
                        } else if (newValue < oldValue) {
                            elem.css("color", "red");
                        } else {
                            elem.css("color", "black");
                        }

                        // Update text
                        elem.text("RM " + newValue);
                    });

                    $("#nowdate").text('- '+response.now_date+' -');
                    $("#nowtime").text(response.now_time);
                }
            });
        }
        fetchGoldPrices();
        setInterval(fetchGoldPrices, 4000);

    </script>
</body>
</html>