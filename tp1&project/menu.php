

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Student and Etablissement Management</title>
    <style>
        /* Common styles for the whole site */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #5B2C6F;
            padding: 10px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .navbar .menu {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar .menu button {
            padding: 15px 25px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            background-color: #5B2C6F;
            color: white;
            margin: 0 10px;
        }

        .navbar .menu button:hover {
            background-color: rebeccapurple;
        }

        .container {
            max-width: 800px;
            margin: 80px auto 20px; /* Adjusted margin to account for fixed navbar */
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }


    </style>
</head>
<body>
<!-- Navbar with Menu -->
<div class="navbar">
    <div class="menu">
        <button onclick="window.location.href='ajouter_etudiants.php'">Ajouter étudiant</button>
        <button onclick="window.location.href='ajouter_etablissement.php'">Ajouter établissement</button>
        <button onclick="window.location.href='afficher_etudiant.php'">Afficher étudiants</button>
        <button onclick="window.location.href='afficher_etablissement.php'">Afficher établissements</button>

    </div>
</div>




</body>
</html>