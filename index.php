<?php
session_start();
$username = isset($_SESSION['user']['username']) ? htmlspecialchars($_SESSION['user']['username']) : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AWGame.ID - Top Up Game Favoritmu</title>
    <link rel="icon" href="https://i.imgur.com/iH6P60y.png" type="image/png">
    <meta name="description" content="Top up game favoritmu di AWGame.ID dengan harga terbaik! Diamond, UC, pulsa, dan lainnya.">
    <meta name="keywords" content="top up game, diamond, UC, Free Fire, Mobile Legends, PUBG Mobile, pulsa, kuota">
    <meta name="author" content="AWGame.ID">
    <meta property="og:title" content="AWGame.ID - Top Up Murah">
    <meta property="og:description" content="Nikmati top up game, pulsa, dan e-wallet dengan harga terjangkau di AWGame.ID!">
    <meta property="og:image" content="https://i.imgur.com/h2ESRb7.png">
    <meta property="og:url" content="https://www.awgame.id">
    <meta property="og:type" content="website">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #121212;
            color: #E0E0E0;
            overflow-x: hidden;
        }

        header {
            background: #1E1E1E;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ff9f43, #ee5253);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }

        nav a:hover {
            color: #ffeb3b;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 4px;
            cursor: pointer;
        }

        .hamburger div {
            width: 20px;
            height: 3px;
            background: #fff;
        }

        .mobile-menu {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 60px;
            right: 10px;
            background: #1E1E1E;
            border-radius: 8px;
            padding: 0.5rem;
            box-shadow: 0 5px 10px rgba(0,0,0,0.2);
        }

        .mobile-menu.show {
            display: flex;
        }

        .mobile-menu a {
            padding: 0.5rem;
            color: #fff;
            text-align: center;
            font-size: 0.9rem;
        }

        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://i.ytimg.com/vi/NDLfLMGcXck/maxresdefault.jpg') center/cover no-repeat;
            color: #E0E0E0;
            padding: 4rem 1.5rem;
            text-align: center;
        }

        .hero h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
        }

        .hero p {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .hero button {
            padding: 0.8rem 1.8rem;
            font-size: 1rem;
            font-weight: 600;
            background: #ff4c29;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .hero button:hover {
            background: #e43a19;
        }

        .games-section {
            padding: 3rem 1.5rem;
            text-align: center;
        }

        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
            max-width: 1000px;
            margin: 1.5rem auto;
        }

        .game-card {
            background: #1E1E1E;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            transition: transform 0.3s;
        }

        .game-card:hover {
            transform: translateY(-5px);
        }

        .game-card img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin: 10px auto;
        }

        .game-card h3 {
            color: #E0E0E0;
            font-size: 0.9rem;
            padding-bottom: 10px;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .popup-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .popup-content {
            background: #1E1E1E;
            padding: 1.5rem;
            border-radius: 10px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            color: #E0E0E0;
        }

        .popup-content h3 {
            color: #ff4c29;
            margin-bottom: 0.8rem;
        }

        .popup-content button {
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background: #ff4c29;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-content button:hover {
            background: #e43a19;
        }

        footer {
            background: #1E1E1E;
            color: #E0E0E0;
            text-align: center;
            padding: 1.5rem;
            font-size: 0.8rem;
        }

        @media (max-width: 768px) {
            header {
                flex-wrap: wrap;
            }

            nav {
                display: none;
            }

            .hamburger {
                display: flex;
            }

            .hero h2 {
                font-size: 1.8rem;
            }

            .games-grid {
                grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            }

            .game-card img {
                width: 60px;
                height: 60px;
            }
        }

        @media (max-width: 576px) {
            header h1 {
                font-size: 1.5rem;
            }

            .hero {
                padding: 2rem 1rem;
            }

            .hero h2 {
                font-size: 1.5rem;
            }

            .hero p {
                font-size: 0.9rem;
            }

            .hero button {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }

            .games-grid {
                grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
            }

            .game-card img {
                width: 50px;
                height: 50px;
            }

            .game-card h3 {
                font-size: 0.8rem;
            }

            .popup-content {
                padding: 1rem;
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="popup-overlay" id="promoPopup">
        <div class="popup-content">
            <h3>Promo Spesial!</h3>
            <p>Gunakan kode <strong>AHMADWAHID16</strong> untuk diskon 10%!</p>
            <p>Berlaku sampai 31 Des 2025</p>
            <button onclick="closePopup()">OK</button>
        </div>
    </div>

    <header>
        <h1>AWGame.ID</h1>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="#">Layanan</a>
            <a href="#">Kontak</a>
            <?php if ($username): ?>
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="masuk.php">Login</a>
            <?php endif; ?>
        </nav>
        <div class="hamburger" onclick="toggleMobileMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="mobile-menu" id="mobileMenu">
            <a href="index.php">Beranda</a>
            <a href="#">Layanan</a>
            <a href="#">Kontak</a>
            <?php if ($username): ?>
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="masuk.php">Login</a>
            <?php endif; ?>
        </div>
    </header>

    <section class="hero">
        <h2>Top Up Game & Pulsa</h2>
        <p>Harga murah, proses cepat, aman terpercaya!</p>
        <button onclick="scrollToGames()">Top Up Sekarang</button>
    </section>

    <section class="games-section" id="games">
        <h2>Game & Layanan Populer</h2>
        <div class="games-grid">
            <div class="game-card">
                <a href="mlbb.html?game=mobile-legends">
                    <img src="https://play-lh.googleusercontent.com/eOSTyn3tnJrezNp0pBV-grARGI8xWM0ylM0fZYoV-ZFaY52wCjyRwn0uIsWrAhQjzg" alt="Mobile Legends">
                    <h3>Mobile Legends</h3>
                </a>
            </div>
            <div class="game-card">
                <a href="ff.html?game=free-fire">
                    <img src="https://play-lh.googleusercontent.com/6llpraFcTI0rEUuRpWEG9NWWblvm106y5JXcDzu60ACuaUYDD3i70a-p9_QM65NsGDE" alt="Free Fire">
                    <h3>Free Fire</h3>
                </a>
            </div>
            <div class="game-card">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/4/44/PlayerUnknown%27s_Battlegrounds_Mobile.webp/180px-PlayerUnknown%27s_Battlegrounds_Mobile.webp.png" alt="PUBG Mobile">
                <h3>PUBG Mobile</h3>
            </div>
            <div class="game-card">
                <img src="https://play-lh.googleusercontent.com/sRJhsE2C6Qozm3kqix33FY9yTD_8_glD9irSShDzdYVxyn6yqjT9byMe-2THqw5OKn5n" alt="Genshin Impact">
                <h3>Genshin Impact</h3>
            </div>
            <div class="game-card">
                <img src="https://images.bisnis.com/posts/2023/07/27/1678739/dompet_digital_e-wallet_terpopuler_1690430538.jpg" alt="E-Wallet">
                <h3>E-Wallet</h3>
            </div>
            <div class="game-card">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgFLfoAIWNWT5OHmYied-XvYC1rBnVDtVD88mBMjMxzDQFCjMmLp_lOQ_Bhz0JjrfPLQOlslw_7_mWHNzrMnbZfd8h2rohGkwGK3inlm3BjIRXHJoB-AenycVS7LyDxH0vtXTc0JfuWhiNs/s1000/beli+pulsa.jpg" alt="Pulsa & Kuota">
                <h3>Pulsa & Kuota</h3>
            </div>
        </div>
    </section>

    <footer>
        © 2025 AWGame.ID - Dibuat dengan ❤️ oleh Wahid
    </footer>

    <script>
        function toggleMobileMenu() {
            document.getElementById('mobileMenu').classList.toggle('show');
        }

        function scrollToGames() {
            document.getElementById('games').scrollIntoView({ behavior: 'smooth' });
        }

        window.onload = () => {
            setTimeout(() => {
                document.getElementById('promoPopup').classList.add('active');
            }, 1000);
        };

        function closePopup() {
            document.getElementById('promoPopup').classList.remove('active');
        }
    </script>
</body>
</html>