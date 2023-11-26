<?php
require('connexion.php'); 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title>JPO</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="connexion">
        <form method="post" action="">
            <table class="formulaire">
                <tr>
                    <td>
                        <input type="text" placeholder="Votre mail" id="email" name="email"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="tel" placeholder="Votre numéro de téléphone" id="tel" name="tel"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br/>
                        <button type="submit" name="connexion">Se connecter</button>
                    </td>
                </tr>
            </table>
        </form>
        <p class="red">
            <?php
            $db_server = 'localhost';
            $db_name = 'jpo';
            $db_user_login = 'root';
            $db_user_pass = '';

            if (isset($_POST['connexion'])) {
                if (empty($_POST['email'])) {
                    echo "Le champ email est vide.";
                } else {
                    if (empty($_POST['tel'])) {
                        echo "Le champ téléphone est vide.";
                    } else {
                        $email = htmlentities($_POST['email'], ENT_QUOTES, "ISO-8859-1");
                        $tel = $_POST['tel'];

                        try {
                            $pdo = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user_login, $db_user_pass);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $stmt = $pdo->prepare("SELECT email, telephone, admin FROM utilisateurs WHERE email = :email");
                            $stmt->bindParam(':email', $email);
                            $stmt->execute();

                            $row = $stmt->fetch(PDO::FETCH_ASSOC);

                            if ($stmt->rowCount() > 0) {
                                $_SESSION['user'] = $row['admin'];
                                header('Location:admin.php');
                            } else {
                                echo "L'email ou le téléphone est incorrect, le compte n'a pas été trouvé.";
                            }
                        } catch (PDOException $e) {
                            die("Erreur : " . $e->getMessage());
                        }
                    }
                }
            }
            ?>
        </p>
    </div>
</body>
</html>

