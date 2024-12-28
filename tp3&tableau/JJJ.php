<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulation du Tableau</title>
    <style>
        body {
            font-family:  Comic Sans MS, Comic Sans, cursive;
            background-color: antiquewhite;
            margin: 0;
            padding: 20px;
            color: #A52A2A;
            background-image: url('rose.avif');
            background-size: 80%;
        }

        h1 {
            color: #b57170;
            text-align: center;
        }
        h3 {
            color: #2E8B57;
            text-align: left;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #FAEBD7;
            padding: 20px;
            border-radius: 8px;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black ;
            color : black;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: rosybrown;
        }
        p {
            color:black;
        }
        .q1{
            color:snow;
        }
        .highlight {
            font-weight: bold;
            color: #A52A2A;
        }
        td:nth-child(2):hover, th:nth-child(2):hover {
            background-color: rosybrown ; /* Couleur quand on survole la colonne "Âge" */
        }
        td:nth-child(1):hover, th:nth-child(1):hover {
            background-color: rosybrown; /* Couleur quand on survole la colonne "Nom" */
        }
    </style>
</head>
<body>

<h1>Manipulation de Tableau en PHP</h1>

<div class="container">
    <?php
    $tab = array("karim", "maroua", "aya", "mohammed", "fatima");

    echo '<div class="q1"><h3>Tableau initial :</h3></div>';
    echo "<table>";
    echo "<tr><th>Index</th><th>Valeur</th></tr>";
    foreach ($tab as $index => $value) {
        echo "<tr><td>$index</td><td>$value</td></tr>";
    }
    echo "</table>";

    // Ajouter un élément
    array_push($tab, "salim");
    echo "<h3>Après ajout de 'salim' :</h3>";
    echo "<table>";
    echo "<tr><th>Index</th><th>Valeur</th></tr>";
    foreach ($tab as $index => $value) {
        echo "<tr><td>$index</td><td>$value</td></tr>";
    }
    echo "</table>";

    // Supprimer le premier élément
    array_shift($tab);
    echo "<h3>Après suppression du premier élément :</h3>";
    echo "<table>";
    echo "<tr><th>Index</th><th>Valeur</th></tr>";
    foreach ($tab as $index => $value) {
        echo "<tr><td>$index</td><td>$value</td></tr>";
    }
    echo "</table>";

    // Vérifier si "mohammed" est dans le tableau
    echo "<h3>Vérification :</h3>";
    if (in_array("mohammed", $tab)) {
        echo "<p class='highlight'>mohammed est dans le tableau.</p>";
    } else {
        echo "<p class='highlight'>mohammed n'est pas dans le tableau.</p>";
    }

    // Modifier un élément
    foreach ($tab as $key => $value) {
        if ($value === "salim") {
            $tab[$key] = "daniel";
        }
    }
    echo "<h3>Après modification de 'salim' à 'daniel' :</h3>";
    echo "<table>";
    echo "<tr><th>Index</th><th>Valeur</th></tr>";
    foreach ($tab as $index => $value) {
        echo "<tr><td>$index</td><td>$value</td></tr>";
    }
    echo "</table>";

    // Trier le tableau
    sort($tab);
    echo "<h3>Après tri par ordre alphabétique :</h3>";
    echo "<table>";
    echo "<tr><th>Index</th><th>Valeur</th></tr>";
    foreach ($tab as $index => $value) {
        echo "<tr><td>$index</td><td>$value</td></tr>";
    }
    echo "</table>";

    // Inverser le tableau
    $tab_inverses = array_reverse($tab);
    echo "<h3>Tableau inversé :</h3>";
    echo "<table>";
    echo "<tr><th>Index</th><th>Valeur</th></tr>";
    foreach ($tab_inverses as $index => $value) {
        echo "<tr><td>$index</td><td>$value</td></tr>";
    }
    echo "</table>";

    // Afficher le nombre d'éléments
    echo "<h3>Nombre d'éléments :</h3>";
    echo "<p>Il y a " . count($tab) . " éléments dans le tableau.</p>";

    // Tableau associatif des étudiants et âges
    $tab1 = array("karim" => 22, "maroua" => 24, "aya" => 19, "mohammed" => 27, "fatima" => 23, "salim" => 20, "daniel" => 21);
    echo "<h3>Liste des étudiants et âges :</h3>";
    echo "<table>";
    echo "<tr><th>Nom</th><th>Âge</th></tr>";
    foreach ($tab1 as $nom => $age) {
        echo "<tr><td>$nom</td><td>$age</td></tr>";
    }
    echo "</table>";
    ?>
</div>

</body>
</html>
