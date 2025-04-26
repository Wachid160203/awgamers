<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header("Location: masuk.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AWGame.ID</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            color: #E0E0E0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .dashboard-container {
            background-color: #1E1E1E;
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            text-align: center;
        }

        h2 {
            color: #ff4c29;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1rem;
            margin: 0.5rem;
            transition: background 0.3s;
        }

        .lanjut-btn {
            background-color: #ff4c29;
        }

        .lanjut-btn:hover {
            background-color: #e43a19;
        }

        .logout-btn {
            background-color: #555;
        }

        .logout-btn:hover {
            background-color: #444;
        }

        @media (max-width: 576px) {
            .dashboard-container {
                padding: 1.5rem;
                max-width: 90%;
            }

            h2 {
                font-size: 1.2rem;
            }

            p {
                font-size: 0.9rem;
            }

            .btn {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Halo, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</h2>
        <p>Selamat datang di AWGame.ID</p>
        <a href="index.php" class="btn lanjut-btn">Lanjutkan ke Beranda</a>
        <a href="logout.php" class="btn logout-btn">Logout</a>
    </div>
</body>
</html>