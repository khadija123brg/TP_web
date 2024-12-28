<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Login</title>
    <!-- Lien CDN pour Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("purple.jpg");
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            align-items: center;
            gap: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            width: 300px;
        }

        .form-container h2 {
            text-align: center;
            color: rebeccapurple;
            margin-bottom: 20px;
            font-family: Georgia, serif;
        }

        .input-group {
            position: relative;
            margin: 10px 0;
        }

        .input-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .input-group input {
            width: 100%;
            padding: 10px 10px 10px 35px; /* Espace pour l'icône */
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 18px;
        }
        .form-container input[type="text"]{
            width: 85%;

        }
        .form-container input[type="password"]{
            width: 85%;

        }
        .form-container input[type="submit"] {
            width: 100%;
            background-color: mediumpurple;
            color: white;
            cursor: pointer;
            border: none;
            font-weight: bold;
            border-radius: 18px;
            padding: 10px;
            font-size: 18px;
        }

        .form-container input[type="submit"]:hover {
            background-color: #DDA0DD;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-top: 10px;
        }

        .options a {
            color: mediumpurple;
            text-decoration: none;
        }

        .options a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        .image-container img {
            width: 200px;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <h2>Login</h2>
        <form method="post" action="">
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Nom d'utilisateur" required />
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Mot de passe" required />
            </div>
            <input type="submit" name="valider" value="Login" />
            <div class="options">
                <label>
                    <input type="checkbox" name="remember"> Se souvenir de moi
                </label>
                <a href="#">Mot de passe oublié ?</a>
            </div>
        </form>

        <?php
        session_start();
        @$user = $_POST["username"];
        @$pass = $_POST["password"];
        @$valider = $_POST["valider"];


        $bonuser = "khadija";
        $bonpass = "123khadija";
        $erreur = "Le nom d'utilisateur ou le mot de passe est incorrect";


        if (isset($valider)) {
            if ($user == $bonuser && $pass == $bonpass) {
                $_SESSION["autoriser"] = "oui";
                header("Location: pag1.php");
                exit();
            } else {
                echo "<div class='error-message'>$erreur</div>";
            }
        }
        ?>
    </div>

    <div class="image-container">
        <img src="C.PNG" alt="Image">
    </div>

</div>
</body>
</html>


