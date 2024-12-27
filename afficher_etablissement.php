<?php
include('db_connection.php'); // Connexion à la base de données
include('menu.php'); // Inclure le menu

try {
    // Requête pour récupérer tous les établissements
    $stmt = $pdo->prepare("SELECT * FROM etablissements");
    $stmt->execute();
    $etablissements = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Établissements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6C3483, #FFFFFF, #5499C7);
            height: 100vh;
            padding: 20px;
            color: #fff;
            display: flex;
            align-items: center; /* Centrer le contenu verticalement à l'intérieur de la div */
            justify-content: center;
        }
        .container {

            margin: auto;
            padding: 10px;
            background: white;
            color: black;
            border-radius: 10px;
            width: 80%;

        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background: #6C3483;
            color: white;
        }
        .modify-link, .delete-link {
            color: #5B2C6F;
            text-decoration: none;
            font-weight: bold;
        }
        .modify-link:hover, .delete-link:hover {
            color: #8E44AD;
        }
        .icon {
            margin-left: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Liste des Établissements</h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Modifier</th>
            <th>Supprimer</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($etablissements as $etablissement): ?>
            <tr>
                <td><?= htmlspecialchars($etablissement['id']) ?></td>
                <td><?= htmlspecialchars($etablissement['nom']) ?></td>
                <td><?= htmlspecialchars($etablissement['email']) ?></td>
                <td>
                    <a class="modify-link" href="modifier_etablissement.php?id=<?= htmlspecialchars($etablissement['id']) ?>">
                        <i class="fas fa-edit icon"></i>
                    </a>
                </td>
                <td>
                    <a class="delete-link" href="supprimer_etablissement.php?id=<?= htmlspecialchars($etablissement['id']) ?>"><i class="fas fa-trash-alt icon"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
