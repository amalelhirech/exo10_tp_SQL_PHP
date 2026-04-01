<?php
session_start();

if(!isset($_SESSION['userId'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>

    <h1>Hello</h1>
    <p>Bienvenue <?php echo $_SESSION['nom']; ?></p>
    <p>Email : <?php echo $_SESSION['email']; ?></p>

    <a href="logout.php">Se déconnecter</a>

</body>
</html>