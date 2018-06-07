<?php $title = 'Publier'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box_admin">
        <h1>ADMIN</h1>
        <h2>Espace publication</h2>
    </div>
</div>



<div class="post_chapter">
    <h4>Publiez un nouveau chapître :</h4>
    <form action="index.php?action=addChapter" method="post">
        <p>
            <label for="title">Titre du chapître</label><br/>
            <input type="text" id="title" name="title" />
        </p>
        <p>
            <label for="image">Image du chapître</label><br/>
            <input type="text" id="image" name="image" placeholder="dossier_du_fichier/nom_du_fichier"/>
        </p>
        <p id="content_text_area">
            <label for="content">Texte du chapître</label><br/>
            <textarea id="content" name="content"></textarea>
        </p>
        <p id="resume_text_area">
            <label for="resume">Résumé du chapître</label><br/>
            <textarea id="resume" name="resume"></textarea>
        </p>
        <p>
            <input id="submit" type="submit" />
        </p>
    </form>
</div>

<div class="admin_mode">
<a class="admin_button" href="index.php" class="#">Quitter la page Admin</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>