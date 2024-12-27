<?php
// Inclusion de la connexion à la base de données
include('db_connection.php');
include('menu.php');
// Vérification que l'ID de l'étudiant a été passé dans l'URL
if (isset($_GET['id'])) {
    $etablissementId = $_GET['id'];

    try {
        // Requête pour supprimer l'étudiant
        $stmt = $pdo->prepare('DELETE FROM etablissements WHERE id = :id');
        $stmt->execute([':id' => $etablissementId]);

        // Message de succès
        $message = "L'etablissement a été supprimé avec succès.";
        $messageClass = "success-message";
    } catch (PDOException $e) {
        $message = "Erreur lors de la suppression : " . $e->getMessage();
        $messageClass = "error-message";
    }
} else {
    $message = "ID de l'établissement non spécifié.";
    $messageClass = "error-message";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression de l'Établissemnets</title>
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
            text-align: center;
            width: 60%;
        }
        h2 {
            color: #5B2C6F;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .success-message {
            color: green;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .error-message {
            color: red;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Suppression de l'Établissement</h2>

    <?php if (isset($message)): ?>
        <div class="<?= $messageClass ?>">
            <?= $message ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
