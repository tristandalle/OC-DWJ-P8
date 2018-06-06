<?php $title = 'Admin'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box">
        <h1>Bienvenue</h1>
        <h2>Jean Forteroche</h2>
    </div>
</div>


<div id="admin_mode">
    
    <a href="index.php?action=accessAdminCreate" class="admin_button">Publier un nouveau chapître</a>
    <a href="index.php?action=adminEdit" class="admin_button">Mettre à jour ou supprimer un chapître</a>
    <a href="index.php?action=adminModerator" class="admin_button">Modérer les commentaires signalés</a>
    <a href="index.php" class="admin_button">Quitter la page Admin</a>
</div>
 
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
