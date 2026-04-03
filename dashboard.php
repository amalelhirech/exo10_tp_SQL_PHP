<?php
session_start();


if(!isset($_SESSION['userId'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; padding: 50px; text-align: center; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); display: inline-block; }
        a { color: #3b82f6; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['nom']); ?> !</h1>
        <p>Email : <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <hr>
        <p><a href="index.php">Accéder à la gestion des étudiants</a></p>
        <p><a href="logout.php" style="color:red;">Se déconnecter</a></p>
    </div>
</body>
</html>