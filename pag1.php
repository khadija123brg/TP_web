<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6C3483, #FFFFFF, #5499C7);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .division {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #C39BD3;
            border-radius: 15px;
            padding: 30px 40px;
            width: 100%;
            max-width: 800px;
            height: auto;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        h2 {
            margin-bottom: 30px;
            color: #5B2C6F;
            background-color: #FFFFFF;
            font-size: 30px;
            font-weight: bold;
            text-transform: uppercase;
            font-family: "Times New Roman";
            letter-spacing: 2px;
            margin-bottom: 50px;
            padding: 10px;
            border-radius: 10px;
        }
        .division:hover {
            transform: translateY(-10px);
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

            box-shadow: 0 0 10px rgba(0, 86, 179, 0.5);
        }
        .login-box {
            text-align: center;
            width: 100%;
        }
        input[type="submit"] {
            background-color: blueviolet;
            color: white;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #8E44AD;
        }
        input:hover {
            color: #8E44AD;
        }
    </style>
</head>
<body>

<div class="division">
    <div class="login-box">
        <h2>Menu principal</h2>
        <form method="POST" action="">
            <div>
                <a href="afficher_etudiant.php"><input type="button" value="afficher etudiant"></a>
            </div>
            <div>
                <a href="ajouter_etudiant.php"><input type="button" value="ajouter etudiant"></a>
            </div>
            <div>
                <a href="afficher_etablissement.php"><input type="button" value="afficher etablissement"></a>
            </div>
            <div>
                <a href="ajouter_etablissement.php"><input type="button" value="ajouter etablissement"></a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
