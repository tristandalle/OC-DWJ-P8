<?php

namespace Tristan\P8\Model; 

require_once('model/Manager.php');

class ChapterManager extends Manager
{
    
    public function getChapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, chapter_image, content, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%imin%ss\') AS publication_date_fr FROM chapters ORDER BY publication_date DESC LIMIT 0, 5');
        
        return $req;
    }
    
    public function getChapter($chapterId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, chapter_image, content, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%imin%ss\') AS publication_date_fr FROM chapters WHERE id = ?');
        $req->execute(array($chapterId));
        $chapter = $req->fetch();
    
        return $chapter;
    }
    
    public function postChapter($title, $image, $content)
    {
        $db = $this->dbConnect();
        $newChapter = $db->prepare('INSERT INTO chapters(title, chapter_image, content, publication_date) VALUES(?, ?, ?, NOW())');
        $chaptersLines = $newChapter->execute(array($title, $image, $content));
        
        return $chaptersLines;
    }
    
    public function getTitles()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT title FROM chapters ORDER BY publication_date DESC');
        
        return $req;
    }
    
    public function deleteChapter()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM chapters WHERE title=?');
    }
    
}

    

