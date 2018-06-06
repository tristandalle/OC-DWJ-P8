<?php $title = 'Publier'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box">
        <h1>MODE ADMIN</h1>
        <h2>Espace publication</h2>
    </div>
</div>

<a href="index.php" class="#">Quitter la page Admin</a>

<h4>Publiez un nouveau chapître :</h4>
<div class="post_chapter">
    <form action="index.php?action=addChapter" method="post">
        <div>
            <label for="title">Titre du chapître</label><br/>
            <input type="text" id="title" name="title" />
        </div>
        <div>
            <label for="image">Image du chapître</label><br/>
            <input type="text" id="image" name="image" placeholder="dossier_du_fichier/nom_du_fichier"/>
        </div>
        <div>
            <label for="content">Texte du chapître</label><br/>
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <label for="resume">Résumé du chapître</label><br/>
            <textarea id="resume" name="resume"></textarea>
        </div>
        <div>
            <input id="submit" type="submit" />
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>