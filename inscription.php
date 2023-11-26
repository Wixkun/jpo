<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title>JPO</title>
    <link rel="stylesheet" href="">
</head>
<body>
        <h1>Nous rencontrer</h1>
        <form method="POST" action="">
            <table>
               <tr>
                  <td>
                     <label>Nom</label>
                     <input type="text" placeholder="Votre nom" id="nom" name="nom"/>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label>Prénom</label>
                     <input type="text" placeholder="Votre prénom" id="prenom" name="prenom"/>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label>Email</label> 
                     <input type="text" placeholder="Votre mail" id="mail" name="mail"/>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label>Numéro de téléphone</label>
                     <input type="tel" placeholder="Votre numéro de téléphone" id="tel" name="tel"/>
                  </td>
               </tr>
               <tr>
               <tr>
                  <td>
                     <label>Niveau d'études</label>
                     <select  id="nv_etudes" name="nv_etudes">
                        <option value="Seconde">Seconde</option>
                        <option value="Première">Première</option>
                        <option value="Terminale">Terminale</option>
                        <option value="+1">Bac +1</option>
                        <option value="+2">Bac +2</option>
                        <option value="+3">Bac +3</option>
                    </select>
                  </td>
               </tr>
               <tr>
                  <td>
                  <label>Moyen de transport</label>
                     <select  id="transport" name="transport">
                        <option value="Voiture">Voiture</option>
                        <option value="Bus">Bus</option>
                        <option value="Train">Train</option>
                        <option value="Pied">À pied</option>
                  </td>
               </tr>
               <tr>
                  <td>
                  <label>Distance Domicile/IUT</label>
                     <select  id="distance" name="distance">
                        <option value="-5">Moins de 5km</option>
                        <option value="-15">Entre 5 et 15 km</option>
                        <option value="-50">Entre 15 et 50km</option>
                        <option value="+50">Plus de 50km</option>
                  </td>
               </tr>
               <tr>
                  <td>
                  <label>Type de bac</label>
                     <select  id="type_bac" name="type_bac">
                        <option value="General">Général</option>
                        <option value="Technologique">Tecnhologique</option>
                        <option value="Professionnel">Professionnel</option>
                  </td>
               </tr>
               <tr>
                  <td>
                     <br/>
                     <button type="submit" name="inscription">Valider</button> 
                  </td>
               </tr>
            </table>
         </form>
            <?php
            $bdd = new PDO('mysql:host=127.0.0.1; port=3306; dbname=jpo', 'root', '');
 
            if(isset($_POST['inscription'])) {
                $mail = htmlspecialchars($_POST['mail']);
                $tel = $_POST['tel'];
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $nv_etudes = htmlspecialchars($_POST['nv_etudes']);
                $transport = htmlspecialchars($_POST['transport']);
                $distance = htmlspecialchars($_POST['distance']);
                $type_bac = htmlspecialchars($_POST['type_bac']);
                if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['tel'] AND $_POST['nv_etudes']) AND !empty($_POST['transport']) AND !empty($_POST['distance']) AND !empty($_POST['type_bac'])) {
                    $insertmbr = $bdd->prepare("INSERT INTO utilisateurs(admin, email, telephone, nom, prenom, nv_etudes, transport, distance, type_bac, presence_jpo) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $insertmbr->execute(array(0, $mail, $tel, $nom, $prenom, $nv_etudes, $transport, $distance, $type_bac, 0));
                    echo "Inscription validée ! Nous avons hâte de vous rencontrer !";
                }else {
                    echo "Tous les champs doivent être complétés !";
                }
            }
            ?>
    </body>
    </html>