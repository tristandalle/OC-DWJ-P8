<?php session_start() ;?>

<?php $title = 'Alerte'; ?>

<?php ob_start(); ?>

<div id="header_error">
    <img src="public/images/Signal_attention.png"/>
</div>

<div id="error_message">
<h3><?= $e->getMessage(); ?></h3>
</div>

<?php
if(isset($_SESSION['pseudo'])){
?>
<div class ="error_mode">
<a href="index.php?action=disconnection" class="error_button">Retour à la page d'accueil</a>
</div>
<?php 
}else{
?>
<div class ="error_mode">
<a href="index.php" class="error_button">Retour à la page d'accueil</a>
</div>
<?php 
}
?>

<?php
if(isset($_SESSION['pseudo'])){
?>
<div class ="error_mode">
    <a href="index.php?action=accessHomeAdmin" class="error_button">Revenir au menu Admin</a>
</div>
<?php 
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

