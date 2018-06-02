<?php

namespace Tristan\P8\Model; 

require_once('model/Manager.php');

class ChapterManager extends Manager
{
    
    public function getChapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%imin%ss\') AS publication_date_fr FROM chapters ORDER BY publication_date DESC LIMIT 0, 5');
        
        return $req;
    }
    
    public function getChapter($chapterId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%imin%ss\') AS publication_date_fr FROM chapters WHERE id = ?');
        $req->execute(array($chapterId));
        $chapter = $req->fetch();
    
        return $chapter;
    }
    
    public function postChapter($title, $content)
    {
        $db = $this->dbConnect();
        $newChapter = $db->prepare('INSERT INTO chapters(title, content, publication_date) VALUES(?, ?, NOW())');
        $chaptersLines = $newChapter->execute(array($title, $content));
        
        return $chaptersLines;
    }

}

