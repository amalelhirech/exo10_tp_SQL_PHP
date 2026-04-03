<?php
require_once "Model/pdo.php"; 

if(
    isset($_POST['nom']) && !empty($_POST['nom']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['password']) && !empty($_POST['password'])
){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']); 

    try {
        $resultat = $dbPDO->prepare("INSERT INTO users (nom, email, mot_de_passe, role) VALUES (:nom, :email, :mdp, :role)");

        $resultat->execute([
            'nom' => $nom,
            'email' => $email,
            'mdp' => $password,
            'role' => 'user' 
]);

        header("Location: login.php?success=1");
        exit();
        
    } catch(PDOException $e) {

        echo "Erreur lors de la création du compte : " . $e->getMessage();
    }

} else {

    echo "Tous les champs sont obligatoires. <br><a href='register.php'>Retour</a>";
}
?>