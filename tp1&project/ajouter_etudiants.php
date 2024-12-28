<?php
// Inclusion du fichier de connexion à la base de données

include('db_connection.php');
include('menu.php');

$message = '';  // Variable pour stocker le message de succès ou d'erreur

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nomEtudiant = $_POST['nom_etudiant'];
    $prenomEtudiant = $_POST['prenom_etudiant'];
    $emailEtudiant = $_POST['email_etudiant'];
    $etablissementId = $_POST['etablissement'];

    try {
        // Insertion de l'étudiant dans la table 'etudiants'
        $stmt = $pdo->prepare('INSERT INTO etudiants (nom, prenom, email, etablissement_id) VALUES (:nom, :prenom, :email, :etablissement_id)');
        $stmt->execute([
            ':nom' => $nomEtudiant,
            ':prenom' => $prenomEtudiant,
            ':email' => $emailEtudiant,
            ':etablissement_id' => $etablissementId
        ]);

        $message = "<div class='message'>L'étudiant a été ajouté avec succès !</div>";
    } catch (PDOException $e) {
        $message = "<div class='error-message'>Erreur : " . $e->getMessage() . "</div>";
    }
}

// Récupération de la liste des établissements
$stmtEtablissements = $pdo->query("SELECT id, nom FROM etablissements");
$etablissements = $stmtEtablissements->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
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
            width: 100%;
            max-width: 500px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            margin-bottom: 30px;
            color: #5B2C6F;
            font-size: 30px;
            font-weight: bold;
        }
        input, select {
            border-radius: 10px;
            height: 50px;
            width: 100%;
            margin-top: 15px;
            padding: 0 15px;
            font-size: 18px;
            border: 1px solid #ddd;
            font-family: "Times New Roman";
            outline: none;
            transition: all 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #0056B3;
            box-shadow: 0 0 10px rgba(0, 86, 179, 0.5);
        }
        input[type="submit"] {
            background-color: #5B2C6F;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #8E44AD;
        }
        .message, .error-message {
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
        }
        .message {
            color: black;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Ajouter un étudiant</h2>
    <form method="POST" action="">
        <div>
            <input type="text" name="nom_etudiant" placeholder="Nom de l'étudiant" required>
        </div>
        <div>
            <input type="text" name="prenom_etudiant" placeholder="Prénom de l'étudiant" required>
        </div>
        <div>
            <input type="email" name="email_etudiant" placeholder="Email de l'étudiant" required>
        </div>
        <div>
            <select name="etablissement" required>
                <option value="">Sélectionner un établissement</option>
                <?php foreach ($etablissements as $etablissement): ?>
                    <option value="<?= $etablissement['id'] ?>"><?= $etablissement['nom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Ajouter étudiant">
        </div>
    </form>


    <?php if (!empty($message)) echo $message; ?>
</div>
</body>
</html>

