<?php

require('controller/frontend.php');

try{
    if (isset($_GET['action'])){
        if($_GET['action'] == 'home'){
            home();
        }
    elseif ($_GET['action'] == 'chapter'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                chapter();
            }
            else{
                throw new Exception('aucun identifiant de chapître envoyé');
            }
        }
    }
    
    else{
        home();
    }
}
catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}

