<?php $title = 'Mettre à jour'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box_admin">
        <h1>ADMIN</h1>
        <h2><?=$_SESSION['pseudo']?>, sur cette page vous pouvez<br/>modifier un chapître</h2>
    </div>
</div>



<div class="post_chapter">
    <h4>Mettre à jour un chapître :</h4>
    <form action="index.php?action=rewriteChapter&amp;id=<?= $chapter['id'] ?>" method="post" enctype="multipart/form-data">
        <p>
            <label for="title">Titre du chapître</label><br/>
            <input type="text" id="title" name="title" value="<?= $chapter['title'] ?>"/>
        </p>
        <p>
            <label for="image">Image du chapître (JPG, max. 5Mo)<strong> Sélectionnez obligatoirement un fichier</strong></label><br/>
            <input type="file" id="image" name="image" value="<?= $chapter['chapter_image'] ?>"/>
        </p>
        <p id="content_text_area">
            <label for="content">Texte du chapître</label><br/>
            <textarea id="content" name="content" ><?= $chapter['content'] ?></textarea>
        </p>
        <p id="resume_text_area">
            <label for="resume">Résumé du chapître</label><br/>
            <textarea id="resume" name="resume"><?= $chapter['chapter_resume'] ?></textarea>
        </p>
        <p>
            <input id="submit" type="submit" />
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