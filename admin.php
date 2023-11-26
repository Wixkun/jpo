<?php
session_start();
    if($_SESSION['user']==1){
        echo "Vous êtes administrateur";
    } else {
        echo " Vous êtes utilisateur";
    }
?>