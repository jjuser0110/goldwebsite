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
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/logoonly.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/logoonly.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/logoonly.png')}}">

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

            /* ADD THESE 3 LINES */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            flex: 1;
            min-height: auto;
            padding-bottom: 20px;

        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 1px;
            color: #1a1a1a;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        /* Enhanced Table Design */
        .rates-table-container {
            max-width: 900px;
            margin: 0 auto 1rem;
            background: white;
            /* border-radius: 20px; */
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
            .nav-container { padding: 0 1rem; }
            .mobile-menu-btn { display: block; }

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
            .nav-menu.active { display: flex; }
            .nav-menu a { padding: 1rem 2rem; }
            .nav-menu li { padding: 12px 20px; }

            .language-switcher {
                order: 2;
                margin-left: auto;
                margin-right: 1rem;
            }

            .hero { padding: 100px 1rem 60px; }
            .hero h1 { font-size: 1.8rem; } /* ← was 3rem, now fits mobile */
            .hero p { font-size: 1rem; }

            .section-title { font-size: 1.5rem; }
            .section-subtitle { font-size: 0.95rem; }

            .rates-table th,
            .rates-table td { padding: 0.8rem 1rem; font-size: 1rem; }
            .rates-table th { font-size: 1rem; }
            .price-cell { font-size: 1.2rem; }

            .about-content { grid-template-columns: 1fr; }
            .features-grid { grid-template-columns: 1fr; }
            .contact-methods { flex-direction: column; align-items: center; }
            .rates-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .hero h1 { font-size: 1.5rem; }
            .section-title { font-size: 1.1rem; }

            .rates-table th,
            .rates-table td { padding: 0.2rem 0.9rem; font-size: 0.8rem; }
            .price-cell { font-size: 1rem; }

            .rates-table tbody td:first-child::before { margin-right: 0.3rem; }
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            gap: 10px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Left button */
        .share-btn {
            background: #24b400;
            color: #000000;
        }

        .share-btn:hover {
            background: #5a6268;
        }

        /* Right button */
        .refresh-btn {
            background: #d4af37;
            color: #000000;
        }

        .refresh-btn:hover {
            background: #b8962e;
        }
    </style>
</head>
<body>
    <!-- Fixed Navigation -->
    <nav class="navbar" id="share_navbar">
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
                    <a>
                        <span data-en="Wechat" data-cn="Wechat" data-bm="Wechat">
                            Wechat ID: Emas-6868
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

    <!-- Gold Rates Section -->
    <section class="rates-section" id="rates">
        <div class="container">
            <h2 class="section-title">
                <span id="nowdate">- {{$now_date??''}} <span style="font-weight:normal">{{$now_time??''}}</span>-</span>
            </h2>
            <p class="section-subtitle">
                <span id="now_count_down"></span>
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
                        @foreach($goldRates as $row)
                            @if($row->type != 'datetime')
                            <tr>
                                <td>
                                    <strong id="{{ $row->type }}_name">
                                        {{ $row->show_name ?? strtoupper($row->type) }}
                                    </strong>
                                </td>
                                <td class="price-cell" id="{{ $row->type }}">
                                    <img src="{{asset('assets/img/pload2.gif')}}" height="25">
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                    <!-- <tbody>
                        <tr>
                            <td><strong id="pamp_name">PAMP</strong></td>
                            <td class="price-cell" id="pamp"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="goldbar_name">GOLDBAR</strong></td>
                            <td class="price-cell" id="goldbar"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="gold999_name">999</strong></td>
                            <td class="price-cell" id="gold999"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="gold950_name">950</strong></td>
                            <td class="price-cell" id="gold950"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="gold916_name">916</strong></td>
                            <td class="price-cell" id="gold916"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="gold835_name">835</strong></td>
                            <td class="price-cell" id="gold835"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="gold750_name">750</strong></td>
                            <td class="price-cell" id="gold750"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="gold585_name">585</strong></td>
                            <td class="price-cell" id="gold585"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="gold375_name">375</strong></td>
                            <td class="price-cell" id="gold375"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="type1_name">Type 1</strong></td>
                            <td class="price-cell" id="type1"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="type2_name">Type 2</strong></td>
                            <td class="price-cell" id="type2"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="type3_name">Type 3</strong></td>
                            <td class="price-cell" id="type3"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="type4_name">Type 4</strong></td>
                            <td class="price-cell" id="type4"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                        <tr>
                            <td><strong id="type5_name">Type 5</strong></td>
                            <td class="price-cell" id="type5"><img src="{{asset('assets/img/pload2.gif')}}" height=25></td>
                        </tr>
                    </tbody> -->
                </table>
            </div>

            
            <div class="action-buttons">
                <button class="btn refresh-btn" onclick="refreshRates()" data-en="🔄 Refresh" data-cn="🔄 刷新" data-bm="🔄 Segar">🔄 Refresh</button>
                <button class="btn share-btn" onclick="sharePage()" data-en="🔗 Share" data-cn="🔗 分享" data-bm="🔗 Kongsi">🔗 Share</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 6868 GOLD. <span data-en="All Rights Reserved." data-cn="版权所有。" data-bm="Hak Cipta Terpelihara.">All Rights Reserved.</span></p>
            <p><span data-en="Professional Gold Buying Service" data-cn="专业黄金收购服务" data-bm="Perkhidmatan Pembelian Emas Profesional">Professional Gold Buying Service</span></p>
        </div>
    </footer>

  <!-- <script src="https://code.jquery.com/jquery-4.0.0.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        function refreshRates() {
            location.reload();
        }

        async function sharePage() {
            const navbar = document.getElementById('share_navbar');
            const table = document.querySelector('.rates-table-container');
            const datetime = document.getElementById('nowdate');

            const wrapper = document.createElement('div');
            wrapper.style.position = 'fixed';
            wrapper.style.top = '-9999px';
            wrapper.style.left = '0';
            wrapper.style.width = navbar.offsetWidth + 'px';
            wrapper.style.background = '#f8f8f8';
            wrapper.style.zIndex = '-1';

            // Clone elements
            const navbarClone = navbar.cloneNode(true);
            const datetimeClone = datetime.cloneNode(true);
            const tableClone = table.cloneNode(true);

            // Fix navbar clone
            navbarClone.style.position = 'relative';
            navbarClone.style.width = '100%';

            // Datetime style
            datetimeClone.style.display = 'block';
            datetimeClone.style.textAlign = 'center';
            datetimeClone.style.fontSize = '1.5rem';
            datetimeClone.style.fontWeight = 'bold';
            datetimeClone.style.color = '#1a1a1a';
            datetimeClone.style.padding = '16px 0 4px';

            // Table spacing
            tableClone.style.margin = '12px auto 20px';

            wrapper.appendChild(navbarClone);
            wrapper.appendChild(datetimeClone);
            wrapper.appendChild(tableClone);
            document.body.appendChild(wrapper);

            try {
                const canvas = await html2canvas(wrapper, {
                    useCORS: true,
                    scale: 2,
                    backgroundColor: "#f8f8f8"
                });

                document.body.removeChild(wrapper);

                const dataUrl = canvas.toDataURL("image/png");

                // Convert dataURL to Blob manually (better for iPhone)
                const blob = await (await fetch(dataUrl)).blob();
                const file = new File([blob], "gold-rates.png", { type: "image/png" });

                // iPhone / Safari share support
                if (navigator.share) {
                    try {
                        if (navigator.canShare && navigator.canShare({ files: [file] })) {
                            await navigator.share({
                                title: '6868 GOLD Rates',
                                text: 'Latest gold price',
                                files: [file]
                            });
                        } else {
                            // Fallback for Safari if file share not supported
                            await navigator.share({
                                title: '6868 GOLD Rates',
                                text: 'Latest gold price'
                            });
                        }
                    } catch (err) {
                        console.log("Share cancelled or failed:", err);
                        downloadImage(dataUrl);
                    }
                } else {
                    downloadImage(dataUrl);
                }

            } catch (err) {
                console.error("Error generating image:", err);
                alert("Unable to share. Please try again.");
                if (document.body.contains(wrapper)) {
                    document.body.removeChild(wrapper);
                }
            }
        }

        function downloadImage(dataUrl) {
            const link = document.createElement('a');
            link.download = 'gold-rates.png';
            link.href = dataUrl;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

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

        let refreshStatus = localStorage.getItem('autoRefresh') ?? "1";

        $.ajax({
            url: "{{ url('getPrices') }}",
            type: "GET",
            data: {
                autoRefresh: refreshStatus
            },
            success: function(response) {

                $.each(response.data, function(type, dd) {

                    let elem = $("#" + type);

                    let oldValue = parseFloat(
                        elem.text().replace("RM ", "")
                    );

                    // OFF WORK
                    if (dd === 'Off Work') {

                        elem.text('Off Work');
                        elem.css("color", "gray");

                    } else {

                        let newValue = parseFloat(dd).toFixed(2);

                        elem.text("RM " + newValue);

                        // ONLY animate color when LIVE mode
                        if (refreshStatus === "1") {

                            if (isNaN(oldValue)) {

                                elem.css("color", "black");

                            } else if (parseFloat(newValue) > oldValue) {

                                elem.css("color", "green");

                            } else if (parseFloat(newValue) < oldValue) {

                                elem.css("color", "red");

                            } else {

                                elem.css("color", "black");
                            }

                        } else {

                            // paused mode = fixed color
                            elem.css("color", "black");
                        }
                    }
                });

                $("#nowdate").text(
                    '- ' + response.now_date + ' ' + response.now_time + ' -'
                );
            }
        });
        }
    window.addEventListener('load', function () {

        let status = localStorage.getItem('autoRefresh');

        if (status === null) {

            localStorage.setItem('autoRefresh', "1");
            status = "1";
        }

        // fetch once immediately
        fetchGoldPrices();

        // start auto refresh only if enabled
        if (status !== "0") {
            startAutoRefresh();
        }
        });

        let autoRefreshInterval = null;

        function startAutoRefresh() {

            // prevent duplicate interval
            if (autoRefreshInterval) {
                clearInterval(autoRefreshInterval);
            }

            autoRefreshInterval = setInterval(() => {

                if (localStorage.getItem('autoRefresh') === "0") {
                    return;
                }

                fetchGoldPrices();

            }, 5000);
        }

        function stopAutoRefresh() {

            if (autoRefreshInterval) {
                clearInterval(autoRefreshInterval);
                autoRefreshInterval = null;
            }
        }
        let count = 5;

        function updateClock() {

            // ALWAYS update datetime
            const now = new Date();

            let hours = String(now.getHours()).padStart(2, '0');
            let minutes = String(now.getMinutes()).padStart(2, '0');
            let seconds = String(now.getSeconds()).padStart(2, '0');

            let timeString = hours + ':' + minutes + ':' + seconds;

            document.getElementById('nowdate').innerHTML =
                "- {{ $now_date ?? '' }} " + timeString + " -";


                let refreshStatus = localStorage.getItem('autoRefresh') ?? "1";

                @if($setting && $setting->value == 1)

                if (refreshStatus === "0") {

                    document.getElementById('now_count_down').innerHTML =
                        "Refresh In <b>" + count + "</b>s";

                } else {

                    document.getElementById('now_count_down').innerHTML =
                        "Refresh In <b>" + count + "</b>s";
                }

                @else

                document.getElementById('now_count_down').innerHTML =
                    "Off Work";

                @endif

            count--;

            if (count === 0) {
                count = 5;
            }
        }   

        // Run every 1 second
        setInterval(updateClock, 1000);

        // Run immediately (no delay on first load)
        updateClock();

    </script>
</body>
</html>