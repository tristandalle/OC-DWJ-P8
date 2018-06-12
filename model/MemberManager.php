<?php

namespace Tristan\P8\Model; 

require_once('model/Manager.php');

class MemberManager extends Manager
{
    
    public function verifyMember($pseudo, $pass)
    {
        $db = $this->dbConnect();
        $member = $db->prepare('SELECT id, pass FROM members WHERE pseudo = :pseudo');
        $member->execute(array('pseudo' => $pseudo));
        $verify = $member->fetch();
    
        return $verify;
    }
    
    
    
    /*FOR ADD ADMIN MUMBER
    public function addMembre($pseudo, $pass_hache)
    {
        $db = $this->dbConnect();
        $member = $db->prepare('INSERT INTO members(pseudo, pass) VALUES(:pseudo, :pass)');
        $newLine = $member->execute(array('pseudo' => $pseudo, 'pass' => $pass_hache));
    
        return $newLine;
    }*/
    
}
