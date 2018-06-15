<?php $title = 'Admin'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box_admin">
        <h1>ADMIN</h1>
        <h2>Bienvenue <?=$_SESSION['pseudo']?>, vous êtes connecté</h2>
    </div>
</div>


<div class="admin_mode">
   
    <a href="index.php?action=accessAdminCreate" class="admin_button">Publier un nouveau chapitre</a>
    <a href="index.php?action=adminEdit" class="admin_button">Mettre à jour ou supprimer un chapitre</a>
    <a href="index.php?action=adminModerator" class="admin_button">Modérer les commentaires signalés</a>
    <a href="index.php?action=createAdminMember" class="admin_button">Créer un nouveau compte admin</a>
    <a href="index.php?action=disconnection" class="admin_button">Quitter la page Admin</a>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

