<?php

require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');

function home()
{    
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $chapters = $chapterManager->getChapters();
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $titles = $chapterManager->getTitles();
    
    require('view/frontend/homeView.php');
}

function chapter()
{
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $chapter = $chapterManager->getChapter($_GET['id']);
    $commentManager = new Tristan\P8\Model\CommentManager();
    $comments = $commentManager->getComments($_GET['id']);
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $titles = $chapterManager->getTitles();
    var_dump($comments);
    require('view/frontend/chapterView.php');
}

function addComment($chapterId, $author, $comment)
{
    $commentManager = new Tristan\P8\Model\CommentManager();
    $affectedLines = $commentManager->postComment($chapterId, $author, $comment);
    if($affectedLines == false){
        throw new Exception('impossible d\'ajouter le commentaire');
    }
    else {
        header('Location: index.php?action=chapter&id='. $chapterId);
    }
}

function accessAdmin($pseudo, $pass)
{
    $memberManager = new Tristan\P8\Model\MemberManager();
    $verify = $memberManager->verifyMember($pseudo, $pass);
    
    $correctPassword = password_verify($pass, $verify['pass']);
    
    if (!$verify){
        throw new Exception('pseudo ou mot de passe incorrect');
    }
    else{
        if($correctPassword){
            session_start();
            $_SESSION['id'] = $verify['id'];
            $_SESSION['pseudo'] = $pseudo;
            require('view/backend/adminView.php');
        }
        else{
            throw new Exception('pseudo ou mot de passe incorrect');
        }
    }
}

function accessAdminCreate()
{
    require('view/backend/adminCreateView.php');
}

function addChapter($title, $image, $content, $resume)
{
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $newChapterLines = $chapterManager->postChapter($title, $image, $content, $resume);
    if($newChapterLines == false){
        throw new Exception('impossible d\'ajouter le chapître');
    }
    else {
        header('Location: index.php?');
    }
}

function adminEdit()
{
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $chapters = $chapterManager->getChapters();
    
    require('view/backend/adminEditView.php');
}

function updateChapter($id, $choice)
{
    if($choice == "Supprimer"){
        $message = "Voulez-vous vraiment supprimer ce chapître ?";
        require('view/error/errorConfirmView.php');
    }
    else{
        $chapterManager = new Tristan\P8\Model\ChapterManager();
        $chapter = $chapterManager->getChapter($id);
        require('view/backend/adminRewriteView.php');
    }
    
}
function confirmDelete($id, $confirm)
{
        if($confirm == "oui"){
            $chapterManager = new Tristan\P8\Model\ChapterManager();
            $deleteLine = $chapterManager->deleteChapter($id);
            header('Location: index.php?');
        }
        else{
            header('Location: index.php?action=adminEdit'); 
        }
}

function rewriteChapter($id, $title, $image, $content, $resume)
{
        $chapterManager = new Tristan\P8\Model\ChapterManager();
        $rewriteLine = $chapterManager->rewriteChapter($id, $title, $image, $content, $resume);
        if($rewriteLine == false){
            throw new Exception('impossible de mettre à jour le chapître');
        }
        else {
            header('Location: index.php?');
    }
}

function signalComment($commentId, $chapterId)
{
    $commentManager = new Tristan\P8\Model\CommentManager();
    $signaledLine = $commentManager->changeSignalComment($commentId);
    
    header('Location: index.php?action=chapter&id='. $chapterId);
}

function moderateComments()
{
    $commentManager = new Tristan\P8\Model\CommentManager();
    $signaledComments = $commentManager->getSignalComment();
    
    require('view/backend/adminModeratorView.php');
}

function updateComment($id, $choice)
{
    if($choice == "Valider ce commentaire"){
        $commentManager = new Tristan\P8\Model\CommentManager();
        $validatedComment = $commentManager->validateSignalComment($id);
    }
    else{
        $commentManager = new Tristan\P8\Model\CommentManager();
        $delaledComment = $commentManager->delateSignalComment($id);
    }
    
    header('Location: index.php?action=adminModerator');
}

function accessAbout()
{
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $titles = $chapterManager->getTitles();
    
    require('view/frontend/aboutView.php');
}







/*POUR AJOUTER UN NOUVEAU MEMBRE ADMIN
function newmember($pseudo, $pass)
{
    $pass_hache = password_hash($pass, PASSWORD_DEFAULT);
    $memberManager = new Tristan\P8\Model\MemberManager();
    $newLine = $memberManager->addMembre($pseudo, $pass_hache);
    var_dump($newLine);
    echo "ok membre ajouté";
}*/
    