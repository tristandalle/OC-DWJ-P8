<?php

require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');

function home()
{    
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $chapters = $chapterManager->getChapters();
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $titles = $chapterManager->getTitles();
    
    require('view/frontend/homeView.php');
}

function chapter()
{
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $chapter = $chapterManager->getChapter($_GET['id']);
    $commentManager = new Tristan\P8\Model\CommentManager();
    $comments = $commentManager->getComments($_GET['id']);
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $titles = $chapterManager->getTitles();
    
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

function accessAdmin($pseudo, $pass)
{
    $memberManager = new Tristan\P8\Model\MemberManager();
    $verify = $memberManager->verifyMember($pseudo, $pass);
    
    $correctPassword = password_verify($pass, $verify['pass']);
    
    if (!$verify){
        throw new Exception('pseudo ou mot de passe incorrect');
    }
    else{
        if($correctPassword){
            session_start();
            $_SESSION['id'] = $verify['id'];
            $_SESSION['pseudo'] = $pseudo;
            require('view/backend/adminView.php');
        }
        else{
            throw new Exception('pseudo ou mot de passe incorrect');
        }
    }
}

function accessHomeAdmin()
{
    require('view/backend/adminView.php');
}
function accessAdminCreate()
{
    require('view/backend/adminCreateView.php');
}

function addChapter($title, $image, $content, $resume)
{
    if(isset($image) && $image['error'] == 0){
                    if ($image['size'] <= 5000000){
                        $fileInfo = pathinfo($image['name']);
                        $extensionUpload = $fileInfo['extension'];
                        $extensionsOk = array('jpg', 'JPG', 'jpeg', 'JPEG');
                        if (in_array($extensionUpload, $extensionsOk)){
                            $tmp_name = $image["tmp_name"];
                            $name = basename($image["name"]);
                            $uploads_dir = 'public/images/uploads';
                            move_uploaded_file($tmp_name, "$uploads_dir/$name");
                            $imageOk = "$uploads_dir/$name";
                        }
                        else{
                            throw new Exception('le fichier image n\'est pas au bon format');
                        }
                    }
                    else{
                        throw new Exception('le fichier image est trop gros');
                    }
                }
                else{
                    throw new Exception('vous n\'avez pas chargé de fichier image');
                }
    
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $newChapterLines = $chapterManager->postChapter($title, $imageOk, $content, $resume);
    if($newChapterLines == false){
        throw new Exception('impossible d\'ajouter le chapitre');
    }
    else {
        throw new Exception('le chapitre " ' . $title . ' " a bien été publié !');
    }
}


function adminEdit()
{
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $chapters = $chapterManager->getChapters();
    
    require('view/backend/adminEditView.php');
}

function updateChapter($id, $choice)
{
    if($choice == "Supprimer"){
        $message = "Voulez-vous vraiment supprimer ce chapitre ?";
        $link = "confirmDelete&amp;id= $id ";
        require('view/error/errorConfirmView.php');
    }
    else{
        $chapterManager = new Tristan\P8\Model\ChapterManager();
        $chapter = $chapterManager->getChapter($id);
        require('view/backend/adminRewriteView.php');
    }
    
}
function confirmDelete($id, $confirm)
{
        if($confirm == "oui"){
            $chapterManager = new Tristan\P8\Model\ChapterManager();
            $deleteLine = $chapterManager->deleteChapter($id);
            throw new Exception('le chapitre a bien été supprimé !');
        }
        else{
            header('Location: index.php?action=adminEdit'); 
        }
}

function rewriteChapter($id, $title, $image, $content, $resume)
{
        if(isset($image) && $image['error'] == 0){
                    if ($image['size'] <= 5000000){
                        $fileInfo = pathinfo($image['name']);
                        $extensionUpload = $fileInfo['extension'];
                        $extensionsOk = array('jpg', 'jpeg');
                        if (in_array($extensionUpload, $extensionsOk)){
                            $tmp_name = $image["tmp_name"];
                            $name = basename($image["name"]);
                            $uploads_dir = 'public/images/uploads';
                            move_uploaded_file($tmp_name, "$uploads_dir/$name");
                            $imageOk = "$uploads_dir/$name";
                        }
                        else{
                            throw new Exception('le fichier image n\'est pas au bon format');
                        }
                    }
                    else{
                        throw new Exception('le fichier image est trop gros');
                    }
                }
                else{
                    throw new Exception('vous n\'avez pas chargé de fichier image');
                }
        $chapterManager = new Tristan\P8\Model\ChapterManager();
        $rewriteLine = $chapterManager->rewriteChapter($id, $title, $imageOk, $content, $resume);
        if($rewriteLine == false){
            throw new Exception('impossible de mettre à jour le chapitre');
        }
        else {
            throw new Exception('le chapitre " ' . $title . ' " a bien été mis à jour !');
    }
}

function signalComment($commentId, $chapterId)
{
    $commentManager = new Tristan\P8\Model\CommentManager();
    $signaledLine = $commentManager->changeSignalComment($commentId);
    
    header('Location: index.php?action=chapter&id='. $chapterId . '#signal_comment');
}

function moderateComments()
{
    $commentManager = new Tristan\P8\Model\CommentManager();
    $signaledComments = $commentManager->getSignalComment();
    
    require('view/backend/adminModeratorView.php');
}

function updateComment($id, $choice)
{
    $message = "Voulez-vous vraiment " . strtolower($choice) . "?";
    $link = "confirmUpdateComment&amp;choice= $choice &amp;id= $id ";
    require('view/error/errorConfirmView.php');
}

function confirmUpdateComment($id, $choice, $confirm){
    
    if($confirm == "oui"){
        if($choice == "Valider ce commentaire"){
        $commentManager = new Tristan\P8\Model\CommentManager();
        $validatedComment = $commentManager->validateSignalComment($id);
    }
    else{
        $commentManager = new Tristan\P8\Model\CommentManager();
        $delaledComment = $commentManager->delateSignalComment($id);
    }
    
    throw new Exception('Votre choix : "' . strtolower($choice) .  '" a bien été pris en compte !');
        }
        else{
            echo "<script> javascript:history.go(-2)</script>";
        }
}

function accessAbout()
{
    $chapterManager = new Tristan\P8\Model\ChapterManager();
    $titles = $chapterManager->getTitles();
    
    require('view/frontend/aboutView.php');
}

function disconnection()
{
    $message = "Voulez-vous vraiment vous déconnecter ?";
    $link = "confirmDisconnect";
    require('view/error/errorConfirmView.php');
}

function confirmDisconnect($confirm){
    if($confirm == "oui"){
        session_start();
        session_destroy();
        header('Location: index.php?');
        }
        else{
            echo "<script> javascript:history.go(-2)</script>";
        }
}




/*FOR ADD ADMIN MUMBER
function newmember($pseudo, $pass)
{
    $pass_hache = password_hash($pass, PASSWORD_DEFAULT);
    $memberManager = new Tristan\P8\Model\MemberManager();
    $newLine = $memberManager->addMembre($pseudo, $pass_hache);
    echo "ok membre ajouté";
}*/
    