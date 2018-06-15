<?php $title = 'Admin'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box_admin">
        <h1>ADMIN</h1>
        <h2><?=$_SESSION['pseudo']?>, sur cette page vous pouvez céer un nouvel administrateur</h2>
    </div>
</div>


<div class="inscription_container">
    
    <form action="index.php?action=newMember" method="post">
        <p>
            <label for="pseudo">Pseudo</label><br/>
            <input type="text" name="pseudo" id="pseudo">
        </p>
        <p>
            <label for="pass">Mot de passe</label><br/>
            <input type="password" name="pass" id="pass">
        </p>
        <p>
            <label for="repass">Retapez le mot de passe</label><br/>
            <input type="password" name="repass" id="repass">
        </p>
        <p>
            <input type="submit" value="Créer le nouvel administrateur" id="submit">
        </p>
    </form>
    
</div>


<div class="admin_mode">
<a href="index.php?action=accessHomeAdmin" class="admin_button">Revenir au menu Admin</a>
</div>
<div class="admin_mode">
<a href="index.php?action=disconnection" class="admin_button">Quitter la page Admin</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

