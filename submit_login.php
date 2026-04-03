<?php
session_start();
require_once "Model/pdo.php";

$post = $_POST;

if(
    isset($post['email']) && !empty($post['email']) &&
    isset($post['password']) && !empty($post['password'])
){
    $resultat = $dbPDO->prepare("SELECT * FROM users WHERE email = :email");
    $resultat->execute([
        'email' => $post['email']
    ]);

    $rows = $resultat->rowCount();

    if($rows > 0){
        $user = $resultat->fetch();

        if($user['mot_de_passe'] === sha1($post['password'])){

            $_SESSION['userId'] = $user['id_user'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nom'] = $user['nom'];

            header("Location: index.php");
            exit();

        } else {
            echo "Mot de passe incorrect";
        }

    } else {
        echo "Aucun user trouvé";
    }

} else {
    echo "Champs manquants";
}
?>