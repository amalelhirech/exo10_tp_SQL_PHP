
<?php
require_once "Model/pdo.php";
?>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f8;
    margin: 20px;
    color: #333;
}

h2 {
    margin-top: 30px;
    color: #222;
}

form {
    background-color: white;
    padding: 15px;
    margin-top: 10px;
    margin-bottom: 20px;
    border-radius: 8px;
    width: 320px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

label {
    display: block;
    margin-top: 10px;
    margin-bottom: 5px;
    font-weight: bold;
}

input, select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #f67eec;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #f74fe9;
}

ul {
    background-color: white;
    padding: 15px 25px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    list-style-type: none;
}

li {
    margin-bottom: 10px;
}

a {
    margin-left: 10px;
    color: #2d89ef;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

.btn {
    padding: 6px 10px;
    border-radius: 6px;
    margin-left: 8px;
    font-size: 12px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.modifier {
    background-color: #ff66b2; 
    color: white;
}

.modifier:hover {
    background-color: #e0559c;
}

.supprimer {
    background-color: #ff4d4d; 
    color: white;
}


.supprimer:hover {
    background-color: #cc0000;
}

/* Partie de l'exo 10*/

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #111827;
    color: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

th {
    background-color: #1f2937;
    color: #d1d5db;
    text-align: left;
    padding: 16px;
    font-size: 18px;
}

td {
    padding: 16px;
    border-top: 1px solid #374151;
    font-size: 16px;
}

tr:hover {
    background-color: #1f2937;
}

</style>

<?php



$resultat = $dbPDO->prepare("SELECT id_etudiant, nom, prenom FROM etudiant");
$resultat->execute();

$etudiants = $resultat->fetchAll(PDO::FETCH_OBJ);

echo "<br>";

echo "<h2>Liste des etudiants</h2>";
echo "<div class='table-container'>";
echo "<table>";
echo "<tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Actions</th>
      </tr>";

foreach($etudiants as $etudiant) {
    echo "<tr>
            <td>" . $etudiant->id_etudiant . "</td>
            <td>" . $etudiant->nom . "</td>
            <td>" . $etudiant->prenom . "</td>
            <td>TEST</td>
          </tr>";
}

echo "</table>";
echo "</div>";

$res = $dbPDO->prepare("SELECT nom_classe FROM classes"); 
$res->execute();

$classes = $res->fetchAll(PDO::FETCH_OBJ); 

echo "<br> <h2> Liste de toutes les classes: </h2> <ul>";

foreach($classes as $classe) {
    echo "<li>" . $classe->nom_classe . "</li>";
}


echo "</ul>";


$res = $dbPDO->prepare("SELECT nom , prenom FROM prof"); 
$res->execute();

$profs = $res->fetchAll(PDO::FETCH_OBJ); 

echo "<br> <h2> Liste de toutes les profs : </h2> <ul>";

foreach($profs as $prof) {
    echo "<li>" . $prof->nom . " " . $prof->prenom . "</li>";
}


echo "</ul>";


$resultat = $dbPDO->prepare("
    SELECT 
        p.nom AS nom_prof,
        p.prenom AS prenom_prof,
        m.nom_matiere AS nom_matiere,
        c.nom_classe AS nom_classe
    FROM prof p
    INNER JOIN matiere m ON p.id_prof = m.id_prof
    INNER JOIN classes c ON p.id_classe = c.id_classe
");
$resultat->execute();

$profs_infos = $resultat->fetchAll(PDO::FETCH_OBJ);

echo "<br> <h2> Liste des professeurs avec leur matière et leur classe : </h2> <ul>";

foreach($profs_infos as $prof) {
    echo "<li>" 
        . $prof->nom_prof . " " . $prof->prenom_prof
        . " - Matière : " . $prof->nom_matiere
        . " - Classe : " . $prof->nom_classe
        . "</li>";
}

echo "</ul>";

// PARTIE 3 

/* $resultat = $dbPDO->prepare("INSERT INTO matiere(nom_matiere, id_prof) VALUES (:nom_matiere, :id_prof)");
$resultat->execute([
    'nom_matiere' => "Sport",
    'id_prof' => 1
]);

echo "Matiere ajoutee"; */

$res = $dbPDO->prepare("SELECT id_prof, nom, prenom FROM prof");
$res->execute();

$liste_profs = $res->fetchAll(PDO::FETCH_OBJ);

// Formulaire

echo "<br> <h2> Ajouter une matiere :</h2>";

echo "<form action='Views/nouvelle_matiere.php' method='post'>

    <label for='nom_matiere'>Libelle :</label>
    <input name='nom_matiere' id='nom_matiere' type='text'>

    <label for='id_prof'>Prof :</label>
    <select name='id_prof' id='id_prof'>";
    
foreach($liste_profs as $prof) {
    echo "<option value='" . $prof->id_prof . "'>"
        . $prof->nom . " " . $prof->prenom .
        "</option>";
}

echo "</select>

    <button type='submit'>Valider</button>

</form>";

$res = $dbPDO->prepare("SELECT id_classe, nom_classe FROM classes");
$res->execute();

$classes_formulaire = $res->fetchAll(PDO::FETCH_OBJ);

echo "<br> <h2> Ajouter un etudiant : </h2>";

echo "<form action='Views/nouvel_etudiant.php' method='post'>

    <label for='nom'>Nom :</label>
    <input name='nom' id='nom' type='text'>

    <label for='prenom'>Prenom :</label>
    <input name='prenom' id='prenom' type='text'>

    <label for='id_classe'>Classe :</label>
    <select name='id_classe' id='id_classe'>";

foreach($classes_formulaire as $classe) {
    echo "<option value='" . $classe->id_classe . "'>" . $classe->nom_classe . "</option>";
}

echo "</select>

    <button type='submit'>Valider</button>

</form>";



?>




