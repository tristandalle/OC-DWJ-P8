<?php

require_once('model/ChapterManager.php');

function home()
{    
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $chapters = $chapterManager->getChapters();
    
    require('view/frontend/homeView.php');
}

function chapter()
{
    $postManager = new Tristan\P8\Model\ChapterManager();
    $chapter = $chapterManager->getChapter($_GET['id']);
    
    require('view/frontend/chapterView.php');
}