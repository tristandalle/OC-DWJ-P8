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
        elseif ($_GET['action'] == 'addComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                if (!empty($_POST['author']) && !empty($_POST['comment'])){
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else{
                    throw new Exception('tous les champs ne sont pas remplis');
                }
            }
            else{
                throw new Exception('aucun identifiant de billet envoyé');
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