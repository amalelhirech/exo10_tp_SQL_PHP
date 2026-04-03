<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen">
        <div class="w-full bg-gray-800 rounded-lg shadow md:mt-0 sm:max-w-md p-8">
            <h1 class="text-2xl font-bold mb-6">Créer un compte</h1>
            
            <form action="submit_register.php" method="POST" class="space-y-4">
                <div>
                    <label class="block mb-2 text-sm font-medium">Nom complet</label>
                    <input type="text" name="nom" class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium">Email</label>
                    <input type="email" name="email" class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium">Mot de passe</label>
                    <input type="password" name="password" class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
                </div>
                <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg px-5 py-2.5">S'inscrire</button>
            </form>
            <p class="mt-4 text-sm text-gray-400">Déjà un compte ? <a href="login.php" class="text-blue-500">Se connecter</a></p>
        </div>
    </div>
</body>
</html>