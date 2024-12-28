<?php
// Inclusion du fichier de connexion à la base de données
include('db_connection.php');
include('menu.php');

$message = '';  // Initialisation de la variable pour le message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomEtablissement = $_POST['nom_etablissement'];
    $emailEtablissement = $_POST['email_etablissement'];

    try {
        // Insertion des données dans la table etablissements
        $stmt = $pdo->prepare('INSERT INTO etablissements (nom, email) VALUES (:nom, :email)');
        $stmt->execute([
            ':nom' => $nomEtablissement,
            ':email' => $emailEtablissement
        ]);

        $message = "<div class='message'>L'établissement a été ajouté avec succès !</div>";
    } catch (PDOException $e) {
        $message = "<div class='error-message'>Erreur : " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un établissement</title>
    <style>
        /* Ajoutez ici vos styles CSS personnalisés pour cette page */
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
        input {
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
        input:focus {
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
    <h2>Ajouter un établissement</h2>
    <form method="POST" action="">
        <div>
            <input type="text" name="nom_etablissement" placeholder="Nom de l'établissement" required>
        </div>
        <div>
            <input type="email" name="email_etablissement" placeholder="Email de l'établissement" required>
        </div>
        <div>
            <input type="submit" value="Ajouter établissement">
        </div>
    </form>

    <!-- Affichage du message sous le formulaire -->
    <?php if (!empty($message)) echo $message; ?>
</div>
</body>
</html>
