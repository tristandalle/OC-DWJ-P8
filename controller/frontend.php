<?php

require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');

function home()
{    
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $chapters = $chapterManager->getChapters();
    
    require('view/frontend/homeView.php');
}

function chapter()
{
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $chapter = $chapterManager->getChapter($_GET['id']);
    $commentManager = new Tristan\P8\Model\CommentManager();
    $comments = $commentManager->getComments($_GET['id']);
    
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

function accessAdmin()
{
    require('view/backend/adminView.php');
}

function accessAdminCreate()
{
    require('view/backend/adminCreateView.php');
}

function addChapter($title, $image, $content)
{
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $newChapterLines = $chapterManager->postChapter($title, $image, $content);
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
        $chapterManager = new Tristan\P8\Model\ChapterManager();
        $deleteLine = $chapterManager->deleteChapter($id);
        header('Location: index.php?');
    }
    else{
        $chapterManager = new Tristan\P8\Model\ChapterManager();
        $chapter = $chapterManager->getChapter($id);
        require('view/backend/adminRewriteView.php');
    }
    
}

function rewriteChapter($id, $title, $image, $content)
{
        $chapterManager = new Tristan\P8\Model\ChapterManager();
        $rewriteLine = $chapterManager->rewriteChapter($id, $title, $image, $content);
        if($rewriteLine == false){
        throw new Exception('impossible d\'ajouter le chapître');
    }
    else {
        header('Location: index.php?');
    }
}
    