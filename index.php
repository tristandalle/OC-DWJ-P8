<?php

require('controller/frontend.php');

try{
    if (isset($_GET['action'])){
        if($_GET['action'] == 'home'){
            home();
        }
        
    }
    else{
        home();
    }
}
catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}

