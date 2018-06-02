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
    require('view/frontend/adminView.php');
}

function addChapter($title, $content)
{
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $chaptersLines = $chapterManager->postChapter($title, $content);
    if($chaptersLines == false){
        throw new Exception('impossible d\'ajouter le chapître');
    }
    else {
        header('Location: index.php?');
    }
}