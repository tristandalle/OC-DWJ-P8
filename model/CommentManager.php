<?php

namespace Tristan\P8\Model; 

require_once('model/Manager.php');

class CommentManager extends Manager
{
    
    public function getComments($chapterId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date,\'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, comment_signal FROM comments WHERE chapter_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($chapterId));
    
        return $comments;
    }
    
    public function postComment($chapterId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($chapterId, $author, $comment));
    
        return $affectedLines;
    }
    
    public function changeSignalComment($commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET comment_signal = "Ce commentaire a été signalé" WHERE id= :id && comment_signal = "Signaler ce commentaire"');
        $signaledLine = $comments->execute(array('id' => $commentId));
        
        return $signaledLine;
    }
    
    public function getSignalComment()
    {
        $db = $this->dbConnect();
        $signaledComments = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date,\'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, comment_signal FROM comments WHERE comment_signal = "Ce commentaire a été signalé" ORDER BY comment_date DESC');
        
        return $signaledComments;
    }
    
    public function validateSignalComment($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET comment_signal = "Ce commentaire a été validé " WHERE id= :id');
        $signaledLine = $comments->execute(array('id' => $id));
        
        return $signaledLine;
    }
    
    public function delateSignalComment($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE id=:id');
        $deleteLine = $comments->execute(array('id' => $id));
        
        return $deleteLine;
    }

}
