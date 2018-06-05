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
                throw new Exception('aucun identifiant de chapître envoyé');
            }
        }
        elseif ($_GET['action'] == 'accessAdmin'){
            if (!isset($_POST['mot_de_passe']) || $_POST['mot_de_passe'] != "azerty"){
                throw new Exception('mauvais mot de passe');
            }
            else{
                accessAdmin();
            }
        }
        elseif ($_GET['action'] == 'accessAdminCreate'){
            accessAdminCreate();
        }
        elseif ($_GET['action'] == 'adminEdit'){
            adminEdit();
        }
        elseif ($_GET['action'] == 'addChapter'){
            if (!empty($_POST['title']) && !empty($_POST['content'])){
                    addChapter($_POST['title'], $_POST['image'], $_POST['content']);
            }
            else{
                throw new Exception('tous les champs ne sont pas remplis');
            }
        }
        elseif ($_GET['action'] == 'updateChapter'){
            updateChapter($_POST['id'], $_POST['choice']);
        }
        elseif ($_GET['action'] == 'rewriteChapter'){
            rewriteChapter($_GET['id'], $_POST['title'], $_POST['image'], $_POST['content']);
        }
        
    }
    else{
        home();
    }
}
catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}