<?php

require('controller/controller.php');

try{
    if (isset($_GET['action'])){
        if ($_GET['action'] == 'accessAbout'){
            accessAbout();
        }
        elseif ($_GET['action'] == 'chapter'){
                if (isset($_GET['id']) && $_GET['id'] > 0){
                    chapter();
                }
                else{
                    throw new Exception('Aucun identifiant de chapitre envoyé');
                }
        }
        elseif ($_GET['action'] == 'addComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                if (!empty(trim($_POST['author'])) && !empty(trim($_POST['comment']))){
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else{
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }
            else{
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }
        elseif ($_GET['action'] == 'signalComment'){
            signalComment($_GET['id'], $_GET['chapterId']);
        }
        elseif ($_GET['action'] == 'accessAdmin'){
            if(!isset($_POST['pseudo']) && !isset($_POST['pass'])){
                throw new Exception('Vous n\'êtes pas connecté');
            }
            else{
                accessAdmin($_POST['pseudo'], $_POST['pass']);
            }
        }
        elseif ($_GET['action'] == 'accessAdminCreate'){
            session_start();
            if(isset($_SESSION['pseudo'])){
                accessAdminCreate();
            }
            else{
                throw new Exception('Vous n\'êtes pas connecté');
            }
        }
        elseif ($_GET['action'] == 'addChapter'){
            if (!empty($_POST['title']) && !empty($_FILES['image']) && !empty($_POST['content']) && !empty($_POST['resume'])){
                addChapter($_POST['title'], $_FILES['image'], $_POST['content'], $_POST['resume']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }
        elseif ($_GET['action'] == 'adminEdit'){
            session_start();
            if(isset($_SESSION['pseudo'])){
                adminEdit();
            }
            else{
                throw new Exception('Vous n\'êtes pas connecté');
            }
        }
        elseif ($_GET['action'] == 'updateChapter'){
            session_start();
            updateChapter($_POST['id'], $_POST['choice']);
        }
        elseif ($_GET['action'] == 'rewriteChapter'){
            rewriteChapter($_GET['id'], $_POST['title'], $_FILES['image'], $_POST['content'], $_POST['resume']);
        }
        elseif ($_GET['action'] == 'confirmDelete'){
            confirmDelete($_GET['id'], $_POST['confirm']);
        }
        elseif ($_GET['action'] == 'adminModerator'){
            session_start();
            if(isset($_SESSION['pseudo'])){
                moderateComments();
            }
            else{
                throw new Exception('Vous n\'êtes pas connecté');
            }
        }
        elseif ($_GET['action'] == 'updateComment'){
            updateComment($_GET['id'], $_POST['choice']);
        }
        elseif ($_GET['action'] == 'confirmUpdateComment'){
            confirmUpdateComment($_GET['id'], $_GET['choice'], $_POST['confirm']);
        }
        elseif ($_GET['action'] == 'createAdminMember'){
            session_start();
            if(isset($_SESSION['pseudo'])){
                createAdminMember();
            }
            else{
                throw new Exception('Vous n\'êtes pas connecté');
            }  
        }
        elseif ($_GET['action'] == 'newMember'){
            if(!isset($_POST['pseudo']) || empty($_POST['pseudo']) && !isset($_POST['pass']) || empty($_POST['pass']) && !isset($_POST['repass']) || empty($_POST['repass'])){
                throw new Exception('Tous les champs ne sont pas remplis');
            }
            elseif($_POST['pass'] !== $_POST['repass']){
                throw new Exception('Les deux mots de passe ne sont pas identiques');
            }
            else{
                newMember($_POST['pseudo'], $_POST['pass']);
            }  
        }
        elseif ($_GET['action'] == 'accessHomeAdmin'){
            session_start();
            if(isset($_SESSION['pseudo'])){
                accessHomeAdmin();
            }
            else{
                throw new Exception('Vous n\'êtes pas connecté');
            }
        }
        elseif ($_GET['action'] == 'disconnection'){
            disconnection();
        }
        elseif ($_GET['action'] == 'confirmDisconnect'){
            confirmDisconnect($_POST['confirm']);
        }    
    }
    else{
        home();
    }
}
catch(Exception $e){
    require('view/error/errorView.php');
}