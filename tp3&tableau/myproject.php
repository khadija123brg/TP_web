<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulation du Tableau</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: antiquewhite;
            margin: 0;
            padding: 20px;
            color: #A52A2A;
        }


        h1 {
            color: rosybrown;
            text-align: center;

        }


        h3 {
            color: black;
            text-align: left;
            background-color: #FFB6C1;
            padding: 8px;
            font-size: 1em;
            border-radius: 8px;
            width: 80%;
            margin: 10px 0;
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
            margin: 20px 0;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 10px;
            overflow: hidden;
        }

        table, th, td {
            border: 1px solid rosybrown;
            color: black;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: rosybrown;
            color: black;
        }


        .q1 {
            background-color: #FFB6C1;
            font-weight: bold;
            color: white;
            padding: 5px;
            border: 1px solid black;
            border-radius: 8px;
            margin: 5px 0;
        }


        .highlight {
            font-weight: bold;
            color: #A52A2A;
        }


        table tr:hover td {
            background-color: #FFB6C1;
            color: white;
            font-weight: bold;
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
    echo '<div class="q1"><h3>Après ajout de "salim" :</h3></div>';
    echo "<table>";
    echo "<tr><th>Index</th><th>Valeur</th></tr>";
    foreach ($tab as $index => $value) {
        echo "<tr><td>$index</td><td>$value</td></tr>";
    }
    echo "</table>";

    // Supprimer le premier élément
    array_shift($tab);
    echo '<div class="q1"><h3>Après suppression du premier élément :</h3></div>';
    echo "<table>";
    echo "<tr><th>Index</th><th>Valeur</th></tr>";
    foreach ($tab as $index => $value) {
        echo "<tr><td>$index</td><td>$value</td></tr>";
    }
    echo "</table>";

    // Vérifier si "mohammed" est dans le tableau
    echo '<div class="q1"><h3>Vérification :</h3></div>';
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
    echo '<div class="q1"><h3>Après modification de "salim" à "daniel" :</h3></div>';
    echo "<table>";
    echo "<tr><th>Index</th><th>Valeur</th></tr>";
    foreach ($tab as $index => $value) {
        echo "<tr><td>$index</td><td>$value</td></tr>";
    }
    echo "</table>";

    // Trier le tableau
    sort($tab);
    echo '<div class="q1"><h3>Après tri par ordre alphabétique :</h3></div>';
    echo "<table>";
    echo "<tr><th>Index</th><th>Valeur</th></tr>";
    foreach ($tab as $index => $value) {
        echo "<tr><td>$index</td><td>$value</td></tr>";
    }
    echo "</table>";

    // Inverser le tableau
    $tab_inverses = array_reverse($tab);
    echo '<div class="q1"><h3>Tableau inversé :</h3></div>';
    echo "<table>";
    echo "<tr><th>Index</th><th>Valeur</th></tr>";
    foreach ($tab_inverses as $index => $value) {
        echo "<tr><td>$index</td><td>$value</td></tr>";
    }
    echo "</table>";

    // Afficher le nombre d'éléments
    echo '<div class="q1"><h3>Nombre d\'éléments :</h3></div>';
    echo "<p>Il y a " . count($tab) . " éléments dans le tableau.</p>";

    // Tableau associatif des étudiants et âges
    $tab1 = array("karim" => 22, "maroua" => 24, "aya" => 19, "mohammed" => 27, "fatima" => 23, "salim" => 20, "daniel" => 21);
    echo '<div class="q1"><h3>Liste des étudiants et âges :</h3></div>';
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
