<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Étudiants</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6C3483 , #FFFFFF,  #5499C7);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }
        .container {
            background: white;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
        }
        h2 {
            margin-bottom: 30px;
            color: #5B2C6F;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #5B2C6F;
            color: white;
        }
        td {
            background-color: #F5F5F5;
            color: #5B2C6F;
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
    <h2>Liste des Étudiants</h2>

    <?php
    include('db_connection.php');
    include('menu.php');

    $stmt = $pdo->query('
        SELECT etudiants.id, etudiants.nom, etudiants.prenom, etudiants.email, etablissements.nom AS etablissement
        FROM etudiants
        LEFT JOIN etablissements ON etudiants.etablissement_id = etablissements.id
    ');
    $etudiants = $stmt->fetchAll();

    if (empty($etudiants)) {
        echo '<div class="error-message">Aucun étudiant trouvé.</div>';
    } else {
        echo '<table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Établissement</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($etudiants as $etudiant) {
            echo '<tr>
                    <td>' . htmlspecialchars($etudiant['id']) . '</td>
                    <td>' . htmlspecialchars($etudiant['nom']) . '</td>
                    <td>' . htmlspecialchars($etudiant['prenom']) . '</td>
                    <td>' . htmlspecialchars($etudiant['email']) . '</td>
                    <td>' . htmlspecialchars($etudiant['etablissement']) . '</td>
                    <td>
                        <a href="modifier_etudiant.php?id=' . htmlspecialchars($etudiant['id']) . '" class="modify-link">
                            <i class="fas fa-edit icon"></i>
                        </a>
                    </td>
                    <td>
                        <a href="supprimer_etudiant.php?id=' . htmlspecialchars($etudiant['id']) . '" class="delete-link">
                            <i class="fas fa-trash-alt icon"></i>
                        </a>
                    </td>
                  </tr>';
        }

        echo '</tbody>
              </table>';
    }
    ?>
</div>
</body>
</html>
