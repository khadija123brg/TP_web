<?php
include('db_connection.php'); // Connexion à la base de données
include('menu.php'); // Inclure le menu

// Vérifier si l'ID de l'établissement est passé en paramètre
if (!isset($_GET['id'])) {
    echo "ID d'établissement manquant.";
    exit();
}

$id = $_GET['id'];

try {
    // Récupérer les données de l'établissement
    $stmt = $pdo->prepare("SELECT * FROM etablissements WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $etablissement = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$etablissement) {
        echo "Établissement introuvable.";
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
}

// Gérer la soumission du formulaire
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    try {
        // Mettre à jour l'établissement
        $updateStmt = $pdo->prepare("UPDATE etablissements SET nom = :nom, email = :email WHERE id = :id");
        $updateStmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':id' => $id
        ]);

        $message = "Les informations de l'établissement ont été mises à jour avec succès.";
    } catch (PDOException $e) {
        $message = "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Établissement</title>
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
            background: white;
            padding: 20px;
            border-radius: 10px;
            color: black;
            width: 50%;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background: #6C3483;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #5B2C6F;
        }
        .message {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            color: black;
        }
        .success {
            background-color: white;
        }
        .error {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Modifier l'Établissement</h2>
    <form method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($etablissement['nom']) ?>" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($etablissement['email']) ?>" required>

        <button type="submit">Mettre à jour</button>
    </form>

    <?php if (!empty($message)): ?>
        <div class="message <?= strpos($message, 'succès') !== false ? 'success' : 'error' ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
