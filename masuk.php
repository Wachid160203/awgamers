<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - AWGame.ID</title>
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

        .login-container {
            background-color: #1E1E1E;
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .login-container h2 {
            text-align: center;
            color: #ff4c29;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .input-field {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            background-color: #2c313a;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
        }

        .input-field:focus {
            outline: 2px solid #ff4c29;
        }

        .btn-submit {
            width: 100%;
            padding: 0.75rem;
            background-color: #ff4c29;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background-color: #e43a19;
        }

        .register-link {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.95rem;
        }

        .register-link a {
            color: #ff4c29;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #ff4c29;
            text-align: center;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 1.5rem;
                max-width: 90%;
            }

            .login-container h2 {
                font-size: 1.2rem;
            }

            .input-field {
                padding: 0.6rem;
                font-size: 0.9rem;
            }

            .btn-submit {
                padding: 0.6rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Masuk ke AWGame.ID</h2>
        <?php
        session_start();
        if (isset($_SESSION['login_error'])) {
            echo '<p class="error-message">' . htmlspecialchars($_SESSION['login_error']) . '</p>';
            unset($_SESSION['login_error']);
        }
        ?>
        <form action="proses_login.php" method="POST">
            <input type="email" name="email" class="input-field" placeholder="Email" required>
            <input type="password" name="password" class="input-field" placeholder="Password" required>
            <button type="submit" class="btn-submit">Masuk</button>
        </form>
        <div class="register-link">
            <p>Belum punya akun? <a href="daftar.html">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>