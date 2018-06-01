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

