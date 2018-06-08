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
            accessAdmin($_POST['pseudo'], $_POST['pass']);
        }
        elseif ($_GET['action'] == 'accessAdminCreate'){
            accessAdminCreate();
        }
        elseif ($_GET['action'] == 'adminEdit'){
            adminEdit();
        }
        elseif ($_GET['action'] == 'accessAbout'){
            accessAbout();
        }
        elseif ($_GET['action'] == 'addChapter'){
            if (!empty($_POST['title']) && !empty($_POST['image']) && !empty($_POST['content']) && !empty($_POST['resume'])){
                    addChapter($_POST['title'], $_POST['image'], $_POST['content'], $_POST['resume']);
            }
            else{
                throw new Exception('tous les champs ne sont pas remplis');
            }
        }
        elseif ($_GET['action'] == 'updateChapter'){
            updateChapter($_POST['id'], $_POST['choice']);
        }
        elseif ($_GET['action'] == 'confirmDelete'){
            confirmDelete($_GET['id'], $_POST['confirm']);
        }
        elseif ($_GET['action'] == 'rewriteChapter'){
            rewriteChapter($_GET['id'], $_POST['title'], $_POST['image'], $_POST['content'], $_POST['resume']);
        }
        elseif ($_GET['action'] == 'signalComment'){
            signalComment($_GET['id'], $_GET['chapterId']);
        }
        elseif ($_GET['action'] == 'adminModerator'){
            moderateComments();
        }
        elseif ($_GET['action'] == 'updateComment'){
            updateComment($_GET['id'], $_POST['choice']);
        }
        
        //A sup
        elseif ($_GET['action'] == 'newmember'){
            newmember($_POST['pseudo'], $_POST['pass']);
        }
        
    }
    else{
        home();
    }
}
catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}