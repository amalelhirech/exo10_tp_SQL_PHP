<?php
require_once "../Model/pdo.php";

if(!isset($_GET['id'])) {
    echo "Aucun id recu";
    exit();
}

$id = $_GET['id'];

$resultat = $dbPDO->prepare("
    SELECT id_etudiant
    FROM etudiant
    WHERE id_etudiant = :id
");

$resultat->execute([
    'id' => $id
]);

$etudiant = $resultat->fetch(PDO::FETCH_OBJ);

if($etudiant) {

    $resultat = $dbPDO->prepare("
        DELETE FROM etudiant
        WHERE id_etudiant = :id
    ");

    $resultat->execute([
        'id' => $id
    ]);

    header("Location: ../index.php");
    exit();

} else {
    echo "Etudiant introuvable<br>";
    echo "<a href='../index.php'>Retour</a>";
}
?>