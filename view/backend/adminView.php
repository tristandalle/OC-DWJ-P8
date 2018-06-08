<?php $title = 'Admin'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box_admin">
        <h1>ADMIN</h1>
    </div>
</div>


<div class="admin_mode">
    
    <a href="index.php?action=accessAdminCreate" class="admin_button">Publier un nouveau chapître</a>
    <a href="index.php?action=adminEdit" class="admin_button">Mettre à jour ou supprimer un chapître</a>
    <a href="index.php?action=adminModerator" class="admin_button">Modérer les commentaires signalés</a>
    <a href="index.php" class="admin_button">Quitter la page Admin</a>
</div>

<form action="index.php?action=newmember" method="post">
    <label for="pseudo">pseudo</label>
    <input type="text" name="pseudo">
    <label for="pass">mdp</label>
    <input type="pass" name="pass">
    <input type="submit">

</form>
 
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

