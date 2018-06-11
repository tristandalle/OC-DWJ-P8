<?php session_start(); ?>

<?php $title = 'Alerte'; ?>

<?php ob_start(); ?>

<p><?= $e->getMessage(); ?></p>

<a href="index.php"><p id="text_center">Retour à la page d'accueil</p></a>

<?php
if(isset($_SESSION['pseudo'])){
?>
<a href="index.php?action=accessHomeAdmin" class="admin_button">Revenir au menu Admin</a>
<?php
    
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

