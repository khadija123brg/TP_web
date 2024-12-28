<?php
// Connexion à la base de données
include('db_connection.php');
include('menu.php');

// Récupérer l'ID de l'étudiant à modifier
$etudiantId = $_GET['id']; // Assurez-vous que l'ID de l'étudiant est passé dans l'URL

// Récupérer les données de l'étudiant
$query = $pdo->prepare('SELECT * FROM etudiants WHERE id = :id');
$query->execute([':id' => $etudiantId]);
$etudiant = $query->fetch();

// Récupérer tous les établissements pour la liste déroulante
$queryEtablissements = $pdo->query('SELECT * FROM etablissements');
$etablissements = $queryEtablissements->fetchAll();

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $etablissementId = $_POST['etablissement'];

    try {
        // Mise à jour des informations de l'étudiant
        $stmt = $pdo->prepare('UPDATE etudiants SET nom = :nom, prenom = :prenom, email = :email, etablissement_id = :etablissement WHERE id = :id');
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':etablissement' => $etablissementId,
            ':id' => $etudiantId
        ]);

        $message = "L'étudiant a été mis à jour avec succès !";
    } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Étudiant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6C3483, #FFFFFF, #5499C7);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }
        .container {
            align-items: center;
            justify-content: center;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            width: 30%;
            height: auto;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
        }
        h2 {
            margin-bottom: 10px;
            color: black;
            font-size: 20px;
            font-weight: bold;
        }
        input, select { /* Appliquer les mêmes styles aux <input> et <select> */
            border-radius: 10px;
            height: 50px;
            width: 90%;
            margin-top: 15px;
            padding: 0 10px;
            font-size: 18px;
            border: 1px solid #ddd;
            font-family: "Times New Roman";
            outline: none;
            transition: all 0.3s ease;
        }
        input:focus, select:focus {  /* Styles au focus pour <input> et <select> */
            border-color: #0056B3;
            box-shadow: 0 0 10px rgba(0, 86, 179, 0.5);
        }
        input[type="submit"] {
            background-color: #5B2C6F;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #8E44AD;
        }
        .message {
            margin-top: 20px;
            color: black;
            font-weight: bold;
            text-align: center;
        }
        .error-message {
            margin-top: 20px;
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Modifier l'Étudiant</h2>
    <form method="POST" action="">
        <div>
            <input type="text" name="nom" value="<?= htmlspecialchars($etudiant['nom']) ?>" placeholder="Nom" required>
        </div>
        <div>
            <input type="text" name="prenom" value="<?= htmlspecialchars($etudiant['prenom']) ?>" placeholder="Prénom" required>
        </div>
        <div>
            <input type="email" name="email" value="<?= htmlspecialchars($etudiant['email']) ?>" placeholder="Email" required>
        </div>
        <div>
            <select name="etablissement" required>
                <option value="">Sélectionnez un établissement</option>
                <?php foreach ($etablissements as $etablissement): ?>
                    <option value="<?= $etablissement['id'] ?>" <?= $etudiant['etablissement_id'] == $etablissement['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($etablissement['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Mettre à jour">
        </div>
    </form>
    <?php if (!empty($message)): ?>
        <div class="<?= strpos($message, 'Erreur') === false ? 'message' : 'error-message' ?>">
            <?= $message ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
