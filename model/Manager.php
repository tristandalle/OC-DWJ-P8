<?php

namespace Tristan\P8\Model; 

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=jf;charset=utf8', 'root', '');
        return $db;   
    }
}