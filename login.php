<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <style>
        body {
            background-color: #030712;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 80px auto;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 40px;
        }

        label {
            display: block;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .champ {
            margin-bottom: 35px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 22px;
            font-size: 18px;
            color: white;
            background-color: #1f2937;
            border: 1px solid #374151;
            border-radius: 20px;
            box-sizing: border-box;
        }

        input::placeholder {
            color: #9ca3af;
        }

        .checkbox-zone {
            margin-bottom: 35px;
            font-size: 18px;
        }

        .checkbox-zone input {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .checkbox-zone a {
            color: #3b82f6;
            text-decoration: none;
        }

        .checkbox-zone a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 18px;
            padding: 18px 34px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #2563eb;
        }

        .lien-register {
            margin-top: 30px;
            font-size: 18px;
        }

        .lien-register a {
            color: #3b82f6;
            text-decoration: none;
        }

        .lien-register a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Connexion</h1>

        <form action="submit_login.php" method="POST">
            <div class="champ">
                <label for="email">Your email</label>
                <input type="email" name="email" id="email" placeholder="name@flowbite.com" required>
            </div>

            <div class="champ">
                <label for="password">Your password</label>
                <input type="password" name="password" id="password" placeholder="********" required>
            </div>

            <div class="checkbox-zone">
                <input type="checkbox" id="conditions">
                <label for="conditions" style="display:inline; font-weight:normal;">
                    I agree with the <a href="#">terms and conditions</a>.
                </label>
            </div>

            <button type="submit">Submit</button>
        </form>

        <p class="lien-register">
            Pas encore de compte ?
            <a href="register.php">Créer un compte</a>
        </p>
    </div>

</body>
</html>