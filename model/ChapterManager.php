<?php

namespace Tristan\P8\Model; 

require_once('model/Manager.php');

class ChapterManager extends Manager
{
    
    public function getChapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, chapter_image, content, chapter_resume, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%imin%ss\') AS publication_date_fr FROM chapters ORDER BY publication_date DESC LIMIT 0, 5');
        
        return $req;
        
    }
    
    public function getChapter($chapterId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, chapter_image, content, chapter_resume, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%imin%ss\') AS publication_date_fr FROM chapters WHERE id = ?');
        $req->execute(array($chapterId));
        $chapter = $req->fetch();
    
        return $chapter;
    }
    
    public function getTitles()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title FROM chapters ORDER BY id');
        
        return $req;
    }
    
    public function postChapter($title, $image, $content, $resume)
    {
        $db = $this->dbConnect();
        $newChapter = $db->prepare('INSERT INTO chapters(title, chapter_image, content, chapter_resume, publication_date) VALUES(?, ?, ?, ?, NOW())');
        $newChapterLines = $newChapter->execute(array($title, $image, $content, $resume));
        
        return $newChapterLines;
    }
    
    public function deleteChapter($id)
    {
        $db = $this->dbConnect();
        $chapters = $db->prepare('DELETE FROM chapters WHERE id=:id');
        $deleteLine = $chapters->execute(array('id' => $id));
        
        return $deleteLine;
    }
    
    public function rewriteChapter($id, $title, $image, $content, $resume)
    {
        $db = $this->dbConnect();
        $chapters = $db->prepare('UPDATE chapters SET title = :newTitle, chapter_image = :newImage, content = :newContent, chapter_resume = :newResume WHERE id= :id');
        $rewriteLine = $chapters->execute(array('newTitle' =>$title, 'newImage' => $image, 'newContent' => $content, 'newResume' => $resume, 'id' => $id));
        
        return $rewriteLine;
    }
    
}

    

